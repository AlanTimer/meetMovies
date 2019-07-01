function chooseLabel(id) {
    if(id.style.fontWeight == 'bold'){
        id.style.backgroundColor='#FC9';
        id.style.fontSize='16px';
        id.style.fontWeight='normal';
    }else{
        id.style.backgroundColor='#F93';
        id.style.fontSize='20px';
        id.style.fontWeight='bold';
    }
}

// 将标签加入到隐藏标签的value值中
function postLabel(tmp) {
    document.getElementById("storage").value+=tmp+'/';
}

function writeLabel() {
    // 将字符串分割、格式化为数组
    var labelStr = document.getElementById("storage").value;
    var labelArray = labelStr.split("/");
    var array = [];
    // 数组去重
    if (!Array.isArray(labelArray)) {
        console.log('type error!')
        return
    }
    for (var i = 0; i < labelArray.length; i++) {
        if (array .indexOf(labelArray[i]) === -1) {
            array .push(labelArray[i])
        }
    }
    // 将数组转化成字符串，每个元素之间用“/”隔开
    var tag=array[0];
    for(var i =1;i<array.length-1;i++){
        tag=tag+'/'+array[i];
    }
    // alert(tag);

    // 将标签字符串写入到数据库
    $.ajax({
        type: "POST",                   //提交方式
        url:"php/reset_user_tag.php",   //发送请求的地址
        data:"tag="+tag,                //传递数据
    });
    window.location.href="main.php";
}
