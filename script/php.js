
function check_username() {
    createRequest('../php/ok.php','');
}

function createRequest(url,username) {			//初始化对象并发出XMLHttpRequest请求
    http_request = false;                       //初始化
    if (window.XMLHttpRequest) {                //谷歌、火狐等浏览器
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType("text/xml");
        }
    } else if (window.ActiveXObject) {			//IE浏览器
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
    }
    if (!http_request) {
        alert("不能创建XMLHTTP实例!");
        return false;
    }
    http_request.onreadystatechange = alertContents; 	//指定响应方法
    //发出HTTP请求
    http_request.open("POST", url, true);               //设置进行异步请求目标URL和请求方法
    http_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http_request.send("username="+username);            //向服务器发送请求
}