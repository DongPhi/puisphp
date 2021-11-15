<?php 
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');

    $sql = "SELECT User.*, Role.name AS role_name FROM User LEFT JOIN Role ON User.role_id = Role.id WHERE User.deleted = 0";
    $data = executeResult($sql);
?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Quản Lý <b>Tài Khoản</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="editor.php" class="btn btn-success" ><i
                                                class="material-icons">&#xE147;</i> <span>Tạo tài khoản</span></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label>
                                            </span>
                                        </th>
                                        <th>Họ & tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>SĐT</th>
                                        <th>Quyền</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($data as $item){
                                            echo '
                                            <tr>
                                                <td>
                                                    <span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                        <label for="checkbox1"></label>
                                                    </span>
                                                </td>
                                                <td>'.$item['fullname'].'</td>
                                                <td>'.$item['email'].'</td>
                                                <td>'.$item['address'].'</td>
                                                <td>'.$item['phone_number'].'</td>
                                                <td>'.$item['role_name'].'</td>
                                                <td width="5%">
                                                    <a href="editor.php?id='.$item['id'].'" class="edit"><i class="material-icons"
                                                            data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                </td>
                                                <td width="5%">';
                                                if($user['id'] != $item['id'] && $item['role_id'] != 1) {
                                                    echo '<a href="" onclick="deleteUser('.$item['id'].')" class="delete"><i class="material-icons"
                                                    data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                                                }
                                                echo '
                                                </td>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clearfix">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Trước</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">Sau</a></li>
                                </ul>
                            </div>
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

    function deleteUser(id) {
        option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
		if(!option) return;
		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>