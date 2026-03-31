document.addEventListener('DOMContentLoaded', () => {
    
    const deployTimeEl = document.getElementById('deploy-time');
    
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        deployTimeEl.textContent = now.toLocaleDateString('vi-VN', options);
    }

    updateTime();
    setInterval(updateTime, 60000);

    // Hiệu ứng click nhẹ
    document.querySelectorAll('.info-item').forEach(item => {
        item.addEventListener('click', () => {
            item.style.transform = 'scale(0.96)';
            setTimeout(() => item.style.transform = 'scale(1)', 180);
        });
    });

    console.log('%c✅ Trang QTM - Nhóm Hào đã tải thành công!', 
                'color: #27ae60; font-size: 14px; font-weight: bold;');
});