<nav class="navbar navbar-expand-sm  bg-light">
    <a class="navbar-brand" href="/">G-Posts</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/"><i class="fa fa-home"></i> Home</a>
            </li>
            <?php
            if ($_SESSION['userConnected']->status) {
            ?>
                <li class="nav-item dropdown">
                <a class="nav-link" href="users"><i class="fa fa-users"></i> Users</a>
                </li>
            <?php } ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="newPost"><i class="fa fa-plus"></i> New Post</a>
                    <a class="dropdown-item" href="posts"><i class="fa fa-list"></i> My Posts</a>
                </div>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons avatar-nav">
            <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img width="50" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image">
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                    <a class="dropdown-item" href="profile"><i class="fa fa-user"></i>
                        <?=
                            $_SESSION['userConnected']->firstName;
                        ?>
                    </a>
                    <a class="dropdown-item" href="logOut"><i class="fa fa-sign-out"></i> Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>