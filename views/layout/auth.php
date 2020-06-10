<?php
/**
 * define root varible 
 */
define("root", $_SERVER['DOCUMENT_ROOT']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/pooper.js"></script>
    <script src="/assets/js/bootstrap.js"></script>

    <title>gestion-posts</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    /**
                     *include the page spcifically in content place
                     */
                    $path = $content['path'];
                    $page = $content['page'];

                        include_once(root . "/views/auth/$page")
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>