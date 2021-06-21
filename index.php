<?php
include "config/koneksi.php";
include "library/oop.php";

$go = new oop();
$table = 'login';
@$password = base64_encode($_POST['pass']);
$field = array(
    'username' => @$_POST['user'],
    'password' => @$password
);
@$username = $_POST['user'];
@$password = base64_encode($_POST['pass']);
$redirect = 'dashboard.php';
if (isset($_POST['login'])) {
    $go->login($con, $table, $username, $password, $redirect);
}

if (isset($_POST['buatAkun'])) {
    $go->buat($con, $table, $field);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form method="post">
                            <div class="form-label-group mb-3">
                                <label for="formUsername">Username</label>
                                <input name="user" type="text" id="formUsername" class="form-control" placeholder="Username" required autofocus>
                            </div>

                            <div class="form-label-group mb-3">
                                <label for="formPassword">Password</label>
                                <input name="pass" type="password" id="formPassword" class="form-control" placeholder="Password" required>
                            </div>
                            <button name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                        </form>
                        <p class="text-center mt-3">
                            <a href="#modalBuatAkun" class="trigger-btn" data-toggle="modal">Create Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div id="modalBuatAkun" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Create Account</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
                        <label for="formUsername" class="form-label">Username</label>
                        <input placeholder="Username" class="form-control" id="formUsername" type="text" name="user" value="<?php echo @$edit['username'] ?>" required>
					</div>
					<div class="form-group">
                        <label for="formPassword" class="form-label">Password</label>
                        <input placeholder="Password" class="form-control" id="formPassword" type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" required>
					</div>        
					<div class="form-group">
                            <input class="btn btn-primary btn-lg btn-block login-btn" type="submit" name="buatAkun" value="Create Account">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>    

    </div>

    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>