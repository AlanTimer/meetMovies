$(function () {
    window.onload=function(){
        var picture    = $('.my_head_img img').attr('src');
        var picture_url = "http://localhost/meetMovies/"+picture;
        /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
        xiuxiu.embedSWF("altContent",5,"100%","100%");
        //修改为您自己的图片上传接口
        xiuxiu.setUploadURL("http://localhost/meetMovies/php/image_upload.php");
        xiuxiu.setUploadType(2);
        xiuxiu.setUploadDataFieldName("File_data");
        xiuxiu.onInit = function ()
        {
            xiuxiu.loadPhoto(picture_url);//修改为要处理的图片url
        }
        xiuxiu.onUploadResponse = function (data)
        {
            alert("上传响应" + data);
            window.location.reload();
        }
    }
});

