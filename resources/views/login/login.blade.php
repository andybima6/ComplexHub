<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="#">
            <img src="img/Logo.png" alt="">
            <h2>ComplexHub</h2>
            <h3 style="color: white;">Login</h3>
            <div class="input-field">
                <input type="text" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label>Password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember Me</p>
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
            <div class="register">
                <p>Make Account : <a href="#">Daftar</a></p>
            </div>
        </form>

        <!-- Login Salah -->
        <!-- <form action="#">
            <img src="img/Logo.png" alt="">
            <h2>ComplexHub</h2>
            <h3 style="color: white;">Login</h3>
            <div class="input-field">
                <input type="text" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label>Password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember Me</p>
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <div class="alert alert-danger" role="alert" style="margin: 5px; padding: 10px;">
                *username / password salah
            </div>
            <button type="submit">Login</button>
            <div class="register">
                <p>Make Account : <a href="#">Daftar</a></p>
            </div>
        </form> -->
    </div>

    <!-- Pemulihan Akun -->
    <!-- <div class="pemulihan" style="background-color: white;">
        <img src="img/gembok.png" alt="" style="width: 45px;">
        <div class="boxPemulihan">
            <h1 class="textPemulihan">Pemulihan Akun</h1>
            <form>
                <h2 style="color: black; margin-right: auto; font-family: 'Times New Roman', Times, serif;">Masukkan Password Baru</h2>
                <input type="password" id="password" name="password">
                <label for="tampilkanSandi" style="margin-right: auto;">
                    <input type="checkbox" id="tampilkanSandi" style="accent-color: green;">
                    <p style="font-size: 13px; font-family: 'Times New Roman', Times, serif; display: inline-block; margin-left: 5px;">Tampilkan Kata Sandi</p>
                  </label>
                <button type="submit">Login</button>
            </form>
        </div>
    </div> -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
