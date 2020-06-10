<?php
use Controllers\PostController as Post;
use Controllers\UserController as User;

?>  
<div class="row justify-content-md-center">

  <div class="col-md-4">
    <div class="statistic-card posts">
      <i class="fa fa-list post-icon icon"></i>
      <div class="static-text posts">
        <b><?= Post::count()?></b> <span>posts</span>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="statistic-card users">
      <i class="fa fa-users user-icon icon"></i>
      <div class="static-text users">
        <b><?= User::count()?></b> <span>users</span>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="statistic-card categories">
      <i class="fa fa-list-alt  cat-icon icon"></i>
      <div class="static-text cats">
        <b>150</b> <span>categories</span>
      </div>
    </div>
  </div>
</div>