<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use Controllers\UserController as UserCtr;
use Models\User as UserModel;

if (isset($_POST['email']) || isset($_POST['emailP']) ) {
    $email =isset($_POST['email']) ? $_POST['email']:$_POST['emailP'];
    $redirect =isset($_POST['email']) ? 'users':'profile';
    $_SESSION["redirect"]=$redirect;
    $_SESSION['user']= UserCtr::show($email);
    $editUser= $_SESSION['user'];
?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h3 class="text-success text-center"><i class="fa fa-edit"></i>Edit User</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" value="<?= $editUser->firstName ?>" id="firstName"  placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?= $editUser->lastName ?>" id="lastName"  placeholder="Last Name">
            </div>
           
           
            <div class="form-group">
                <label for="adress">Adress</label>
                <textarea type="text" rows="5" class="form-control" name="adress"  id="adress"  placeholder="Adress">
                <?= $editUser->adress ?>
                </textarea>
            </div>
            <button type="submit" name="update" class="btn btn-warning btn-block"><i class="fa fa-refresh"></i></button>
        </form>
    </div>
</div>
<?php }
elseif (isset($_POST['update'])) {
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['adress'])) {
        $email=$_SESSION['user']->email;
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $adress=$_POST['adress'];
        $status=0;
        if ($_SESSION['userConnected']->status) {
          $status=1;
        }
        $userEdit=new UserModel($firstName,$lastName,$adress,$status);
       $res= UserCtr::update($email,$userEdit); 
       if ($res['state']) {
           if ($_SESSION["redirect"]=="profile") {
               $_SESSION['userConnected']=$res['user'];
               header('location:profile');
           }
           else{
               header('location:users');
           }
        }
    }
    
 }
 else
header('location:users');
?>