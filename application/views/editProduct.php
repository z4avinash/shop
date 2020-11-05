<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">Edit Products</h1>
    <hr><br><br>

    <form action="<?php echo base_url() ?>index.php/Main_controller/editProduct" method="post">

        <input type="text" id="title" name="title" placeholder="Product Title" value="<?php echo set_value('title', $product['title']) ?>" ?> <?php echo form_error('title') ?> <br>
        <input type="text" name="page_status" value="page1" style="display: none;">
        <select name="category" value="<?php echo set_value('category', $product['category']) ?>" id="category"> <?php echo form_error('category') ?> <br>
            <option selected disabled hidden>Category</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Electronics">Electronics</option>
            <option value="Grocery">Grocery</option>
            <option value="Medicine">Medicine</option>
            <option value="Fitness">Fitness</option>
            <option value="Clothing">Clothing</option>
            <option value="Accessories">Accessories</option>
            <option value="Household">Household</option>
        </select><br><br>
        <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description"><?php echo set_value('description', $product['description']) ?></textarea> <?php echo form_error('description') ?> <br> <br>
        <textarea name="highlight1" id="highlight1" cols="30" rows="10" placeholder="product highlights"><?php echo set_value('highlight1', $product['highlights']) ?></textarea><?php echo form_error('highlight1') ?><br><br>
        <select style="font-size:15px" name=type id="type" value="<?php echo set_value('type', $product['type']) ?>">
            <option selected disabled hidden>Type</option>
            <option value="Basic">Basic</option>
            <option value="Regular">Regular</option>
            <option value="Special">Special</option>
        </select>
        <div class="price" style="display:flex">
            <input type="text" width="60%" name="price" id="price" placeholder="Price" value="<?php echo set_value('price', $product['price']) ?>">
            <!-- <select style="font-size:13px" name=currency id="currency">
                <option selected disabled hidden>Currency</option>
                <option value="USD">USD</option>
                <option value="INR">INR</option>
                <option value="EUR">EUR</option>
            </select> -->
            <input type="number" placeholder="quantity left" name="quantity" value="<?php echo set_value('quantity_left', $product['quantity_left']) ?>"><br>
            <label>Available from: </label> <input type="text" name="available_startDate" value="<?php echo set_value('available_startDate', $product['available_startDate']) ?>"><br>
            <label>Available to: </label><input type="text" value="<?php echo set_value('available_endDate', $product['available_endDate']) ?>" name=" available_endDate"><br>
            <label>Available on Dates: </label><input type="text" class="form-control date" name="multiDate" id="multiDate" placeholder="Pick the multiple dates" value="<?php echo set_value('multiDate', $product['available_dates']) ?>"><br>
            <br>
            <label>Available from: </label><input type="text" name="start_time"><br>
            <label>Available to: </label><input type="text" name="end_time"><br><br>

    </form>



</body>

</html>