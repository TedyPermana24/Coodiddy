function toggleDropdown() {
    const dropdown = document.getElementById("dropdown-menu");
    dropdown.classList.toggle("active");
}

// Close dropdown when clicking outside
window.addEventListener("click", function (e) {
    const dropdown = document.getElementById("dropdown-menu");
    const profilePic = document.querySelector(".profile-pic");
    if (!dropdown.contains(e.target) && !profilePic.contains(e.target)) {
        dropdown.classList.remove("active");
    }
});