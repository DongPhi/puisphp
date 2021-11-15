<?php
	session_start();

	require_once('../../utils/utility.php');
	require_once('../../database/dbhelper.php');
	require_once('process_form_login.php');

    $user = getUserToken();
    if($user != null){
        header('Location: ../');
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pui's - Đăng nhập</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="../../assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<style>
    .help-block{
        color:red;
    }
</style>
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <div class="mb-4">
                            <h3>Đăng nhập</h3>
                            <span class="help-block"><?=$msg?></span>
                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?=$email?>" required>
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control" id="pwd" name="password" minlength="6" placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="" required>
                                <label for="checkbox-fill-a1" class="cr"> Lưu tài khoản</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Đăng nhập</button>
                        <p class="mb-2 text-muted">Quên mật khẩu? <a href="auth-reset-password.html">Vào đây</a></p>
                        <p class="mb-0 text-muted">Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="../../assets/js/vendor-all.min.js"></script>
	<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>