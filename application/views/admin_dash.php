<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <a href="<?php echo base_url() ?>index.php/Main_controller/logout"><button id="logout">Log Out</button></a>


    <form action="<?php echo base_url() ?>index.php/Main_controller/create" method="post">
        <button id="create-user">Create User</button>
    </form>

    <a href="<?php echo base_url() ?>index.php/Main_controller/list">
        <button id="view-user">View Users</button>
    </a>
</body>

</html>