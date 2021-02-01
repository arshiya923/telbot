<?php
    $tel_api = 'https://api.telegram.org/bot1447496536:AAE6dOUlrgVKdEesnLJsXN6s-zIIgUXC-8w';
    $chatId = '-1001298889246';
    if (isset($_POST['Text']))
    {
        if ($_POST['ispro'] == "pro"){
            $chatId = $_POST['chatid'];
        }
        $query = http_build_query(array('chat_id'=>$chatId,'text'=>$_POST['Text']));
        $url = $tel_api."/sendmessage?".$query;
        file_get_contents($url);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymus</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        @media screen and (min-width: 768px){
            .textinput::placeholder{
                padding-right: 50px;
            }
        }
        @font-face {
            font-family: Dana;
            src: url(dana-regular.woff2);
        }
        body, html{
            width: 100%;
            height: 100%;
            font-family: Dana
        }
        body{
            direction: rtl;
            background-image: url(bg.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
        }
        .box{
            border-radius: 10px;
            border: 2.5px solid #fff;
            background-color: rgba(156,155,155,0.65);                        
        }
        .submitbtn{
            border: 0;
            width: 50px;
            height: 50px;
            background-size: 50% 50%;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #2B2B2B;
            background-image: url(telegram.svg);;
        }
        .textinput{
            background-color: #2B2B2B;
            border-radius: 10px;
            outline: none;
            border: none;
        }
        #prof,#normal{
            transition: 400ms all;
        }
        .left{
            background-color: #2B2B2B;
            border: 2px solid #2B2B2B!important;
            border-left: none!important;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
        }
        .right{
            background: #dee2e6;
            border: 2px solid #2B2B2B!important;
            border-right: none!important;
            color: #2B2B2B;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }
        #chatID{
            text-align: center;
        }
        #chatID::placeholder{
            padding-right: initial;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-100">
        <form action="" method="POST" class="w-100">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 box">
                    <div class="row p-3 rounded">
                        <input class="col-10 text-white p-3 rounded textinput" type="text" name="Text" placeholder="یه چیزی بنویس تا شوت شه تو گپ :))">
                        <div class="col-2">
                            <input class="submitbtn rounded" type="submit" value=" ">
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="row text-center text-white">
                                <div class="left d-inline-block col-6 border p-3" id="normal" onclick="Click(0)">ساده</div>
                                <div class="right d-inline-block col-6 border p-3" id="prof" onclick="Click(1)">پیشرفته</div>
                                <input type="hidden" value="normal" name="ispro" id="ispro">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row p-2 d-none" id="pro">
                        <div class="col-12 col-md-8 text-center text-white">
                            <span class="text-warning">اگه می خوای از حالت پیشرفته استفاده کنی اول قوانین زیر رو ببین !!!</span>
                            <p class="mt-2 mb-0" style="font-size: 0.8rem">1- اول مطمعن شو ربات ( @elrobot_boali_bot ) داخل اون گروه وجود داره.</p>
                            <p class="mt-1 mb-0" style="font-size: 0.8rem">2- بعدش با یه ربات دیگه مثه ( @my_id_bot ) باید چت آی دی تون رو پیدا کنید.</p>
                            <p class="mt-1" style="font-size: 0.8rem">3- چت آی دی رو پیست کنید داخل کادر ، پیامتون رو بنویسید و ارسال رو بزنید.</p>
                        </div>
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                            <input class="col-10 text-white p-3 rounded textinput" id="chatID" type="text" name="chatid" placeholder="چت آی دی">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
    <div class="fixed-bottom container text-center">
        <img src="footer.svg" alt="" style="max-width: 500px;max-height: 100px;">
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="jquary.js"></script>
    <script>
        function Click(i) {
            switch (i) {
                case 0:
                    $('#pro').addClass('d-none');
                    $('#normal').css({'background-color':'#2B2B2B','color':'#fff'});
                    $('#prof').css({'background-color':'#dee2e6','color':'#2B2B2B'});
                    document.getElementById('ispro').value = "normal";
                    break;
                case 1:
                    $('#pro').removeClass('d-none');
                    $('#prof').css({'background-color':'#2B2B2B','color':'#fff'});
                    $('#normal').css({'background-color':'#dee2e6','color':'#2B2B2B'});
                    document.getElementById('ispro').value = "pro";
                    break;
            }
            console.log(document.getElementById('ispro').value);
        }
    </script>
</body>
</html>