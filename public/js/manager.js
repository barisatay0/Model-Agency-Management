//For Responsive
const toggleSidebarButton = document.getElementById("toggleSidebarButton");
const sidebarContent = document.querySelector(".sidebar-content");

function toggleSidebar() {
    sidebarContent.classList.toggle("hidden");
}

toggleSidebarButton.addEventListener("click", toggleSidebar);
window.addEventListener("resize", function () {
    if (window.innerWidth < 576) {
        sidebarContent.classList.add("hidden");
    } else {
        sidebarContent.classList.remove("hidden");
    }
});

if (window.innerWidth < 576) {
    sidebarContent.classList.add("hidden");
}

