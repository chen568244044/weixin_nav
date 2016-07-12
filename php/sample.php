<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxadaf2ed0f4503504", "65bcc63e9e0f957718ed3f2ed38d7e7b");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>路线规划</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- 可选的Bootstrap主题文件（一般不用引入） -->
  <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
  </style>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=DwPMIjhh5rANTu0Gl65Mdl5mMX2p8nDY"></script>

</head>
<body>
<div id="allmap"></div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

  var map = new BMap.Map("allmap");
  map.centerAndZoom(new BMap.Point(114.941260, 25.837179), 11);

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


  wx.ready(function () {
    // 在这里调用 API
//  使用getLocation接口获取地理位置坐标
    wx.getLocation({
      success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        var p1 = new BMap.Point(longitude,latitude);
        var p2 = prompt("请输入您的目的地","");

        var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
        driving.search(p1, p2);
      },
      cancel: function (res) {
        alert('用户拒绝授权获取地理位置');
      }
    });
  });




</script>

<!--<script type="text/javascript">-->
<!---->
<!---->
<!---->
<!--  // 百度地图API功能-->
<!--  var map = new BMap.Map("allmap");-->
<!--  map.centerAndZoom(new BMap.Point(114.941260, 25.837179), 11);-->
<!---->
<!---->
<!--  var p1 = new BMap.Point(,);-->
<!--  var p2 = new BMap.Point(114.931132,25.895760);-->
<!---->
<!--  var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});-->
<!--  driving.search(p1, p2);-->
<!--</script>-->
</html>

