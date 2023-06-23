<footer class="bg-sky-900 ">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-t border-gray-800 py-10">
        <p class="text-sm text-gray-200">Copyright &copy; 2023 Michał Koper.</p>
      </div>
    </div>
  </footer>

<?php wp_footer() ?>
<script>
    window.onscroll = function() {stickyNavbar()};
var navbar = document.getElementById("navbar");
function stickyNavbar() {
    if (window.scrollY >= 100) {
        navbar.classList.add("sticky", "top-0")
    } else {
        navbar.classList.remove("sticky", "top-0");
    }
}
</script>
</body>
</html>
