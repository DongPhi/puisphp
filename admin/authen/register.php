<?php
	session_start();

	require_once('../../utils/utility.php');
	require_once('../../database/dbhelper.php');
	require_once('process_form_register.php');

    $user = getUserToken();
    if($user != null){
        header('Location: ../');
        die();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pui's - Đăng ký</title>
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
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
<style>
        .help-block{
            color:red;
        }
    </style>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Đăng ký</h3>
					<span class="help-block mb-3"><?=$msg?></span>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm();">
						<div class="input-group mb-3">
                            <input type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>" placeholder="Họ & tên" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control" id="pwd" name="password" minlength="6" placeholder="Mật khẩu" required>
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control" id="confirmation_pwd" minlength="6" placeholder="Xác nhận mật khẩu" required>
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                                <label for="checkbox-fill-1" class="cr">Lưu tài khoản</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Đăng ký</button>
                        <p class="mb-0 text-muted">Bạn đã có tài khoản? <a href="login.php"> Đăng nhập</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="../../assets/js/vendor-all.min.js"></script>
	<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
        function validateForm() {
            $pwd = $('#pwd').val();
            $confirmPwd = $('#confirmation_pwd').val();
            if($pwd != $confirmPwd) {
                alert("Mật khẩu không khớp, vui lòng kiểm tra lại")
                return false
            }
            return true
        }
    </script>
</body>
</html>