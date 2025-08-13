
<script>
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebar-overlay");
    const toggleBtn = document.getElementById("toggle-btn");
    const content = document.getElementById("content");

    function toggleSidebar() {
        sidebar.classList.toggle("active");

        if (window.innerWidth >= 992) { // Desktop
            content.classList.toggle("shift");
        } else { // Mobile
            overlay.style.display = sidebar.classList.contains("active") ? "block" : "none";
        }
    }

    toggleBtn.addEventListener("click", toggleSidebar);
    overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.style.display = "none";
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 992) {
            overlay.style.display = "none";
            if (!sidebar.classList.contains("active")) {
                sidebar.classList.add("active");
                content.classList.add("shift");
            }
        } else {
            content.classList.remove("shift");
            sidebar.classList.remove("active");
        }
    });

    if (window.innerWidth >= 992) {
        sidebar.classList.add("active");
        content.classList.add("shift");
    }

    // Loading animation hide
    window.addEventListener("load", () => {
        document.getElementById("loading-screen").style.display = "none";
    });
</script>
</body>
</html>