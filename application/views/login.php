<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP | LOGIN</title>
</head>

<body>
    <form action="" method="post">
        <div class="login_email">
            <label>E-mail: </label><input type="text" placeholder="email@example.com" id="login_email" name="login_email" value="<?php echo set_value('login_email') ?>"><?php echo form_error('login_email') ?>
        </div>
        <br>
        <div class="login_password">
            <label>Password: </label><input type="password" placeholder="********" id="login_password" name="login_password" value="<?php echo set_value('login_password') ?>"><?php echo form_error('login_password') ?>
        </div>
        <br><br>
        <input type="submit" value="Log In" id="login-btn">
    </form>
</body>

</html>