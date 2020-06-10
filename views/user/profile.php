<?php
$user=$_SESSION['userConnected'];
?>

<div class="row">
    <div class="col-md-6 offset-md-3 my-5">
       
      
        <div class="card t"> 
            <form action="editUser" method="POST">
            <input type="text" name="emailP" hidden value="<?= $user->email?>">
            <button class="btn btn-outline-warning float-right btn-sm my-1 mx-1"><i class="fa fa-edit"></i></button>
        </form>
          <img class="card-image m-auto" width="100" src="/assets/img/avatar.png" alt="">
          <div class="card-body">
            <h4 class="card-title text-center"><?= $user->firstName.' '.$user->lastName ?></h4>
            <p class="card-text">
                <span><strong>Email</strong> : <?= $user->email?></span><br>
                <span><strong>Adress</strong> : <?= $user->adress?></span><br>
                <span><strong>Status</strong> : <?php
                if ($user->status) {
                  echo "Admin";
                }
                else
                echo "User";
                 ?></span><br>
            </p>
          </div>
        </div>
     
    </div>
</div>