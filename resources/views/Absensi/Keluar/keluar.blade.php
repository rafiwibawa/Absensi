<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen Keluar</title>
</head>

<body>

    <div id="box">
        <div id="box1">
            <ul>
                <li><a class="active" href="/absen/masuk">Absen Masuk</a></li>
                {{-- <li><a href="#news">Keluar</a></li> --}}
                <li style="float:right"><a href="/login">Login</a></li>
              </ul>
        </div>
        <h1 style="color: rgb(3, 3, 3);" align="center">Absen Keluar</h1>
        <div>
            <form action="/absen/keluar" method="POST">
                @csrf
                @if (session('sudah'))
                <label style="color: rgb(9, 136, 57)">{{ session('sudah') }}</label>
                @endif
                @if (session('belum'))
                <label style="color: rgb(14, 38, 255)">{{ session('belum') }}</label>
                @endif
                @if (session('pesan'))
                <label style="color: rgb(248, 18, 18)">{{ session('pesan') }}</label>
                @endif
                @if (session('success'))
                <label style="color: rgb(9, 136, 57)">{{session('success')}}, Absen Pulang Berhasil</label>
                @endif <br>
                <label style="color: black" for="barcode">Scan Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Kode Karyawan" autofocus>
                <input style="background-color: rgb(9, 136, 57)" type="submit" value="Submit">
            </form>
        </div>
        <hr>
        <div id="box1">
            <table style="background-color: rgb(9, 136, 57); " width="455px" height="10px">
                <tr>
                    <td ><h1 id="jam"></h1></td>
                    <td><h1 id="menit"></h1></td>
                    <td><h1 id="detik"></h1></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
@include('Absensi.Keluar.script')
