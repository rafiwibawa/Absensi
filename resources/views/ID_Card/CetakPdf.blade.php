<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak ID-Card</title>
</head>

<body>
    <h6 align="center">
        <img class="tengah" style="height: 30px; width: 30px;" src="img/logo.png" >
        
        <br>
            WebAplikasi Absensi </h6>
    <div id="box1">
        
    </div>
    <br>
    <div class="header">
        <p><img width="300" height="70" src="data:image/png;base64,{{base64_encode($barcode)}}"><br>
            {{$user->barcode}}
            <hr>
        </p>
    </div>
    <h6 align="center">
        sixghakreasi.com
        Aplikasi Absensi Karyawan Dengan Barcode Berbasis WebAplikasi Absensi </h6>
</body>

</html>
<style>
    img.tengah {
    display: flex;
    /* margin-left: auto;
    margin-right: auto; */
    align-content: center
    }
    .header {
        text-align: center;
        line-height: 1.2;
    }

    #box1 {
        width: 120px;
        height: 120px;
        border: solid 3px black;
        margin: 0 auto;
    }

</style>
