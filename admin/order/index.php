<?php 
    $title = 'Quản lý đơn hàng';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');

    $sql = "select count(id) as number from Orders";
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

    $sql = "select * from Orders order by status asc, order_date desc limit $index, 5";
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
                                <h2>Quản Lý <b>Đơn Hàng</b></h2>
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
                                <th>Họ & Tên</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>Thành tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($data as $item){
                                    echo '
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                        <td><a href = "detail.php?id='.$item['id'].'">'.$item['fullname'].'</a></td> 
                                        <td><a href = "detail.php?id='.$item['id'].'">'.$item['phone_number'].'</a></td>
                                        <td><a href = "detail.php?id='.$item['id'].'">'.$item['address'].'</a></td>
                                        <td><a href = "detail.php?id='.$item['id'].'">'.$item['note'].'</a></td>
                                        <td><a href = "detail.php?id='.$item['id'].'">'.$item['total_money'].' đ</a></td>
                                        <td class="text-center">';
                                            if($item['status'] == 0){
                                                echo '
                                                <a href="" onclick="changeStatus('.$item['id'].', 1)" class="text-success"><i class="feather icon-check"></i></a>
                                                <a href="" onclick="changeStatus('.$item['id'].', 2)" class="text-danger"><i class="feather icon-x"></i></a>
                                                ';
                                            }else if($item['status'] == 1){
                                                echo '<label class="text-success">Thành công</label>';
                                            }else{
                                                echo '<label class="text-danger">Đã hủy</label>';
                                            }
                                            echo'
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
 <script>
     function changeStatus(id, status){
         $.post('form_api.php', {
             'id': id,
             'status': status,
             'action': 'update_status'
         }, function(data) {
             location.reload()
         }
         )
     }
 </script>
<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>