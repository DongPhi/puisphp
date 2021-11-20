<?php 
    $title = 'Quản lý hàng hóa';
    $baseUrl = '../';
    include('../layouts/head.php');
    require_once('form_save.php');
    $id = $thumbnail = '';
	
    $id = getGet('id');
	if($id != '' && $id > 0) {
		$sql = "select * from Banner where id = '$id'";
		$bannerItem = executeResult($sql, true);
		if($bannerItem != null) {
            $thumbnail = $bannerItem['thumbnail'];
		} else {
			$id = 0;
		}
	} else {
		$id = 0;
	}
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
                                    <h4 class="modal-title">Thêm & Sửa Banner</h4>
                                    <a href="index.php" class="close" >&times;</a>   
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <div class="img-banner">
                                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                                            <label for="thumbnail"><img src="<?=fixUrl($thumbnail)?>" onerror="this.src='../../assets/images/add-image.png'" id="thumbnail_img" class="img-display"/></label>
                                            <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" id="thumbnail" name="thumbnail" onchange="updateThumbnail(this);">
                                        </div>
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
<?php 
    include('../layouts/scripts.php');
    include('../layouts/footer.php');
?>