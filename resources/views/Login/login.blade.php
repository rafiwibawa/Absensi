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
                {{-- <li style="float:right"><a href="/absen/keluar">Absen Keluar</a></li> --}}
            </ul>
        </div>
        <h1 style="color: rgb(3, 3, 3);" align="center">Login</h1>
        <div>

            <form action="/login" method="POST">
                @csrf
                <label for="email" style="color: black">Email/Username</label><br><br>
                <input type="text" id="email" name="email"
                    placeholder="Your email.."><br><br>

                <label for="name" style="color: black">Password</label><br><br>
                <input style="height: 30px; width: 98%;" type="password" id="password" name="password"
                    placeholder="Your Password.."><br><br>
                
                    <a class="btn btn-link" href="/request">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    
                @if (session('alert'))
                <label style="color: rgb(248, 18, 18)">{{ session('alert') }}</label>
                @endif
                <input type="submit" value="Submit">
            </form>
        </div>
        <hr>
    </div>
</body>

</html>
@include('Login.script')
