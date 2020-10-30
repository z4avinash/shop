<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/addProduct.css">
</head>

<body>
    <h1 style="text-align: center;">Add Product</h1>
    <hr>
    <!-- multistep form -->
    <form id="msform">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Step 1</li>
            <li>Step 2</li>
            <li>Step 3</li>
            <li>Step 4</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Add Product</h2>
            <h3 class="fs-subtitle">This is step 1</h3>
            <input type="text" name="title" placeholder="Product Title" />
            <input type="text" name="description" placeholder="Description" />

            <select style="padding: 10px; width:100%; margin-bottom:10px; font-size:15px" name="category" id="category">
                <option selected disabled hidden>Category</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Electronics">Electronics</option>
                <option value="Grocery">Grocery</option>
                <option value="Medicine">Medicine</option>
                <option value="Fitness">Fitness</option>
                <option value="Clothing">Clothing</option>
                <option value="Accessories">Accessories</option>
                <option value="Household">Household</option>
            </select>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Product Description"></textarea>
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Highlights</h2>
            <h3 class="fs-subtitle">Add specifications of your product</h3>
            <input type="text" name="highlight1" placeholder="highlight1" />
            <input type="text" name="highlight2" placeholder="highlight2" />
            <input type="text" name="highlight3" placeholder="highlight3" />
            <input type="text" name="highlight4" placeholder="highlight4" />
            <input type="text" name="highlight5" placeholder="highlight5" />
            <input type="text" name="highlight6" placeholder="highlight6" />
            <input type="text" name="highlight7" placeholder="highlight7" />
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>


        <fieldset>
            <h2 class="fs-title">More Details</h2>
            <h3 class="fs-subtitle">More Details</h3>

            <select style="padding: 10px; width:100%; margin-bottom:10px; font-size:15px" name=type id="type">
                <option selected disabled hidden>Type</option>
                <option value="Basic">Basic</option>
                <option value="Regular">Regular</option>
                <option value="Special">Special</option>
            </select>


            <div class="price" style="display:flex">
                <input type="number" width="60%" name="price" placeholder="Price" />
                <select style="padding: 10px; width:40%; margin-bottom:10px; font-size:13px" name=type id="type">
                    <option selected disabled hidden>Currency</option>
                    <option value="USD">USD</option>
                    <option value="INR">INR</option>
                    <option value="EUR">EUR</option>
                    <option value="Special">Special</option>
                </select>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>

        <fieldset>
            <h2 class="fs-title">Product Availability</h2>
            <h3 class="fs-subtitle">Availability Time</h3>
            <input type="number" placeholder="quantity left" name="quantity">
            <label>Available from: </label> <input type="date" name="start">
            <label>Available to: </label><input type="date" name="end">
            <label>Available on Dates: </label><input type="text" class="form-control date" name="multiDate" id="multiDate" placeholder="Pick the multiple dates">
            <label>Availabile Days: </label>
            <div class="days" style="display: flex;">
                Mon: <input name="week" value="monday" type="checkbox">
                Tue: <input name="week" value="tuesday" type="checkbox">
                Wed: <input name="week" value="wednesday" type="checkbox">
                Thr: <input name="week" value="thrusday" type="checkbox">
                Fri: <input name="week" value="friday" type="checkbox">
                Sat: <input name="week" value="saturday" type="checkbox">
                Sun: <input name="week" value="sunday" type="checkbox">
            </div>

            <label>Available from: </label><input type="time" name="start_time">
            <label>Available to: </label><input type="time" name="end_time">
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
    </form>
    <a href="<?php echo base_url() ?>index.php/Main_controller"><button class="" id="cancel">Cancel</button></a>

    <script>
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function() {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function() {
            return false;
        })

        $('.date').datepicker({
            multidate: true,
            format: 'dd-mm-yyyy'
        });
    </script>
    </div>
</body>

</html>