window.onscroll = function() {stickyNavbar()};
var navbar = document.getElementById("navbar");
function stickyNavbar() {
if (window.scrollY >= 100) {
    navbar.classList.add("sticky", "top-0")
} else {
    navbar.classList.remove("sticky", "top-0");
}
}
