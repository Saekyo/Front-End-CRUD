<?php
@session_start();

if (@$_SESSION['user'] == "") {
    echo "<script>
            alert('You must to login');
            document.location.href='index.php'
            </script>
        ";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <title>Dashboard</title>
</head>

<body>
    
        <?php 
            include('navbar.php')
        ?>
        <div class="container">
     <div class="jumbotron">
        <h1 class="display-3">Welcome <?php echo$_SESSION['user']; ?></h1>
        <p class="lead"></p>
        <hr class="my-2">
        <p></p>
        <p class="lead">
        </p>
    </div>

        <?php
             switch(@$_GET['menu']){
                 case 'user';
                 include 'user.php';
                 break;
             }
             ?>            

    </div>

        <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table-id').DataTable();
        });
    </script>
</body>

</html>