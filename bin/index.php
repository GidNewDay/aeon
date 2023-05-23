<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="log">
        <div class="login-form" style="display:<?= (!$_COOKIE['login']) ? '' : 'none'; ?>">
            <p>Login: <input type="text" id="login"></p>
            <p>Password: <input type="text" id="pass"></p>
        </div>
        <button class="login">Log<?= (!$_COOKIE['login']) ? 'in' : 'out'; ?></button>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('button.login').on('click', function() {
                $.post(
                    "login.php", {
                        "login": $("#login").val(),
                        "pass": $("#pass").val()
                    },
                    function(data) {
                        if (data == 1) {
                            $('.login-form').hide();
                            $('.login').text('Logout');
                            $("#login").val('');
                            $("#pass").val('')
                        } else {

                            $('.login-form').show();
                            $('.login').text('Login');
                        }
                    }
                )
            });

        })
    </script>
</body>

</html>