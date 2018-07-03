<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
    <link href="../../../public/css/main_page.css" rel="stylesheet">
    <link href="../../../public/css/additional.css" rel="stylesheet">
</head>
<body>
<div class="all">
    <div class="header">
        <div class="letter"><a href="/main/mainpage"><?=$login?></a></div>
        <a href="../Cabinet/cabinet"><img class="log_out_img" src="../../../public/images/cabinet.png"></a>
        <div><img id="snap" class="log_out_img" onclick="return start_cam()" src="../../../public/images/cam.jpg">
        </div>
        <label for="file">
            <input type="file" style="display: none" id="file" accept="image/png">
            <img id="down" class="log_out_img" src="../../../public/images/download.png">
        </label>
<!--        <form  id="form" action = "/cabinet/out" name="register_2"  method="POST">-->
            <a href="/cabinet/out"><img  id="out" class="log_out_img" src="../../../public/images/log_out.png"></a>
<!--        </form>-->
    </div>
    <div class="main">
        <div class="photo"><?=$photo?></div>
        <div class="container_tmp">
            <div class="row">
                <div class="col s12">
                    <ul id="pagination" class="pagination">
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="camera"><div class="stic"><img id = "img_choose" src=""></div>
            <video id="video_cam" width="400" height="0" autoplay="autoplay"></video>
            <div class="sticker">
                <img id = "img_1" onclick="return sticker()" class="size_fot" src="../../../public/images/img_1.png">
                <img id = "img_2" onclick="return sticker_1()" class="size_fot" src="../../../public/images/img_2.png">
                <img id = "img_3" onclick="return sticker_2()" class="size_fot" src="../../../public/images/img_3.png">
                <img id = "img_4" onclick="return sticker_3()" class="size_fot" src="../../../public/images/img_4.png">
            </div>
            <canvas id='canvas' width='400' height='0'></canvas></div>
    </div>
    <div class="footer">@skorotko</div>
<script src="../../../public/js/cam.js"></script>
<script src="../../../public/js/pagination.js"></script>
</body>
</html>