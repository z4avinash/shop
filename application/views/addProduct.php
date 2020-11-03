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
    <div class="progress">
        <span onclick="gotoPage1()" class="part-1">1</span><span onclick="gotoPage2()" class="part-2">2</span><span onclick="gotoPage3()" class="part-3">3</span><span onclick="gotoPage4()" class="part-4">4</span>
    </div><br><br>

    <input type="text" name="product_id" id="product_id" value="0" style="display: none;">


    <div class="contaier-form-view">
        <!-- From 1 -->
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
            </form><br>
        </div>

        <!-- Form 2 -->
        <div class="page2" style="display: none;">
            <form action="" method="post" id="page2" onsubmit="return false">
                <input type="text" name="page_status" value="page2" style="display: none;">
                <textarea name="highlight1" id="highlight1" cols="30" rows="10" placeholder="product highlights"></textarea><br><br>
                <input type="button" name="previous" onclick="fromPage2ToPage1()" class="previous action-button" value="Previous" />
                <input type="button" name="next" onclick="savePage2andGoToPage3()" class="next action-button" value="Next" />
            </form>
        </div>


        <!-- Form 3 -->
        <div class="page3" style="display: none;">
            <button id="add">Add More Types</button><br><br>

            <form action="" class="type-selection" method="post" id="page3" onsubmit="return false">
                <div class="types-container">
                    <input type="text" value="0" id="ptypeId0" name="ptypeId0" style="display: none;">
                    <input type="text" name="page_status" value="page3" style="display: none;">
                    <select name=type id="type" value="<?php echo set_value('type') ?>">
                        <option selected disabled hidden>Type</option>
                        <option value="Basic">Basic</option>
                        <option value="Regular">Regular</option>
                        <option value="Special">Special</option>
                    </select>
                    <div class="price" style="display:flex">
                        <input type="number" width="60%" id="price" name="price" placeholder="Price" />
                        <select name=currency id="currency">
                            <option selected disabled hidden>Currency</option>
                            <option value="USD">USD</option>
                            <option value="INR">INR</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                </div>
                <input type="button" onclick="fromPage3ToPage2()" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" onclick="savePage3andGoToPage4()" name="next" class="next action-button" value="Next" />
            </form>
        </div>



        <!-- Form 4 -->

        <div class="page4" style="display: none;">
            <form action="" id="page4" method="post" onsubmit="return false">
                <input type="text" name="page_status" value="page4" style="display: none;">
                <input type="number" placeholder="quantity left" name="quantity"><br>
                <label>Available from: </label> <input type="date" name="available_startDate"><b></b>
                <label>Available to: </label><input type="date" name="available_endDate"><br>
                <label>Available on Dates: </label><input type="text" class="form-control date" name="multiDate" id="multiDate" placeholder="Pick the multiple dates"><br>
                <br>
                <label>Available from: </label><input type="time" name="start_time"><br>
                <label>Available to: </label><input type="time" name="end_time"><br><br>
                <input type="button" onclick="fromPage4ToPage3()" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="preview" class="preview" value="Preview" onclick="previewForm()" />
            </form>
        </div>
    </div>


    <div class="preview-form-view" style="display: none;"></div>




    <a href="<?php echo base_url() ?>index.php/Main_controller/clearProducts"><button id="cancel">Cancel</button></a>

    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
    </div>
</body>

</html>