<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScanQR</title>
    <link rel="stylesheet" href="{{asset('src/styles1.css')}}">
</head>
<body>
    <div id="container">
        <h1>QR Code Scanner</h1>

        <a id="btn-scan-qr">
            <img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg">
        </a>

        <canvas hidden="" id="qr-canvas"></canvas>

        <div id="qr-result" hidden="">
            <b>Data:</b> <span id="outputData"></span>
        </div>
    </div>

    <script src="./src/qrCodeScanner.js"></script>
</body>
</html>
