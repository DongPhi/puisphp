<?php 
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    include('../layouts/head.php');
    $id = $msg = $fullname = $email = $phone_number = $address = $role_id = '';
	require_once('form_save.php');

    $id = getGet('id');
	if($id != '' && $id > 0) {
		$sql = "select * from User where id = '$id'";
		$userItem = executeResult($sql, true);
		if($userItem != null) {
			$fullname = $userItem['fullname'];
			$email = $userItem['email'];
			$phone_number = $userItem['phone_number'];
			$address = $userItem['address'];
			$role_id = $userItem['role_id'];
		} else {
			$id = 0;
		}
	} else {
		$id = 0;
	}

    $sql = "select * from Role";
	$roleItems = executeResult($sql);
?>
<div class="bg-adduser ">
    <?php 
        include('../layouts/loader.php');
        include('../layouts/navbar.php');
        include('../layouts/header.php');
    ?>
    <div class="pcoded-main-container ">
        <div class="pcoded-wrapper ">
            <div class="">
                <div class="modal-adduser ">
                    <div class="modal-dialog ">
                        <div class="modal-content mb-4">
                            <form  method="post" onsubmit="return validateForm();">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tạo & Sửa Tài Khoản</h4>
                                    <a href="index.php" class="close" >&times;</a>   
                                </div>
                                <div>
                                    <span class="help-block mb-2 mt-2 text-center text-danger"><?=$msg?></span>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Họ & tên</label>
                                        <input type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>" required>
                                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">Quyền</label>
                                        <select class="p-2 w-100" name="role_id" id="role_id" required="true">
                                            <option value="">-- Chọn --</option>
                                            <?php
                                                foreach($roleItems as $role) {
                                                    if($role['id'] == $role_id) {
                                                        echo '<option selected value="'.$role['id'].'">'.$role['name'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$role['id'].'">'.$role['name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" id="address" name="address" value="<?=$address?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?=$phone_number?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input <?=($id > 0?'':'required="true"')?> type="password" class="form-control"  id="pwd" name="password" minlength="6">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input <?=($id > 0?'':'required="true"')?> type="password" class="form-control"  id="confirmation_pwd" minlength="6">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="index.php"><input type="button" class="btn btn-default" value="Quay lại"></a> 
                                    <input type="submit" class="btn btn-success" value="Đồng ý">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>