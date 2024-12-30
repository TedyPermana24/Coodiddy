console.log('custom.js loaded');

document.addEventListener("DOMContentLoaded", function () {
    // Dropdown toggle function
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown-menu");
        if (dropdown) {
            dropdown.classList.toggle("active");
        }
    }

    // Attach the toggleDropdown function to the profile picture click event
    const profilePic = document.querySelector("img[alt='User profile picture']"); // Gambar profil berdasarkan atribut alt
    if (profilePic) {
        profilePic.addEventListener("click", toggleDropdown);
    }

    // Close dropdown when clicking outside
    window.addEventListener("click", function (e) {
        const dropdown = document.getElementById("dropdown-menu");
        if (dropdown && !dropdown.contains(e.target) && !profilePic.contains(e.target)) {
            dropdown.classList.remove("active");
        }
    });

    // Event listener for heart icons
    const hearts = document.querySelectorAll(".card .uil-heart"); // Memilih semua ikon hati dalam card
    hearts.forEach(function(heart) {
        heart.addEventListener("click", () => {
            heart.classList.toggle("uil-heart");  // Menghilangkan hati kosong
            heart.classList.toggle("uil-heart-fill");  // Menambahkan hati penuh
            heart.classList.toggle("text-red-500");  // Ganti warna menjadi merah ketika diklik
        });
    });
});
