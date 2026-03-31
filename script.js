// script.js
document.addEventListener('DOMContentLoaded', () => {
    // Hiển thị thời gian triển khai hiện tại
    const deployTimeEl = document.getElementById('deploy-time');
    
    function updateDeployTime() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        deployTimeEl.textContent = now.toLocaleDateString('vi-VN', options);
    }

    updateDeployTime();
    
    // Cập nhật thời gian mỗi phút
    setInterval(updateDeployTime, 60000);

    // Thêm hiệu ứng click nhẹ cho các info-item
    const infoItems = document.querySelectorAll('.info-item');
    infoItems.forEach(item => {
        item.addEventListener('click', () => {
            item.style.transform = 'scale(0.95)';
            setTimeout(() => {
                item.style.transform = 'scale(1)';
            }, 150);
        });
    });

    console.log('%c🚀 Trang QTM - Nhóm Hào đã load thành công!', 'color: #27ae60; font-weight: bold;');
});