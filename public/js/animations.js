const categories = document.querySelectorAll(".category");

categories.forEach((category) => {
    category.addEventListener("click", () => {
        category.classList.add("category-clicked");
    });
});
