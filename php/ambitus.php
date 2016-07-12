<?php
//require_once "jssdk.php";
//$jssdk = new JSSDK("wxadaf2ed0f4503504", "65bcc63e9e0f957718ed3f2ed38d7e7b");
//$signPackage = $jssdk->GetSignPackage();
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>服务区查询</title>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <script src="JS/jquery-3.0.0.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>

</head>
<body>
<div id="l-map"></div>
<div id="r-result"></div>
<div class="container">
    <img class="img-responsive" src="img/bi1.jpg">
    <br/>
    <form>
        <div class="form-group has-primary has-feedback">
            <label class="control-label" for="inputGroupSuccess1">请输入你想去的地方</label>
            <div class="input-group">
                <input type="text" class="form-control" id="inputGroupSuccess1"
                       aria-describedby="inputGroupSuccess1Status">
                <span class="input-group-addon"><a onclick="">确定</a></span>
            </div>
        </div>
    </form>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'getLocation'
        ]
    });

    weizhi({
        wx.ready(function () {
        // 在这里调用 API
        //  使用getLocation接口获取地理位置坐标
        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                self.location.href = "http://m.amap.com/?k=高速服务区&user_loc=" + longitude + "," + latitude + "&adcode=110000"
            }
        });
    });
    });


</script>
</html>

