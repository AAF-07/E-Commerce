import './bootstrap';

window.showTab = function(tabId) {
    // Sembunyikan semua konten tab
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.add('hidden'));

    // Tampilkan konten tab yang dipilih
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }
}

// Tampilkan tab pertama secara default saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    showTab('biodata');
});
