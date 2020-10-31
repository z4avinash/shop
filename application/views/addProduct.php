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
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/addProduct.css">
</head>

<body>

    <h1 style="text-align: center;">Add Product</h1>
    <hr>
    <div class="progress">
        <span class="part-1">1</span><span class="part-2">2</span><span class="part-3">3</span><span class="part-4">4</span>
    </div><br><br>

    <input type="text" name="product_id" id="product_id" style="display: none;">

    <div class="page1">
        <form action="" method="post" id="page1" onsubmit="return false">

            <input type="text" id="title" name="title" placeholder="Product Title" value="<?php echo set_value('title') ?>" ?> <?php echo form_error('title') ?> <br>
            <input type="text" name="page_status" value="page1" style="display: none;">
            <select name="category" value="<?php echo set_value('category') ?>" id="category"> <?php echo form_error('category') ?> <br>
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
            <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description"><?php echo set_value('description') ?></textarea> <?php echo form_error('description') ?> <br> <br>
            <input onclick="savePage1andGoToPage2()" type="submit" name="next" class="next action-button" value="Next" />
        </form>
    </div>

    <div class="page2" style="display: none;">
        <form action="" method="post" id="page2" onsubmit="return false">
            <input type="text" name="page_status" value="page2" style="display: none;">
            <textarea name="highlight1" id="highlight1" cols="30" rows="10" placeholder="product highlights"></textarea><br><br>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" onclick="savePage2andGoToPage3()" class="next action-button" value="Next" />
        </form>
    </div>

    <div class="page3" style="display: none;">
        <form action="" method="post" id="page3" onsubmit="return false">

            <input type="text" name="page_status" value="page3" style="display: none;">
            <select style="font-size:15px" name=type id="type">
                <option selected disabled hidden>Type</option>
                <option value="Basic">Basic</option>
                <option value="Regular">Regular</option>
                <option value="Special">Special</option>
            </select>


            <div class="price" style="display:flex">
                <input type="number" width="60%" name="price" placeholder="Price" />
                <select style="font-size:13px" name=currency id="currency">
                    <option selected disabled hidden>Currency</option>
                    <option value="USD">USD</option>
                    <option value="INR">INR</option>
                    <option value="EUR">EUR</option>
                    <option value="Special">Special</option>
                </select>
            </div><br><br>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" onclick="savePage3andGoToPage4()" name="next" class="next action-button" value="Next" />
        </form>
    </div>

    <div class="page4" style="display: none;">
        <form action="" id="page4" method="post" onsubmit="return false">
            <input type="number" placeholder="quantity left" name="quantity"><br>
            <label>Available from: </label> <input type="date" name="start"><b></b>
            <label>Available to: </label><input type="date" name="end"><br>
            <label>Available on Dates: </label><input type="text" class="form-control date" name="multiDate" id="multiDate" placeholder="Pick the multiple dates"><br>
            <label>Availabile Days: </label><br>
            <div class="days" style="display: flex;">
                Mon: <input name="week" value="monday" type="checkbox">
                Tue: <input name="week" value="tuesday" type="checkbox">
                Wed: <input name="week" value="wednesday" type="checkbox">
                Thr: <input name="week" value="thrusday" type="checkbox">
                Fri: <input name="week" value="friday" type="checkbox">
                Sat: <input name="week" value="saturday" type="checkbox">
                Sun: <input name="week" value="sunday" type="checkbox">
            </div>
            <br>
            <label>Available from: </label><input type="time" name="start_time"><br>
            <label>Available to: </label><input type="time" name="end_time"><br><br>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="preview" class="preview" value="Preview" onclick="previewForm()" />
            </fieldset>
        </form>
    </div>

    <a href="<?php echo base_url() ?>index.php/Main_controller"><button id="cancel">Cancel</button></a>

    <script>
        //For Date Picker
        $('.date').datepicker({
            multidate: true,
            format: 'dd-mm-yyyy'
        });

        //save page1 and move to page 2
        function savePage1andGoToPage2() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'index.php/Main_controller/page1' ?>',
                data: $('#page1').serialize(),
                success: function(res) {
                    $('#product_id').attr('value', res);
                }
            });

            $('.part-1').css('background-color', 'green')
            document.querySelector('.page1').style.display = "none";
            document.querySelector('.page2').style.display = "block";
            document.querySelector('.page3').style.display = "none";
            document.querySelector('.page4').style.display = "none";
        }


        //save page 2 and move to page 3
        function savePage2andGoToPage3() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("index.php/Main_controller/page2/") ?>' + $('#product_id').val(),
                data: $('#page2').serialize(),
                success: function() {}
            });
            $('.part-1').css('background-color', 'green')
            $('.part-2').css('background-color', 'green')

            document.querySelector('.page1').style.display = "none";
            document.querySelector('.page2').style.display = "none";
            document.querySelector('.page3').style.display = "block";
            document.querySelector('.page4').style.display = "none";
        }

        //save page 3 and move to page 4
        function savePage3andGoToPage4() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("index.php/Main_controller/page3/") ?>' + $('#product_id').val(),
                data: $('#page3').serialize(),
                success: function() {}
            });
            $('.part-1').css('background-color', 'green')
            $('.part-2').css('background-color', 'green')
            $('.part-3').css('background-color', 'green')

            document.querySelector('.page1').style.display = "none";
            document.querySelector('.page2').style.display = "none";
            document.querySelector('.page3').style.display = "none";
            document.querySelector('.page4').style.display = "block";
        }

        //preview form
        //save page 3 and move to page 4
        function previewForm() {
            alert('not implemented yet');
        }
    </script>
    </div>
</body>

</html>