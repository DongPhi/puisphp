<?php 
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    include('../layouts/head.php');
    require_once('form_save.php');
    
	$id = $name = '';

	if(isset($_GET['id'])) {
		$id = getGet('id');
		$sql = "select * from Category where id = $id";
		$data = executeResult($sql, true);

		if($data != null) {
			$name = $data['name'];
		}
	}
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
                            <form  method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tạo & Sửa Nhóm Hàng</h4>
                                    <a href="index.php" class="close" >&times;</a>   
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên nhóm hàng</label>
                                        <input type="text" class="form-control" id="usr" name="name" value="<?=$name?>" required>
                                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="index.php"><input type="button" class="btn btn-default" value="Quay lại"></a> 
                                    <input type="submit" class="btn btn-success" value="Lưu">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>