<?php

use Controllers\UserController as User;
if (isset($_POST['userId'])) {
    $id=$_POST['userId'];;
    User::delete($id);
}

header('location:users');
?>