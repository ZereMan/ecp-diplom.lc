<header class="main-header">
    <a href="#" class="logo">
        <span class="logo-mini"><b>ЭЦП</b></span>
        <span class="logo-lg"><b>ЭЦП арқылы дауыс беру жүйесі</b></span> <!-- ЭЦП через систему голосования -->
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Навигацияны ауыстыру</span> <!-- Toggle navigation -->
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="Пайдаланушы суреті"> <!-- User Image -->
                        <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="Пайдаланушы суреті"> <!-- User Image -->

                            <p>
                                <?php echo $user['firstname'].' '.$user['lastname']; ?>
                                <small>Әкімші</small> <!-- Administrator -->
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Шоттық параметрлер</a> <!-- Account Settings -->
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-default btn-flat">Шығу</a> <!-- Logout -->
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>
