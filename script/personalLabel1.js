function chooseLabel(id) {
    if (id.style.fontSize=='20px'){
        id.style.backgroundColor='#3074E7';
        id.style.fontSize='16px';
        id.style.fontWeight='normal';
    }
    else {
        id.style.backgroundColor='#162bff';
        id.style.fontSize='20px';
        id.style.fontWeight='bold';
    }
	var show = document.getElementById("show");
	show.value = "您点击的是：" + id.innerHTML;
}

function postLabel(id) {
    var storage = document.getElementById("storage");
    storage.value+=id+'/';
    // alert(document.getElementById("storage").value);
}

function deleteLabel() {
    var storage = document.getElementById("storage");
    var str = storage.value.split('/');
    if(!Array.isArray(str)){
        console.log("type error");
        return;
    }
    for(var i=0;i<str.length-2;i++)
        for(var j=i+1;j<str.length-1;j++){
            if(str[i]==str[j])
                str[i] = str[j] = null;
        }
    var number;
    for (var i=0;i<str.length-1;i++){
        if(str[i]==null)
            continue;
        else{
            number = i;
            break;
        }
    }
    var tag = str[number];
    for(var i=number+1;i<str.length-1;i++){
        if(str[i]!=null)
            tag += '/'+str[i];
    }
    $ajax({
        type:"post",
        url:"php/reset_user_tag.php",
        data:"tag="+tag,
    });
    window.location.href="main.html";
}