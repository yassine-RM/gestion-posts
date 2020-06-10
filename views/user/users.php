<?php

use Middleware\isAdmin;
use Controllers\UserController as UserCtr;
use Controllers\UserController as User;

isAdmin::check();

if (isset($_POST['subSearch'])) {
    unset($_POST['subSearch']);
    if (isset($_POST['searchText']) && isset($_POST['searchType'])) {
        $searchText = $_POST['searchText'];
        $searchType = $_POST['searchType'];
         
          
      $users= UserCtr::search($searchType,$searchText);

    }
    $_POST['searchText']="";
    $_POST['searchType']="";
}
else {
    $users = User::index();
}
?>

<div class="row">
    <div class="col-md-10 offset-md-1 ">

        <h3 class="text-danger text-center"><i class="fa fa-users"></i> List of users</h3>

        <form class="form-inline" style="justify-content: flex-end;" method="POST">
            <select class="form-control form-control-sm" name="searchType" id="searchType">
                <option selected>Search by</option>
                <option value="firstName">First Name</option>
                <option value="lastName">Last Name</option>
                <option value="email">Email</option>
                <option value="adress">Adress</option>
            </select>
            <input class="form-control form-control-sm mx-sm-2" name="searchText" type="text" placeholder="Search">
            <button class="btn btn-sm btn-outline-info my-2" name="subSearch" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <?php if (count($users)) {?>
        <table class="table table-striped table-inverse ">
            <thead class="thead-inverse">

                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) { ?>
                    <tr>
                        <td scope="row">
                            <?= $user->id ?>
                        </td>
                        <td>
                            <?= $user->firstName ?>
                        </td>
                        <td>
                            <?= $user->lastName ?>
                        </td>
                        <td>
                            <?= $user->email ?>
                        </td>
                        <td>
                            <?= $user->adress ?>
                        </td>
                        <td>
                            <?php
                            if ($user->status) {
                            ?>
                                <span class="badge badge-pill badge-success">
                                    Admin
                                </span>
                            <?php } else { ?>
                                <span class="badge badge-pill badge-warning">
                                    User
                                </span>
                            <?php } ?>
                        </td>

                        <td style="display: flex;">
                            <form action="deleteUser" method="POST">
                                <input type="hidden" name="userId" value="<?= $user->id ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>

                                </button>
                            </form>
                            <form action="editUser" method="POST">
                                <input type="hidden" name="email" value="<?= $user->email ?>">
                                <button class="btn btn-sm btn-outline-warning mx-2">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </form>
                            <form action="posts" method="POST">
                                <input type="hidden" name="userId" value="<?= $user->id ?>">
                                <button class="btn btn-sm btn-outline-info">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                            <?php } else echo "<div class='text-center'><img src='/gestion-posts/assets/img/noresult.png' width='400px'/></div>"?>
    </div>
</div>