<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="<?php echo base_url() ?>index.php/Main_controller/addUserToDB" method="post">
            <div class="full_name">
                <label>Full Name: </label> <input type="text" placeholder="enter your name" name="full_name" id="full_name" value="<?php echo set_value('full_name') ?>"><?php echo form_error('full_name') ?>
            </div><br>


            <div class="email">
                <label>E-mail: </label> <input type="text" placeholder="enter your email" name="email" id="email" value="<?php echo set_value('email') ?>"><?php echo form_error('email') ?>
            </div><br>


            <div class="password">
                <label>Password: </label> <input type="password" placeholder="create a password" name="password" id="password" value="<?php echo set_value('password') ?>"><?php echo form_error('password') ?>
            </div><br>

            <div class="phone">
                <label>Phone: </label> <input type="text" placeholder="enter your phone no." name="phone" id="phone" value="<?php echo set_value('phone') ?>"><?php echo form_error('phone') ?>
            </div><br>

            <div class="gender">
                <label>Gender: </label><br>
                Male: <input type="radio" name="gender" value="male">&nbsp;&nbsp;&nbsp;
                Female: <input type="radio" name="gender" value="female">&nbsp;&nbsp;&nbsp;
                Others: <input type="radio" name="gender" value="others"><br>
            </div><br>

            <div class="country">
                <label>Country: </label><br>
                <select name="country" id="country">
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="Japan">Japan</option>
                    <option value="Russia">Russia</option>
                    <option value="Canada">Canada</option>
                </select>
            </div><br>

            <div class="city">
                <label>City: </label><br>
                <select name="city" id="city">
                    <option value="muzaffarpur">Muzaffarpur</option>
                    <option value="mohali">Mohali</option>
                    <option value="greenland">Greenland</option>
                    <option value="amsterdam">Amsterdam</option>
                    <option value="patna">Patna</option>
                </select>
            </div><br><br>

            <input type="submit" value="Add User">
        </form><br>
        <a href="<?php echo base_url() ?>index.php/Main_controller"><button id="cancel">Cancel</button></a>
    </div>
</body>

</html>