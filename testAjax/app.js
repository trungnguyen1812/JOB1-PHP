// app.js
function loadContent(page) {
    // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `content.php?page=${page}`, true); // Gửi yêu cầu đến content.php với tham số page
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Nếu yêu cầu thành công, thay thế nội dung của div #content
            document.getElementById("content").innerHTML = xhr.responseText;
        } else {
            // Hiển thị thông báo lỗi nếu có lỗi xảy ra
            document.getElementById("content").innerHTML = "<p>Error loading content. Please try again.</p>";
        }
    };
    xhr.send();
}
