<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/addProduct.css">
</head>

<body>
    <h1 style="text-align: center;">Add Product</h1>
    <hr>
    <div class="container">
        <div class="page1">
            <form action="" method=" post">
                <h1>Page 1</h1>
            </form>
            <button id="next" onclick="phase2()">Next</button>
        </div>
        <div class="page2" style="display: none;">
            <form action="" method="post">
                <h1>Page 2</h1>
            </form>
            <button id="prev" onclick="phase1()">Prev</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="next" onclick="phase3()">Next</button>
        </div>
        <div class="page3" style="display: none;">
            <form action="" method="post">
                <h1>Page 3</h1>
            </form>
            <button id="prev" onclick="phase2()">Prev</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="next" onclick="phase4()">Next</button>
        </div>

        <div class="page4" style="display: none;">
            <form action="" method="post">
                <h1>Page 4</h1>
            </form>
            <button id="prev" onclick="phase3()">Prev</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="next" onclick="viewform()">View Form</button>
        </div>
    </div>




    <div class="viewform" style="display:none">
        <div class="page1">
            <form action="" method=" post">
                <h1>Page 1</h1>
            </form>

        </div>
        <div class="page2">
            <form action="" method="post">
                <h1>Page 2</h1>
            </form>

        </div>
        <div class="page3">
            <form action="" method="post">
                <h1>Page 3</h1>
            </form>

        </div>

        <div class="page4">
            <form action="" method="post">
                <h1>Page 4</h1>
                <button id="next">Submit Form</button>
            </form>
        </div>
    </div>


    <br><br><br><br><br><br><br><br><br>

    <br><br>
    <a href="<?php echo base_url() ?>index.php/Main_controller"><button id="cancel">Cancel</button></a>

    <script>
        function phase1() {
            document.querySelector('.page1').style.display = 'block';
            document.querySelector('.page2').style.display = 'none';
            document.querySelector('.page3').style.display = 'none';
            document.querySelector('.page4').style.display = 'none';
        }

        function phase2() {
            document.querySelector('.page1').style.display = 'none';
            document.querySelector('.page2').style.display = 'block';
            document.querySelector('.page3').style.display = 'none';
            document.querySelector('.page4').style.display = 'none';
        }

        function phase3() {
            document.querySelector('.page1').style.display = 'none';
            document.querySelector('.page2').style.display = 'none';
            document.querySelector('.page3').style.display = 'block';
            document.querySelector('.page4').style.display = 'none';
        }

        function phase4() {
            document.querySelector('.page1').style.display = 'none';
            document.querySelector('.page2').style.display = 'none';
            document.querySelector('.page3').style.display = 'none';
            document.querySelector('.page4').style.display = 'block';
        }

        function viewform() {
            document.querySelector('.container').style.display = 'none';
            document.querySelector('.viewform').style.display = 'block';
        }
    </script>
    </div>
</body>

</html>