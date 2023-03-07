<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @embedstyles('C:\xampp\htdocs\laravel\proyecto1\resources\css\login.css')
</head>

<body style="overflow: hidden">
    <div style="width: 50vw">
        <img class="loginPageImage"
            src="https://assets.dicebreaker.com/slay-the-spire-the-board-game-enemy-cards.png/BROK/thumbnail/1600x900/quality/100/slay-the-spire-the-board-game-enemy-cards.png" />
    </div>

    <div class="formContainer">
        <form method="POST">
            <div class="inputsContainer">
                <label class="labelStyle">Usuario</label>
                <input type="text" class="inputStyle" />
                <label class="labelStyle">Contraseña</label>
                <input type="password" class="inputStyle" />
                <input type="button" class="loginButton" value="LOGIN">
            </div>
        </form>
        <div style="display: flex; justify-content: center"><span style="text-align: center">or</span></div>
        <form method="POST">
            <div class="inputsContainer">
                <input type="button" class="loginButton registerButton" value="REGISTER">
            </div>
    </div>


</body>

</html>
