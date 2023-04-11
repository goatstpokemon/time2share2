const hamburger = document.querySelector(".hamburger");
const mobileNavMenu = document.querySelector(".mobile-nav-menu");

hamburger.addEventListener("click", () => {
    mobileNavMenu.classList.toggle("is-open");
});
