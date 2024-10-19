<main>
    <div class="container">
        <div class="content">
            <!-- Phần này sẽ được sử dụng để load nội dung từ các trang khác -->
            <?php
                if (isset($content)) {
                    echo $content;  // Biến $content sẽ chứa nội dung của các file như home.php, about.php
                } else {
                    echo "<p>Không có nội dung nào để hiển thị!</p>";
                }
            ?>
        </div>

        <!-- Kiểm tra nếu sidebar tồn tại thì sẽ hiển thị -->
        <?php if (isset($sidebar)) { ?>
            <div class="sidebar">
                <?php include '/sidebar/sidebar.php'; ?>
            </div>
        <?php } ?>
    </div>
</main>
