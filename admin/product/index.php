<?php 
    $title = 'Quản lý hàng hóa';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');

    $sql = "SELECT Product.*, Category.name AS category_name FROM Product LEFT JOIN Category ON Product.category_id = Category.id WHERE Product.deleted = 0";
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
                                <h2>Quản Lý <b>Hàng Hóa</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="editor.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Hàng hóa</span></a>
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
                                <th>Nhóm hàng</th>
                                <th>Tên hàng</th>
                                <th>Giá bán</th>
                                <th>Hình ảnh</th>
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
                                        <td>'.$item['category_name'].'</td>
                                        <td>'.$item['title'].'</td>
                                        <td>'.number_format($item['price']).' đ</td>
                                        <td><img src="'.fixUrl($item['thumbnail']).'" style="height: 100px" /></td>
                                                
                                        <td width="5%">
                                            <a href="editor.php?id='.$item['id'].'" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        </td>
                                        <td width="5%">
                                            <a href="" onclick="deleteProduct('.$item['id'].')" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
            <!-- Edit Modal HTML -->
        </div>
    </div>
</div>
 <script>
    function deleteProduct(id) {
        option = confirm('Bạn có chắc chắn muốn xoá hàng hóa này không?')
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