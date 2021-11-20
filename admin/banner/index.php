<?php 
    $title = 'Quản lý Banner';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');

    $sql = "SELECT * FROM Banner";
	$data = executeResult($sql);
?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Quản Lý <b>Banner</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="editor.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Hình ảnh</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($data as $item){
                                    echo'
                                    <tr>
                                        <td><img src="'.fixUrl($item['thumbnail']).'" style="height:250px" /></td>           
                                        <td width="5%">
                                            <a href="editor.php?id='.$item['id'].'" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        </td>
                                        <td width="5%">
                                            <a href="" onclick="deleteImage('.$item['id'].')" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                    ';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteImage(id) {
        option = confirm('Bạn có chắc chắn muốn xóa nhóm hàng này không?')
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