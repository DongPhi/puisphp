<?php 
    $title = 'Thông tin đơn hàng';
    $baseUrl = '../';
    include('../layouts/head.php');

    $orderId = getGet('id');

    $sql = "select Order_details.*, Product.title, Product.thumbnail from Order_details left join Product on Product.id = Order_details.product_id where Order_details.order_id = $orderId";
    $data = executeResult($sql);

    $sql = "select * from Orders where id = $orderId";
    $orderItem = executeResult($sql, true);
    
?>
<div class="bg-adduser ">
<?php 
    include('../layouts/loader.php');
    include('../layouts/navbar.php');
    include('../layouts/header.php');
?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="text-white">Chi tiết đơn hàng</h4>
                            </div>
                            <div class="col-sm-6">
                                <a href="index.php" class="close" style="font-size: 20px">&times;</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-customer">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-customer">
                                    <label>Khách hàng: <?=$orderItem['fullname']?></label>
                                </div> 
                                <div class="form-customer">
                                    <label>Số điện thoại: <?=$orderItem['phone_number']?></label>
                                </div>   
                            </div>
                            <div class="col-sm-6">
                                <div class="form-customer">
                                    <label>Địa chỉ: <?=$orderItem['address']?></label>
                                </div>  
                                <div class="form-customer">
                                    <label>Ghi chú: <?=$orderItem['note']?></label>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center" style="width: 12%">Đơn giá</th>
                                <th class="text-right" style="width: 14%">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index = 0;
                                foreach ($data as $item){
                                    echo '
                                    <tr>
                                        <th>'.(++$index).'</th>
                                        <td>'.$item['title'].'</td>
                                        <td class="text-center">'.$item['num'].'</td>
                                        <td class="text-center">'.number_format($item['price']).'</td>
                                        <td class="text-right" >'.number_format($item['total_money']).'</td>
                                    </tr>';
                                }
                             ?>
                        </tbody>
                    </table>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th></th>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="width:12%"><label>Tổng tiền:</label></td>
                            <td class="text-right" style="width:14%"><label><?=number_format($orderItem['total_money'])?> đ</label></td>
                        </tr>
                    </table>
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