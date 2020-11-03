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

        $("#page3").on('submit', function(e) {        
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('ptypeId0', $('#ptypeId0').val());
            // formData.append('ptypeId1', $('#ptypeId1').val());
            // formData.append('ptypeId2', $('#ptypeId2').val());
            // formData.append('ptypeId3', $('#ptypeId3').val());
            // formData.append('ptypeId4', $('#ptypeId4').val());
            $.ajax({
                type: 'POST',
                url: base_url + 'index.php/Main_controller/page3',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.part-1').css('background-color', 'green')
                    $('.part-2').css('background-color', 'green')
                    $('.part-3').css('background-color', 'green')
                    $('#ptypeId0').attr('value', data);
                    // $('#ptypeId1').attr('value', data);
                    // $('#ptypeId2').attr('value', data);
                    // $('#ptypeId3').attr('value', data);
                    // $('#ptypeId4').attr('value', data);
                }
            });
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
            url: base_url + 'index.php/Main_controller/page4/' + $('#product_id').val(),
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

    // Adding the plus button functionality for the special type products
    const addButton = document.querySelector('#add');
    const formPage3 = document.querySelector('.types-container');
    var counter = 0;

    addButton.addEventListener('click',()=>{
            counter += 1;
            var types = ["Basic", "Regular", "Special"];
            var currency = ["USD", "INR", "EUR"];

            var div = document.createElement('div');
            div.class = 'type-container-div';
            var br = document.createElement('br');
            div.name = 'types';
            div.id = `div-type${counter}`;

            //select for the types of product
            var select1 = document.createElement("select");
            select1.name = `type${counter}`
            select1.id = `type${counter}`
            for (const type of types) {
              var option = document.createElement("option");
              option.value = type;
              option.text = type;
              select1.appendChild(option);
            }

            //select for the type of currency
            var select2 = document.createElement("select");
            select2.name = `currency${counter}`;
            select2.id = `currency${counter}`;
            for (const type of currency) {
              var option = document.createElement("option");
              option.value = type;
              option.text = type;
              select2.appendChild(option);
            }

            //input field for the price of the product
            var price = document.createElement('input');
            price.name = `price${counter}`;
            price.id = `price${counter}`;
            price.type = 'number';
            price.placeholder = 'Price';


            //input field for holding the id of ptype
            var ptypeId = document.createElement('input');
            ptypeId.type = 'text';
            ptypeId.name = `ptypeId${counter}`;
            ptypeId.value = 0;
            ptypeId.style.display = "none";

            
            //delete button for the div
            var del = document.createElement('button');
            del.appendChild(document.createTextNode('Delete'))
            del.value = 'del';
            del.name = `del${counter}`;
            del.id = `del${counter}`;
            del.onclick = ()=>{
                formPage3.removeChild(del.parentElement);
            }

          
            //appending all the elements together with their respective childs
            div.appendChild(ptypeId);
            div.appendChild(select1);
            div.appendChild(br);
            div.appendChild(price);
            div.appendChild(select2);
            div.appendChild(del);
            formPage3.appendChild(div);
    })