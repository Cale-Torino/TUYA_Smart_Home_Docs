<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<title>Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<h2>result:</h2>
<div id="data"></div>
<h2>IMEI query:</h2>
<div id="devices"></div>
<h2>NAME query:</h2>
<div id="names"></div>
<br>
<button id="btn" type="button" name="button">Send</button>
<script src="CryptoJS/rollups/hmac-sha256.js"></script>
<script src="CryptoJS/components/enc-base64-min.js"></script>
<script>

//url:https://openapi.tuyaeu.com
$(document).ready(function(){
$("#btn").click(function(){
var timestamp = getTime();
var clientId = "a343c34680333843";
var secret = "f26d520d9a46466e909142e1bc9f2cd5";
var sign = calcSign(clientId,secret,timestamp);
var easy_sign = "HMAC-SHA256";

function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

function calcSign(clientId,secret,timestamp){
    var str = clientId + timestamp;
    var hash = CryptoJS.HmacSHA256(str, secret);
    var hashInBase64 = hash.toString();
    var signUp = hashInBase64.toUpperCase();
    return signUp;
}

//JavaScript jQuery method
var settings = {
  "url": "https://openapi.tuyaeu.com/v1.0/token?grant_type=1",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "client_id": clientId,
    "sign": sign,
    "t": timestamp,
    "sign_method": easy_sign
  },
};

$.ajax(settings).done(function (response) {
  console.log(response);
  $("#data").html(JSON.stringify(response));
});
});
});

</script>
</body>
</html>