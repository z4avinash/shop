<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome, <?php echo $user['full_name'] ?></h1>
    <a href="<?php echo base_url() ?>index.php/Main_controller/logout"><button id="logout">Log Out</button></a>
    <a href="<?php echo base_url() ?>index.php/Main_controller/addProduct"><button id="addProduct">Add Product</button></a>
    <a href="<?php echo base_url() ?>index.php/Main_controller/unpublishedProducts"><button id="viewProduct">Unpublished Products</button></a>
    <a href="<?php echo base_url() ?>index.php/Main_controller/viewProduct"><button id="viewProduct">View Products</button></a>



    <br><br><br><br><br>

</body>

</html>