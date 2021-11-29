<?php 
    $title = 'Quản lý nhóm hàng';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');

    $sql = "select count(id) as number from Category";
    $data = executeResult($sql);
    $number = 0;
    if($data != null && count($data) > 0){
        $number = $data[0] ['number'];
    }
    $pages = ceil($number/5);
    $current_page = 1;
    if(isset($_GET['page'])){
        $current_page = $_GET['page'];
    }
    $index = ($current_page - 1)*5;

    $sql = "select * from Category limit $index,5";
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
                                        <h2>Quản Lý <b>Nhóm Hàng</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="editor.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Nhóm hàng</span></a>
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
                                        <th>Tên nhóm hàng</th>
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
                                                <td>'.$item['name'].'</td>
                                                
                                                <td width="5%">
                                                    <a href="editor.php?id='.$item['id'].'" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                </td>
                                                <td width="5%">
                                                    <a href="" onclick="deleteCategory('.$item['id'].')" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                            </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="clearfix">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <?php 
                                            if ($current_page > 1 && $pages > 1){
                                                echo'
                                                    <a href="index.php?page='.($current_page-1).'">Trước</a>
                                                '; 
                                            }
                                        ?>
                                    </li>
                                    <li class="page-item">
                                        <?php
                                            for ($i = 1; $i <= $pages; $i++){
                                                if ($i == $current_page){
                                                    echo'<span>'.$i.'</span>';
                                                }
                                                else{
                                                    echo'<a href="index.php?page='.$i.'">'.$i.'</a>';
                                                }
                                            }
                                        ?>
                                    </li>
                                    <li class="page-item">
                                        <?php 
                                            if ($current_page < $pages && $pages > 1){
                                                echo'
                                                    <a href="index.php?page='.($current_page+1).'">Sau</a>
                                                '; 
                                            }
                                        ?>
                                    </li>
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
    function deleteCategory(id) {
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