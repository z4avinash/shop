<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align:center">Product List</h1>
    <hr><br><br>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>P-ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($products as $product) {
                echo "
<tr id='data'>
<td>{$product['product_id']}</td>
<td>{$product['title']}</td>
<td>{$product['category']}</td>
<td><a href='editProduct/{$product['product_id']}'><button>Edit</button></a></td>
<td><a href='deleteProduct/{$product['product_id']}'><button>Delete</button></a></td>
</tr>
";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>P-ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>