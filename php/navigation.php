<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxadaf2ed0f4503504", "65bcc63e9e0f957718ed3f2ed38d7e7b");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>路线查询</title>
</head>
<body>
<div id="l-map"></div>
<div id="r-result"></div>
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


  wx.ready(function () {
    // 在这里调用 API
//  使用getLocation接口获取地理位置坐标
    wx.getLocation({
      success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        var p2 = prompt("请输入您的目的地","");

        self.location.href= "http://api.map.baidu.com/direction?origin=latlng:"+latitude+","+longitude+"|name:当前位置&destination="+p2+"&mode=driving&region=赣州&output=html&src=yourCompanyName|yourAppName"
      }
    });
  });

</script>
</html>

