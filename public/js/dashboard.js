document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.querySelector(".hamburger");
    const sidebar   = document.querySelector(".sidebar");
    const overlay   = document.querySelector(".overlay");

    if (hamburger && sidebar && overlay) {
        function openSidebar() {
            sidebar.classList.add("open");
            overlay.classList.add("show");
        }
        function closeSidebar() {
            sidebar.classList.remove("open");
            overlay.classList.remove("show");
        }
        hamburger.addEventListener("click", openSidebar);
        overlay.addEventListener("click", closeSidebar);
    }

    const btnLogout = document.getElementById("btn-logout");
    if (btnLogout) {
        btnLogout.addEventListener("click", (e) => {
            e.preventDefault();
            if (confirm("¿Seguro que deseas cerrar sesión?")) {
                window.location.href = e.currentTarget.href;
            }
        });
    }
});
