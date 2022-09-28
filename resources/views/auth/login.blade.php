<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>PraBAC-2022</title>
    <link rel="shortcut icon" href="/images/telkom-logo-small.png" />
    <!-- <link rel="shortcut icon" href="/assets/favicon.ico"> -->
    <link rel="stylesheet" href="src/main.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
    <div class="container">
        <form action="/login" method="POST">
            @csrf
            <h1 <center>
                <img src=" /images/wifi.png" style="margin-left: 0px;margin-top: -2px;" width="80"><b>Wifi.Id Monitor</b>
                </center>
            </h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="email" name="email" class="form__input" id="input_email" placeholder="Username">
                <div class="form__input-error-message"></div>
                <i class="fas fa-user"></i>
                <label>Please Enter Your Username/NIK</label>
            </div>
            <div class="form__input-group">
                <input type="password" name="password" class="form__input" id="input_password" placeholder="Password">
                <div class="form__input-error-message"></div>
                <label>Please Enter Your Password</label>
            </div>
            <div class="form__input-group">
                <span class="error_msg">Username atau password salah, Ulangi lagi.</span>
                <button class="form__button" type="submit">Sign In</button>
            </div>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </form>

    </div>
    <script src=".jquery.js"></script>
    <center>
        <h6>
            <font size="3">2022 &copy; PrabaC - Idwifi<br>PT. Telekomunikasi Indonesia Tbk.</font>
        </h6>
    </center>
    <script>
        var input_username = document.querySelector('#input_username');
        var input_password = document.querySelector("#input_password");
        var error_msg = document.querySelector("#.error_msg");

        $("#submit").submit(function(e) {
            e.preventDefault();

            if (input_username.value.length < 1) {
                error_msg.style.display = "inline-block";
                input_username.style.border = "1px solid #f74040";
                return false;
            }
            if (input_password.value.length < 1) {
                error_msg.style.display = "inline-block";
                input_username.style.border = "1px solid #f74040";
                return false;
            }
            error_msg.style.display = "none";
            alert("login Succesfully");
        })
    </script>
</body>

</html>