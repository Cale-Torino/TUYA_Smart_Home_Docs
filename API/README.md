# TUYA Smart Home API documentation

First create a TUYA development cloud account. Now you can create a project in order to get your `secret` and `client_id`

*Developed by C.A Torino*
* Links to TECHRAD South Africa.
    * [Website](https://www.techrad.co.za)
    * [Tutorials Site](https://tutorials.techrad.co.za)
    * [Support portal](https://support.techrad.co.za)
    * [F&Q](https://faq.techrad.co.za)
    * [TECHRAD API](https://tutorials.techrad.co.za/api)

`Access Token` [*Get the access token for the Tuya cloud API*]

* [Tuya Website](https://www.tuya.com).
* [Docs](https://developer.tuya.com/en/docs/iot).
* [Tuya Cloud Login](https://iot.tuya.com/user/account/info).
* [API Docs](https://developer.tuya.com/en/docs/iot/open-api/api-list/api/api?id=K989ru6gtvspg).
* [API Stats Section](https://developer.tuya.com/en/docs/iot/open-api/api-list/api/data-service?id=K95zu0f66bv4m#title-15-Statistical%20Data).

-------------------

### Calling Headers (Input)

*`N.B: These are headers not parameters`*

| Parameter  |  Mode  | Description  | example values  |
| :------------ | :------------ | :------------ | :------------ |
|`client_id`   |String |clients id           |guuth8ff3vo0o39ll7vb |
|`sign`        |String |signature            |60AED273C107826966B14176DA163E5AA8D55326278787B0472825A1ECBD722D |
|`t`           |String |time                 |1600770500059 |
|`sign_method` |String |signature method     |HMAC-SHA256 |

### Interface Address

https://openapi.tuyaeu.com/v1.0/token?grant_type=1

### Example Code jQuery

```HTML

//https://code.google.com/archive/p/crypto-js/downloads
//crypto libs for sign
<script src="CryptoJS/rollups/hmac-sha256.js"></script>
<script src="CryptoJS/components/enc-base64-min.js"></script>

```

```JS

//vars
var timestamp = getTime();
var clientId = "guuth8ff3vo0o39ll7vb";
var secret = "c9d18frae3745330a2ef08d953ftdd0a";
var sign = calcSign(clientId,secret,timestamp);
var easy_sign = "HMAC-SHA256";

//get current time
function getTime(){
    var timestamp = new Date().getTime();
    return timestamp;
}

//calculate sign
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

   //log to console
  console.log(response);

  //print to <div>
  $("#data").html(JSON.stringify(response));
});

```

### Request Method

- HTTP 
- GET 
- POST

### Response Parameters (Output)
| Parameter  |  Mode  | Description  | example values  |
| :------------ | :------------ | :------------ | :------------ |
|`access_token`   |String       |access token       |c9a7132d89c7e1b8ba58f1a1c0c4e64e |
|`expire_time`    |int          |expire time        |6320 |
|`refresh_token`  |String       |refresh token      |b13453054182b890aa7c5ec64f4e69f0 |
|`uid`            |String       |unique id          |gdf1597762466715mCZm |
|`success`        |bool         |success result     |true |
|`t`              |int          |time               |1600771382767 |


### Response Result Example
```json

{
   "result":{
      "access_token":"c9a7132d89c7e1b8ba58f1a1c0c4e64e",
      "expire_time":6320,
      "refresh_token":"b13453054182b890aa7c5ec64f4e69f0",
      "uid":"gdf1597762466715mCZm"
   },
   "success":true,
   "t":1600771382767
}

```

-------------------

* Useful links
    * [view markdown files offline](https://stackoverflow.com/questions/9843609/view-markdown-files-offline).
    * [mastering markdown tutorial](https://guides.github.com/features/mastering-markdown/).
    * [markdown to pdf](https://www.markdowntopdf.com/).
