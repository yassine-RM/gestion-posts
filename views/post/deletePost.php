<?php

use Controllers\PostController as Post;
if (isset($_POST['postId'])) {
    $id=$_POST['postId'];;
    Post::delete($id);
}

header('location:posts');
?>