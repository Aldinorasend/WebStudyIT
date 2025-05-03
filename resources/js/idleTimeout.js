// resources/js/idleTimeout.js
let idleTime = 0;
const idleLimit = 30; // 30 detik

// Fungsi untuk menangani logout
function logout() {
    alert('Anda telah keluar karena tidak ada aktivitas.');
    window.location.href = '/logout'; // Ganti dengan URL logout API Anda
}

// Fungsi untuk reset idle time
function resetIdleTime() {
    idleTime = 0;
}

// Deteksi aktivitas user
window.onload = function() {
    // Reset idle time jika ada aktivitas
    document.body.addEventListener('mousemove', resetIdleTime);
    document.body.addEventListener('keydown', resetIdleTime);

    // Set interval untuk cek idle time
    setInterval(function() {
        idleTime++;
        if (idleTime >= idleLimit) {
            logout(); // Auto logout jika idle selama 30 detik
        }
    }, 1000); // Mengecek setiap detik
};