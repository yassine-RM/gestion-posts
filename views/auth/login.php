<?php

use Controllers\auth\AuthController as UserCtr;
if (isset($_POST['login'])) {

if (
    isset($_POST['email']) 
    && isset($_POST['password'])
) {
    $email = $_POST['email'];
    $password = $_POST['password'];
        $user = UserCtr::login($email,$password);
        if ($user) {
            $_SESSION['userConnected']=$user;
            header('location:/');
        }
    else {
        $error = "Login or password incorrect !!!";
    }
} else
    $error = "All fields are required !!!";
}
?>
<div class="row">
    <div class="col-md-6 offset-md-3 my-5">
    <h3 class=" text-center bg-secondary py-2"><i class="fa fa-user"></i> Login</h3>
        <?php if (isset($error)) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Warning !</strong><?= $error ?>
            </div>
        <?php }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <button type="submit" name="login" class="btn btn-info btn-block"><i class="fa fa-key"></i> login</button>
            <a class="nav-link float-right" href="register">Create new compte ?</a>
        </form>
    </div>
</div>