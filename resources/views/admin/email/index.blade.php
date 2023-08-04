<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan</title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1 style="color: rgb(3, 3, 3)">
            Selamat <br>
            Akun Anda dengan nama {{ $namaPengguna }} telah berhasil diverifikasi.
        </h1>
        <a href="{{ $loginUrl }}" style="background-color: black;color:aliceblue;padding:15px;">Login
            Sekarang</a>

    </div>

</body>

</html>
