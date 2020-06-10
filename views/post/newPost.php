<?php

use Controllers\PostController as PostCtr;
use Models\Post as PostModel;
if (isset($_POST['add'])) {
if (
    isset($_POST['title']) && isset($_POST['content'])
) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId=$_SESSION['userConnected']->id;
        $newPost = new PostModel($userId,$title, $content);
        $state = PostCtr::create($newPost);
        if ($state) {
            header('location:posts');
        }
   
} else 
    $error="All fields are required !!!";
}
?>
<div class="row">
    <div class="col-md-8 offset-md-2 my-5">
        <h3 class=" text-center bg-secondary py-2"><i class="fa fa-plus"></i> New Post</h3>
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
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="First Name">
                    </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" rows="5" class="form-control" name="content" id="content" placeholder="Adress">

                        </textarea>
                    </div>

                </div>
            </div>


            <button type="submit" name="add" class="btn btn-info btn-block"><i class="fa fa-plus"></i> Add</button>
        </form>
    </div>
</div>