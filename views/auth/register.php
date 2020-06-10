<?php

use Controllers\auth\AuthController as UserCtr;
use Models\User as UserModel;
if (isset($_POST['add'])) {
if (
   
    isset($_POST['firstName']) && isset($_POST['lastName'])
    && isset($_POST['email']) && isset($_POST['adress'])
    && isset($_POST['password']) && isset($_POST['confirmPassword'])
) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password === $confirmPassword) {
        $newUser = new UserModel($firstName, $lastName, $adress,0, $email, $password);
        $state = UserCtr::register($newUser);
        if ($state) {
            header('location:/');
        }
        else
        $error='This email already exist ! ';
    } else {
        $error="Password confirmation incorrect !!!";
    }
} else 
    $error="All fields are required !!!";
}
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5">
        <h3 class=" text-center bg-secondary py-2"><i class="fa fa-plus"></i> Register</h3>
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
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                    </div>

                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="adress">Adress</label>
                        <textarea type="text" rows="5" class="form-control" name="adress" id="adress" placeholder="Adress">

                        </textarea>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                    </div>

                </div>
            </div>


            <button type="submit" name="add" class="btn btn-info btn-block"><i class="fa fa-plus"></i> register</button>
            <a class="nav-link float-right" href="login">Login ?</a>
        </form>
    </div>
</div>