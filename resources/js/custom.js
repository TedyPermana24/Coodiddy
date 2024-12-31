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

// script halaman listPembayaran
function setActive(button) {
    
    const buttons = document.querySelectorAll('#button-group button');
    buttons.forEach(btn => {
        btn.className = 'text-black font-medium';
    });

    
    button.className = 'relative text-[#A5724C]  h-10 after:content-[""] after:block after:h-[2px] after:w-full after:bg-[#A5724C] after:absolute after:bottom-0 after:left-0';
}

// function confirmDelete(button) {
//     const confirmation = document.createElement('div');
//     confirmation.innerHTML = `
//         <div class='fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center'>
//             <div class='bg-white p-6 rounded-lg shadow-lg'>
//                 <p class='mb-4'>Apa anda yakin?</p>
//                 <div class='flex justify-end space-x-4'>
//                     <button id='yesButton' class='bg-red-500 text-white px-4 py-2 rounded-lg'>Ya</button>
//                     <button id='noButton' class='bg-gray-200 px-4 py-2 rounded-lg'>Tidak</button>
//                 </div>
//             </div>
//         </div>
//     `;
//     document.body.appendChild(confirmation);

//     document.getElementById('yesButton').addEventListener('click', () => {
//         const parentDiv = button.closest('.bg-white');
//         parentDiv.remove();
//         confirmation.remove();
//     });

//     document.getElementById('noButton').addEventListener('click', () => {
//         confirmation.remove();
//     });
// }
// ---------------------------------------------