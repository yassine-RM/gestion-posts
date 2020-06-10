<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use Controllers\PostController as PostCtr;
use Models\Post as PostModel;

if (isset($_POST['postId'])) {
    $id=$_POST['postId'];
    $_SESSION['post']= PostCtr::show($id);
    $post= $_SESSION['post'];
?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h3 class="text-success text-center"><i class="fa fa-edit"></i>Edit User</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?= $post->title ?>" id="title"  placeholder="Title">
            </div>
           
           
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" rows="5" class="form-control" name="content"  id="content"  placeholder="Content">
                <?= $post->content ?>
                </textarea>
            </div>
            <button type="submit" name="update" class="btn btn-warning btn-block"><i class="fa fa-refresh"></i></button>
        </form>
    </div>
</div>
<?php }
elseif (isset($_POST['update'])) {
    if (isset($_POST['title']) && isset($_POST['content']) ) {
        $id=$_SESSION['post']->id;
        $userId=$_SESSION['userConnected']->id;
        $title=$_POST['title'];
        $content=$_POST['content'];
        $postEdit=new PostModel($userId,$title,$content);
       $res= PostCtr::update($id,$postEdit); 
       if ($res['state']) {
               header('location:posts');
        }
    }
    
 }
 else
header('location:posts');
?>