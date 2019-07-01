<?php


class WebSocket
{
    private $socket;

    private $accept;

    private $isHand = array();

    public function __construct($host, $port, $max) {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, TRUE);
        socket_bind($this->socket, $host, $port);
        socket_listen($this->socket, $max);
    }

    public function start() {
        while(true) {
            $cycle = $this->accept;
            $cycle[] = $this->socket;
            socket_select($cycle, $write, $except, null);

            foreach($cycle as $sock) {
                if($sock === $this->socket) {
                    $client = socket_accept($this->socket);
                    $this->accept[] = $client;
                    $key = array_keys($this->accept);
                    $key = end($key);
                    $this->isHand[$key] = false;
                } else {
                    $length = socket_recv($sock, $buffer, 204800, 0);
                    $key = array_search($sock, $this->accept);

                    if($length < 7) {
                        $this->close($sock);
                        continue;
                    }

                    if(!$this->isHand[$key]) {
                        $this->dohandshake($sock, $buffer, $key);
                    } else {
                        // 先解码，再编码
                        $data = $this->decode($buffer);
                        $data = $this->encode($data);

                        // 判断断开连接（断开连接时数据长度小于10）
                        if(strlen($data) > 10) {
                            foreach($this->accept as $client) {
                                socket_write($client, $data, strlen($data));
                            }
                        }
                    }
                }

            }

        }

    }

    /**
     * 首次与客户端握手
     */
    public function dohandshake($sock, $data, $key) {
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $data, $match)) {
            $response = base64_encode(sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));
            $upgrade  = "HTTP/1.1 101 Switching Protocol\r\n" .
                "Upgrade: websocket\r\n" .
                "Connection: Upgrade\r\n" .
                "Sec-WebSocket-Accept: " . $response . "\r\n\r\n";
            socket_write($sock, $upgrade, strlen($upgrade));
            $this->isHand[$key] = true;
        }
    }

    /**
     * 关闭一个客户端连接
     */
    public function close($sock) {
        $key = array_search($sock, $this->accept);
        socket_close($sock);
        unset($this->accept[$key]);
        unset($this->handshake[$key]);
    }

    /**
     * 解码过程
     */
    public function decode($buffer) {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;
        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        }
        else if ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        }
        else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }

    /**
     * 编码过程
     */
    public function encode($buffer) {
        $length = strlen($buffer);
        if($length <= 125) {
            return "\x81".chr($length).$buffer;
        } else if($length <= 65535) {
            return "\x81".chr(126).pack("n", $length).$buffer;
        } else {
            return "\x81".char(127).pack("xxxxN", $length).$buffer;
        }
    }


}
$webSocket = new WebSocket('127.0.0.1', 8008, 100);
$webSocket->start();
?>