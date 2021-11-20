<?php 
    $title = 'Quản lý hàng hóa';
    $baseUrl = '../';
    include('../layouts/head.php');
    require_once('form_save.php');
    $id = $category_id = $title = $price = $discount = $thumbnail = $description = '';
	
    $id = getGet('id');
	if($id != '' && $id > 0) {
		$sql = "select * from Product where id = '$id' and deleted = 0";
		$productItem = executeResult($sql, true);

		if($productItem != null) {
			$category_id = $productItem['category_id'];
            $title = $productItem['title'];
            $price = $productItem['price'];
            $discount = $productItem['discount'];
            $thumbnail = $productItem['thumbnail'];
            $description = $productItem['description'];
		} else {
			$id = 0;
		}
	} else {
		$id = 0;
	}

    $sql = "select * from Category";
	$categoryItems = executeResult($sql);
?>
<div class="bg-adduser ">
    <?php 
        include('../layouts/loader.php');
        include('../layouts/navbar.php');
        include('../layouts/header.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <div class="pcoded-main-container ">
        <div class="pcoded-wrapper ">
            <div class="">
                <div class="modal-adduser ">
                    <div class="product-container">
                        <div class="modal-content mb-4">
                            <form  method="post" enctype="multipart/form-data">
                               
                                <div class="modal-header">
                                    <h4 class="modal-title">Tạo & Sửa Hàng Hóa</h4>
                                    <a href="index.php" class="close" >&times;</a>   
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tên hàng</label>
                                                <input type="text" class="form-control" id="usr" name="title" value="<?=$title?>" required>
                                                <input type="text" name="id" value="<?=$id?>" hidden="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">Nhóm hàng</label>
                                                <select class="p-2 w-100" name="category_id" id="category_id" required="true">
                                                    <option value="">-- Chọn --</option>
                                                    <?php
                                                        foreach($categoryItems as $category) {
                                                            if($category['id'] == $category_id) {
                                                                echo '<option selected value="'.$category['id'].'">'.$category['name'].'</option>';
                                                            } else {
                                                                echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Giá bán</label>
                                                <input type="text" class="form-control" id="price" name="price" value="<?=$price?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá giảm</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="<?=$discount?>" required>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <div class="img-product">
                                            <label for="thumbnail"><img src="<?=fixUrl($thumbnail)?>" onerror="this.src='../../assets/images/add-image.png'" id="thumbnail_img" class="img-display"/></label>
                                            <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" id="thumbnail" name="thumbnail" onchange="updateThumbnail(this);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="5" name="description" id="description"><?=$description?></textarea>
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
    function updateThumbnail(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumbnail_img')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    $('#description').summernote({
        placeholder: 'Nhập mô tả sản phẩm',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>