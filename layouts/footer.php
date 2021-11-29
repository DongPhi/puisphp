<div class="box-note-item">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 box-item">
                <span class="img-icon"><i class="fas fa-shipping-fast"></i></span>
                <span>Giao Hàng Miễn Phí</br>Toàn Quốc</span>
            </div class="col-sm-3">
            <div class="col-sm-3 box-item">
                <span class="img-icon"><i class="fas fa-sync"></i></span>
                <span>1 Đổi 1</br>Trong Vòng 30 Ngày</span>
            </div>
            <div class="col-sm-3 box-item">
                <span class="img-icon"><i class="fas fa-shield-alt"></i></span>
                <span>Bảo Hành 24 Tháng</br>Điện thoại, Laptop</span>
            </div>
            <div class="br-none col-sm-3 box-item">
                <span class="img-icon"><i class="fas fa-headphones-alt"></i></span>
                <span>Hỗ Trợ Trực Truyến</br>Từ: 8h Đến 22h</span>
            </div>
        </div>
    </div>
</div>
<div class="menu-footer">
    <div class="container mt-3 mb-2">
        <div class="row">
            <div class="col-sm-3">
                <h4>Hỗ trợ khách hàng</h4>
                    <a href=""><p>Chính Sách Đổi Trả</p></a>  
                    <a href=""><p>Chính Sách Bảo Mật</p></a> 
                    <a href=""><p>Chính Sách Bảo Hành</p></a>
                    <a href=""><p>Chính Sách Giao Hàng</p></a>
                    <a href=""><p>Phương Thức Thanh Toán</p></a>
            </div>
            <div class="col-sm-3">
                <h4>Pui's Mobile</h4>
                <a href=""><p>Về Pui's</p></a>
                <a href=""><p>Tuyển dụng</p></a>
                <a href=""><p>Khuyến mãi</p></a>
                <a href=""><p>Hỏi đáp</p></a>
                <a href=""><p>Tra cứu bảo hành</p></a>
            </div>
            <div class="col-sm-3">
                <h4>Tổng đài hỗ trợ</h4>
                <p>Tư vấn mua hàng </br> <b>0968.123.367</b></p>
                <p>Hỗ trợ kỹ thuật </br> <b>0582.565.855</b></p>
                <p>Khiếu nại - gói ý </br> <b>0582.565.855</b></p>
            </div>
            <div class="col-sm-3">
                <h4>Liên hệ</h4>
                <p><i class="fas fa-map-marker-alt mr-1"></i> 104 Bình An 7, Hải Châu, Đà Nẵng</p>
                <p><i class="fas fa-phone-alt mr-1"></i> 0582.565.855</p>
                <p><i class="fas fa-envelope mr-1"></i> dongphivnn@gmail.com</p>
                <h4>Mạng xã hội</h4>
                <a class="icon-social mr-3" href=""><span><i class="fab fa-facebook-square"></i></span></a>
                <a class="icon-social mr-3" href=""><span><i class="fab fa-instagram"></i></span></a>
                <a class="icon-social mr-3" href=""><span><i class="fab fa-youtube"></i></span></a>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p>Bản quyền của Pui's Mobile ® 2021. Bảo lưu mọi quyền. </br> Ghi rõ nguồn "www.puis.com.vn" ® khi sử dụng lại thông tin từ website này.</p>
</div>
<script>
        function addMoreCart(delta) {
		num = parseInt($('[name=num]').val())
		num += delta
		if(num < 1) num = 1;
		$('[name=num]').val(num)
        }

        function fixCartNum() {
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }
        function addCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>