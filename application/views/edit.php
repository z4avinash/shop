<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="full_name">
                <label>Full Name: </label> <input type="text" placeholder="enter your name" name="full_name" id="full_name" value="<?php echo set_value('full_name', $user['full_name']) ?>"><?php echo form_error('full_name') ?>
            </div><br>


            <div class="email">
                <label>E-mail: </label> <input disabled type="text" placeholder="enter your email" name="email" id="email" value="<?php echo set_value('email', $user['email']) ?>"><?php echo form_error('email') ?>
            </div><br>


            <div class="password">
                <label>Password: </label> <input type="password" placeholder="create a password" name="password" id="password" value="<?php echo set_value('password', $user['password']) ?>"><?php echo form_error('password') ?>
            </div><br>

            <div class="phone">
                <label>Phone: </label> <input type="text" placeholder="enter your phone no." name="phone" id="phone" value="<?php echo set_value('phone', $user['phone']) ?>"><?php echo form_error('phone') ?>
            </div><br>

            <div class="gender">
                <label>Gender: </label><br>
                Male: <input type="radio" name="gender" value="male" <?php if ($user['gender'] == 'male') {
                                                                            echo 'checked = "checked"';
                                                                        } ?>>&nbsp;&nbsp;&nbsp;
                Female: <input type="radio" name="gender" value="female" <?php if ($user['gender'] == 'female') {
                                                                                echo 'checked = "checked"';
                                                                            } ?>>&nbsp;&nbsp;&nbsp;
                Others: <input type="radio" name="gender" value="others" <?php if ($user['gender'] == 'others') {
                                                                                echo 'checked = "checked"';
                                                                            } ?>><br>
            </div><br>

            <div class="country">
                <label>Country: </label><br>
                <select name="country" id="country">
                    <option value="India" <?php if ($user['country'] == 'India') {
                                                echo 'selected = "selected"';
                                            } ?>>India</option>

                    <option value="USA" <?php if ($user['country'] == 'USA') {
                                            echo 'selected = "selected"';
                                        } ?>>USA</option>

                    <option value="Japan" <?php if ($user['country'] == 'Japan') {
                                                echo 'selected = "selected"';
                                            } ?>>Japan</option>
                    <option value="Russia" <?php if ($user['country'] == 'Russia') {
                                                echo 'selected = "selected"';
                                            } ?>>Russia</option>
                    <option value="Canada" <?php if ($user['country'] == 'Canada') {
                                                echo 'selected = "selected"';
                                            } ?>>Canada</option>
                </select>
            </div><br>

            <div class="city">
                <label>City: </label><br>
                <select name="city" id="city">
                    <option value="Muzaffarpur" <?php if ($user['city'] == 'Muzaffarpur') {
                                                    echo 'selected = "selected"';
                                                } ?>>Muzaffarpur</option>
                    <option value="Mohali" <?php if ($user['city'] == 'Mohali') {
                                                echo 'selected = "selected"';
                                            } ?>>Mohali</option>
                    <option value="Greenland" <?php if ($user['city'] == 'Greenland') {
                                                    echo 'selected = "selected"';
                                                } ?>>Greenland</option>
                    <option value="Amsterdam" <?php if ($user['city'] == 'Amsterdam') {
                                                    echo 'selected = "selected"';
                                                } ?>>Amsterdam</option>
                    <option value="Patna" <?php if ($user['city'] == 'Patna') {
                                                echo 'selected = "selected"';
                                            } ?>>Patna</option>
                    <option value="California" <?php if ($user['city'] == 'California') {
                                                    echo 'selected = "selected"';
                                                } ?>>California</option>

                </select>
            </div><br><br>

            <input type="submit" value="Update User">
        </form>
        <br>
        <a href="<?php echo base_url() ?>index.php/Main_controller/list"><button id="cancel">Cancel</button></a>
    </div>
</body>

</html>