<?php
$user=$_SESSION['userConnected'];
?>

<div class="row">
    <div class="col-md-6 offset-md-3 my-5">
        <form action="editUser" method="POST">
            <input type="text" name="emailP" hidden value="<?= $user->email?>">
            <button class="btn btn-outline-warning float-right btn-sm"><i class="fa fa-edit"></i></button>
        </form>
     <h3 class="text-info text-center"><i class="fa fa-user"></i> Profile</h3>
     
     <ul class="list-group">
         <li class="list-group-item d-flex justify-content-between align-items-center ">
             First Name
             <span class="badge badge-secondary "><?= $user->firstName?></span>
         </li>
         <li class="list-group-item d-flex justify-content-between align-items-center">
             Last Name
             <span class="badge badge-secondary "><?= $user->lastName?></span>
         </li>
         <li class="list-group-item d-flex justify-content-between align-items-center ">
             Email
             <span class="badge badge-secondary "><?= $user->email?></span>
         </li>
         <li class="list-group-item d-flex justify-content-between align-items-center ">
             Adress
             <span class="badge badge-secondary "><?= $user->adress?></span>
         </li>
         
     </ul>
     
    </div>
</div>