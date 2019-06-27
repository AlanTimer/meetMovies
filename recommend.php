<!DOCTYPE html>
<html lang="en" class="is-centered is-bold">
<head>
    <meta charset="UTF-8" name="referrer" content="never">
    <title>影友</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container" style="padding-top: 20px;">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                影友网站影片列表
            </div>

            <center>
            <form action="recommend_server.php" method="post" >
                <input name="word" type="text">
                <input type="submit" value="搜索">
            </form>
            </center>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                        <th>图片</th>
                        <th>ID</th>
                        <th>名称</th>
                        <th>类型</th>
                        <th>上映时间</th>
                        <th>评分</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $row){ ?>
                        <tr>
                            <td>
                                <img src=" <?php echo $row['picture'] ?>">
                            </td>
                            <td>
                            <td class="table-text">
                                <?php echo $row['Id'] ?>
                            </td>
                            <td class="table-text">
                                <?php echo $row['name'] ?>
                            </td>
                            <td class="table-text">
                                <?php echo $row['type'] ?>
                            </td>
                            <td class="table-text">
                                <?php echo $row['release_date'] ?>
                            </td>
                            <td><?php echo $row['score'] ?></td>
                            <td>
                                <button class="btn btn-info edit">详细信息</button>
                            </td>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

