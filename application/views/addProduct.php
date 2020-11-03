<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/addProduct.css">
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>

    <h1 style="text-align: center;">Add Product</h1>
    <hr>
    <br><br>

    <input type="text" name="product_id" id="product_id" value="0" style="display: none;">


    <div class="contaier-form-view">
        <!-- From 1 -->
        <div class="page1">
            <form action="<?php echo base_url() ?>index.php/Main_controller/page1" method="post" id="page1">
                <input type="text" id="title" name="title" placeholder="Product Title" value="<?php echo set_value('title') ?>" ?> <?php echo form_error('title') ?> <br>
                <input type="text" name="page_status" value="page1" style="display: none;">
                <select name="category" value="<?php echo set_value('category') ?>" id="category"> <?php echo form_error('category') ?> <br>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Grocery">Grocery</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Fitness">Fitness</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Household">Household</option>
                </select><br><br>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description"><?php echo set_value('description') ?></textarea> <?php echo form_error('description') ?> <br> <br>
                <input type="submit" name="next" value="Next" />
            </form><br>
        </div>



        <a href="<?php echo base_url() ?>index.php/Main_controller/clearProducts"><button id="cancel">Cancel</button></a>

        <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
    </div>
</body>

</html>