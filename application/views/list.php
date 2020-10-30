<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/datatables.min.css" />
    <script src="<?php echo base_url() ?>assets/DataTables/datatables.min.js"></script>
</head>

<body>
    <h1 style="text-align: center;">User List</h1>
    <a href="<?php echo base_url() ?>index.php/Main_controller"><button id="cancel">Dashboard</button></a>
    <hr><br><br>


    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>U-ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Created at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>U-ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Created at</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                    ajax: {
                        url: '<?php echo base_url() ?>index.php/Main_controller/list_data',
                    },
                    columns: [{
                            data: "user_id"
                        },
                        {
                            data: "is_admin"
                        },
                        {
                            data: "full_name"
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "gender"
                        },
                        {
                            data: "phone"
                        },
                        {
                            data: "country"
                        },
                        {
                            data: "city"
                        },
                        {
                            data: "created_at"
                        },
                        {
                            data: "edit"
                        },
                        {
                            data: 'delete'
                        }
                    ]
                }

            );
        });
    </script>
</body>



</html>