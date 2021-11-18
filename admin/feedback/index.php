<?php 
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    include('../layouts/head.php');
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');
    $sql = "SELECT * FROM Feedback order by status asc, updated_at desc";
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
                                <h2>Quản Lý <b>Phản Hồi</b></h2>
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
                                <th>Tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
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
                                        <td>'.$item['firstname'].'</td> 
                                        <td>'.$item['phone_number'].'</td>
                                        <td>'.$item['email'].'</td>
                                        <td>'.$item['subject_name'].'</td>
                                        <td>'.$item['note'].'</td>
                                        <td>'.$item['updated_at'].'</td>
                                        <td class="text-center">';
                                            if($item['status'] == 0){
                                                echo '<a href="" onclick="markRead('.$item['id'].')" class="text-success"><i class="feather icon-check"></i></a>';
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
 <script>
     function markRead(id){
         $.post('form_api.php', {
             'id': id,
             'action': 'mark'
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