// Open the overlay when the button is clicked
const openButtonBorrow = document.querySelector("#open-overlay-borrow");
const overlayBorrow = document.querySelector("#overlay-borrow");
openButtonBorrow.addEventListener("click", function () {
    overlayBorrow.style.display = "block";
});

// Close the overlay when the close button is clicked
const closeButtonBorrow = document.querySelector("#close-overlay-borrow");
closeButtonBorrow.addEventListener("click", function () {
    overlay.style.display = "none";
});
