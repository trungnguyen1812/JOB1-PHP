// script.js

// Hàm tạo lá và thêm hiệu ứng
function createLeaf() {
    const leaf = document.createElement("div");
    leaf.classList.add("leaf");

    // Đặt vị trí ngẫu nhiên trong header
    leaf.style.left = `${Math.random() * 100}vw`;
    leaf.style.animationDuration = `${Math.random() * 5 + 5}s`; // thời gian di chuyển ngẫu nhiên
    leaf.style.animationDelay = `${Math.random() * 5}s`; // độ trễ ngẫu nhiên

    document.getElementById("wind-container").appendChild(leaf);

    // Tự động xóa lá khi hoàn thành animation
    leaf.addEventListener("animationend", () => {
        leaf.remove();
    });
}

// Tạo nhiều lá bay trong header
setInterval(createLeaf, 1000); // Tạo lá mới mỗi giây
