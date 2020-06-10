<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php
        use Controllers\PostController as Post;
        $userId = isset($_POST['userId']) ? $_POST['userId'] : $_SESSION['userConnected']->id;
        $posts = Post::index($userId);
        if (count($posts)) {
        ?>
        <h3 class="text-danger text-center"><i class="fa fa-list"></i> List of posts</h3>

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">

                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($posts as $post) { ?>
                    <tr>
                        <td scope="row">
                            <?= $post->id ?>
                        </td>
                        <td>
                            <?= $post->title ?>
                        </td>
                        <td>
                            <?= $post->content ?>
                        </td>
                        <td>
                            <?= $post->created_at ?>
                        </td>
                        <td style="display: flex;">
                            <form action="deletePost" method="POST">
                                <input type="hidden" name="postId" value="<?= $post->id ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>

                                </button>
                            </form>
                            <form action="editPost" method="POST">
                                <input type="hidden" name="postId" value="<?= $post->id ?>">
                                <button class="btn btn-sm btn-outline-warning mx-2">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                <?php }
                else
                echo "<div class='text-center'><h4 class='text-danger'>Aucun post exist !!!!</h4><a  href='newPost'>create new post ?</a></div>";
        
        ?>
    </div>
</div>