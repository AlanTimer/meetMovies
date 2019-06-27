<?php


class my_email
{
    function sendMail($to,$content) {
        // 这个PHPMailer 就是之前从 Github上下载下来的那个项目
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;
        //使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;
        // 163 邮箱的 smtp服务器地址，这里当然也可以写其他的 smtp服务器地址
        $mail->Host = 'smtp.163.com';
        //smtp登录的账号 这里填入字符串格式的账号即可
        $mail->Username = 'web_yingyou@163.com';
        // 这个就是之前得到的授权码
        $mail->Password = 'qaq123';
        $mail->setFrom('web_yingyou@163.com', '影友');
        // $to 为收件人的邮箱地址，如果想一次性发送向多个邮箱地址，则只需要将下面这个方法多次调用即可
        $mail->addAddress($to);
        // 该邮件的主题
        $mail->Subject = "影友网站验证码";
        // 该邮件的正文内容
        $mail->Body = "您好，您的验证码是".$content;

        // 使用 send() 方法发送邮件
        if(!$mail->send()) {
            return '发送失败: ' . $mail->ErrorInfo;
        } else {
            return "发送成功";
        }
    }
}