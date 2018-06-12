<?php
$hostdir=dirname(__FILE__)."/images/5/6-1";
$filePaths = "/images/5/6-1/";
/*读取指定目录下的文件*/
$filesnames = scandir($hostdir);
unset($filesnames[0]);
unset($filesnames[1]);



foreach($filesnames as $key => $val ){
 
    $title = str_replace('.jpg','',$val);
    $title = str_replace('.png','',$title);
    $filePath = $filePaths.$val;

    /*html模板 */
    $htmlStr='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>'.$title.'</title>
    <link rel="stylesheet" href="../../style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"
    />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
</head>
<style>
    .main {
        padding: 0;
        background: #fff !important;
    }

    .main>section {
        margin-bottom: 0px;
    }

    section>a {
        margin-top: -131px;
    }

    #article>img:not([src]) {
        visibility: hidden;
    }

    #article>img::before {
        content: "";
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f0f3f9;
        visibility: visible;
    }

    #article>img::after {
        /* 黑色alt信息条 */
        content: attr("404");
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        line-height: 30px;
        background-color: rgba(0, 0, 0, .5);
        color: white;
        font-size: 14px;
        /* 来点过渡动画效果 */
        transition: transform .2s;
        visibility: visible;
    }
</style>

<body>

    <section class="main">
        <section id="article">
            <img src="../'.$filePath.'" alt="" srcset="">
        </section>

        <section style="text-align: center;position: relative;">
            <a style="margin-top: 49px;" href="../../home.html">
               <div style="position: absolute;left: 50%;width: 164px;height: 101px;border: 1px solid;border-color: #fff;opacity: 0;transform: translate(-50%,-154%);color: black;"></div>
            </a>
        </section>
    </section>
    <script src="../../js/app.js"></script>
</body>
</html>';
    /*创建文件夹 */
    $dirName = "public/";
    $dir = iconv("UTF-8", "GBK", $dirName);
    if (!file_exists($dir)){
        mkdir ($dir,0777,true);
        echo '创建文件夹bookcover成功'."\n";
    } else {
        /*echo '需创建的文件夹bookcover已经存在\n';*/
    }

    /*创建文件 */
    $fileNameHtml= $dirName."6-1-".$key.".html";
    $file = fopen($fileNameHtml, "w");
    fwrite($file, $htmlStr);
    echo $fileNameHtml.'文件创建成功'."\n";
    
}








