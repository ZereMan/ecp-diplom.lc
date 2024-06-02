<?php
session_start();

if(isset($_SESSION['admin'])){
    header('location: admin/home.php');
}

if(isset($_SESSION['voter'])){
    header('location: home.php');
}
?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>ЭЦП арқылы дауыс беру жүйесі</b> <!-- e-Vox Voting System -->
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Дауыс беру үшін жүйеге кіріңіз!</p> <!-- Log into your account to vote! -->

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control login-input" name="voter_id" placeholder="Дауыс берушінің нөмірі" required> <!-- Voter's ID -->
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control login-input" name="email" placeholder="Электрондық пошта" required> <!-- Email -->
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control login-input" name="password" placeholder="Құпия сөз" required> <!-- Password -->
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!-- Ссылка на страницу регистрации -->
                    <a href="register.php" class="text-center">Жаңа мүшелікке тіркелу</a> <!-- Register a new membership -->
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat login-btn" name="login">Кіру</button> <!-- Login -->
                </div>
            </div>
        </form>
    </div>
    <?php
    if(isset($_SESSION['error'])){
        echo "
            <div class='callout callout-danger text-center mt20'>
                <p>".$_SESSION['error']."</p>
            </div>
        ";
        unset($_SESSION['error']);
    }
    ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>

