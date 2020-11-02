       //For Date Picker
       $('.date').datepicker({
        multidate: true,
        format: 'dd-mm-yyyy'
    });


    //FOR NAVIGATION DIVS
    function gotoPage1() {
        document.querySelector('.page1').style.display = "block";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";
    }

    function gotoPage2() {
        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "block";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";
    }

    function gotoPage3() {
        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "block";
        document.querySelector('.page4').style.display = "none";
    }

    function gotoPage4() {
        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "block";
    }


    //PREVIOUS PAGES

    //from page 2 to page 1
    function fromPage2ToPage1() {
        // $.ajax({
        //     type: 'POST',
        //     url: '<?php echo base_url("index.php/Main_controller/page2/") ?>' + $('#product_id').val(),
        //     data: $('#page1').serialize(),
        //     success: function(res) {
        //         $('#product_id').attr('value', res);
        //         $('.part-1').css('background-color', 'green')
        //     }
        // });

        document.querySelector('.page1').style.display = "block";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";
    }


    //from page 3 to page 2
    function fromPage3ToPage2() {
        // $.ajax({
        //     type: 'POST',
        //     url: '<?php echo base_url("index.php/Main_controller/page3/") ?>' + $('#product_id').val(),
        //     data: $('#page2').serialize(),
        //     success: function(res) {
        //         $('#product_id').attr('value', res);
        //         $('.part-1').css('background-color', 'green')
        //         $('.part-2').css('background-color', 'green')
        //     }
        // });



        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "block";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";
    }


    //from page 4 to page 3
    function fromPage4ToPage3() {
        // $.ajax({
        //     type: 'POST',
        //     url: '<?php echo base_url("index.php/Main_controller/page4/") ?>' + $('#product_id').val(),
        //     data: $('#page3').serialize(),
        //     success: function(res) {
        //         $('#product_id').attr('value', res);
        //         $('.part-1').css('background-color', 'green')
        //         $('.part-2').css('background-color', 'green')
        //         $('.part-3').css('background-color', 'green')
        //     }
        // });

        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "block";
        document.querySelector('.page4').style.display = "none";
    }





    //NEXT PAGES

    //save page1 and move to page 2
    function savePage1andGoToPage2() {
        $("#page1").on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('product_id', $('#product_id').val());
            $.ajax({
                type: 'POST',
                url: base_url + 'index.php/Main_controller/page1',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.part-1').css('background-color', 'green')
                    $('#product_id').attr('value', data);
                }
            });
        });
        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "block";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";
    }



    //save page 2 and move to page 3
    function savePage2andGoToPage3() {
        $.ajax({
            type: 'POST',
            url: base_url + 'index.php/Main_controller/page2/' + $('#product_id').val(),
            data: $('#page2').serialize(),
            success: function() {
                $('.part-1').css('background-color', 'green')
                $('.part-2').css('background-color', 'green')

            }
        });

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
            success: function() {
                $('.part-1').css('background-color', 'green')
                $('.part-2').css('background-color', 'green')
                $('.part-3').css('background-color', 'green')
            }
        });

        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "block";
    }

    //preview form
    //save page 3 and move to page 4
    function previewForm() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("index.php/Main_controller/page4/") ?>' + $('#product_id').val(),
            data: $('#page4').serialize(),
            success: function() {
                $('.part-1').css('background-color', 'green')
                $('.part-2').css('background-color', 'green')
                $('.part-3').css('background-color', 'green')
                $('.part-4').css('background-color', 'green')
            }
        });

        document.querySelector('.page1').style.display = "none";
        document.querySelector('.page2').style.display = "none";
        document.querySelector('.page3').style.display = "none";
        document.querySelector('.page4').style.display = "none";

        //code for previewing the form is not written  yet.
        document.querySelector('.container-form-view').style.display = "none";
        document.querySelector('.preview-form-view').style.display = "block";


    }