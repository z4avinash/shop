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
        <tbody>
            <?php
            $type = '';
            foreach ($users as $user) {
                if ($user['is_admin']) {
                    $type = 'Admin';
                } else {
                    $type = 'Seller';
                }

                echo "
            <tr id='data'>
                <td>{$user['user_id']}</td>
                <td>{$type}</td>
                <td>{$user['full_name']}</td>
                <td>{$user['email']}</td>
                <td>{$user['gender']}</td>
                <td>{$user['phone']}</td>
                <td>{$user['country']}</td>
                <td>{$user['city']}</td>
                <td>{$user['created_at']}</td>
                <td><a href='edit/{$user['user_id']}'><button>Edit</button></a></td>
                <td><a href='delete/{$user['user_id']}'><button>Delete</button></a></td>
                </tr>
                ";
            }

            ?>
        </tbody>
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
            </tr>
        </tfoot>
    </table>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        })
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
                    ajax: {
                        url: '<?php echo base_url() ?>index.php/Main_controller/list_data',
                        processing: true,
                        serverSide: true,
                        serverMethod: 'post',
                        paging: true,
                        searching: true,
                        ordering: true,
                        order: [
                            [0, "asc"]
                        ],
                        scrollX: true,
                        scroller: true,
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
                        // {
                        //     data: "edit"
                        // },
                        // {
                        //     data: 'delete'
                        // }
                    ]
                }

            );
        });
    </script> -->
</body>



</html>