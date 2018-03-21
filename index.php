<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
if(!$_POST){
?>
<html><head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>挂机查询</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>
<div class="container">
<div class="panel panel-default panel-body" id="main">
<div class="row">
<div class="col-md-9" id="contentframe">
<h2>挂机状态查询</h2>
<p>Github:<a href="https://github.Com/lovezm" target="_blank">lovezm</a>
  </p>
<div class="tang-form">
<form>
<input class="form-control" placeholder="请输入您的登录账号" type="text" id="dd"><br>
<div id="content" style="text-align: justify;"></div>
<div id="sb"></div>
</form>
<button id="sub" class="btn btn-success btn-block">Obtain</button>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#sub').click(function() {
        var dd = $("#dd").val();
        $("#sb").html('Sending requests...');
        $.ajax({
            url: "index.php",
            data: {
                ddh: dd,
                type: 1
            },
            type: "POST",
            success: function(data) {
                    $("#sb").html(data);
            }
        });
    });
});
</script>
</body></html>

<?php }
$json1=file_get_contents('options/options.json');
$json_string=$json1;
$arr = json_decode($json_string,true);

if(isset($_REQUEST['ddh'])){
$userName=$_POST['ddh'];
$nickname=[];//nickname=备注

$biliUID=[];
//功能状态
$status=[];//开关
$doSign=[];//签到
$treasureBox=[];//宝箱
$eventRoom=[];//每日任务
$silver2coin=[];//兑换硬币
$getCapsule=[];//获取扭蛋币
$raffle=[];//活动抽奖-小电视
$sendGift=[];//自动送礼
$sendGiftRoom=[];//房间号
$signGroup=[];//应援团签到

$user=array_column($arr['user'],null,'userName');

$status=$user[$userName]['status'];
$doSign=$user[$userName]['doSign'];
$treasureBox=$user[$userName]['treasureBox'];
$nickname=$user[$userName]['nickname'];
$treasureBox=$user[$userName]['treasureBox'];
$silver2coin=$user[$userName]['silver2coin'];
$getCapsule=$user[$userName]['getCapsule'];
$raffle=$user[$userName]['raffle'];
$sendGift=$user[$userName]['sendGift'];
$sendGiftRoom=$user[$userName]['sendGiftRoom'];
$signGroup=$user[$userName]['signGroup'];
$biliUID=$user[$userName]['biliUID'];


$endtime=$user[$userName]['nickname'];
echo '您要查询的账号是：'.$userName;
echo '<br>';
if($status==true){
    echo '您的哔哩哔哩UID是：'.$biliUID;
    echo '<br>';
    echo '状态：开启状态~';
    echo '<br>';
    echo '您的用户名(与B站无关)：'.$nickname;
    if($doSign==true){
        echo '<br>';
        echo '签到：开启';
    } else{
        echo '<br>';
        echo '签到：关闭';
    }
    if($treasureBox==true){
        echo '<br>';
        echo '宝箱：开启';
    } else{
        echo '<br>';
        echo '宝箱：关闭';
    }
    if($silver2coin==true){
        echo '<br>';
        echo '兑换硬币：开启';
       
    } else{
        echo '<br>';
        echo '兑换硬币：关闭';
    }
    if($getCapsule==true){
        echo '<br>';
        echo '获取扭蛋币：开启';
    } else{
        echo '<br>';
        echo '获取扭蛋币：关闭';
    }
    if($raffle==true){
        echo '<br>';
        echo '活动抽奖：开启';
    } else{
        echo '<br>';
        echo '活动抽奖：关闭';
    }
    if($sendGift==true){
        echo '<br>';
        echo '自动送礼：开启 / ';
        echo '赠送给：'.$sendGiftRoom;
    }else{
        echo '<br>';
        echo '自动送礼：关闭';
    }
    if($signGroup==true){
        echo '<br>';
        echo '应援团签到：开启';
    }else{
        echo '<br>';
        echo '应援团签到：关闭';
    }
}else {
    echo '状态：已经关闭或者不存在该账号';
    
}
}
?>
