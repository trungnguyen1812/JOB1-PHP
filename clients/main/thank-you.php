<?php
session_start();
include_once '../layouts/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="alert alert-success text-center" style="margin-top: 50px;">
                <h3><span class="glyphicon glyphicon-ok-circle"></span> Đơn hàng của bạn đã được đặt thành công!</h3>
                <p>Cảm ơn bạn đã mua hàng. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</p>
                <a href="home.php" class="btn btn-primary">
                    <span class="glyphicon glyphicon-home"></span> Quay về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
<?php 
include_once '../layouts/footer.php';
?>