<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">User List</h1>
    <a href="<?php echo base_url() ?>index.php/Main_controller"><button id="cancel">Dashboard</button></a>
    <hr><br><br>
    <?php
    $type = '';
    foreach ($users as $user) {
        if ($user['is_admin']) {
            $type = 'Admin';
        } else {
            $type = 'Seller';
        }
        echo "<div class='container'>
        <span id='user-id'>U-ID: </span>{$user['user_id']}<br><br>
        <span id='user-type'>Type: </span>{$type}<br>
        <span id='user-name'>Name: </span>{$user['full_name']}<br>
        <span id='user-email'>Email: </span>{$user['email']}<br>
        <span id='user-gender'>Gender: </span>{$user['gender']}<br>
        <span id='user-phone'>Phone: </span>{$user['phone']}<br>
        <span id='user-country'>Country: </span>{$user['country']}<br>
        <span id='user-city'>City: </span>{$user['city']}<br><br>
        <a href='edit/{$user['user_id']}'><button>Edit</button></a>
        <a href='delete/{$user['user_id']}'><button>Delete</button></a>
        </div><hr><br>";
    }

    ?>
</body>

</html>