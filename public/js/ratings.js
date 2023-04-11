const ratingInputs = document.querySelectorAll('.rating input[type="radio"]');
const ratingLabels = document.querySelectorAll(".rating label");

// Open the overlay when the button is clicked
const openButtonReturn = document.querySelector("#open-overlay-return");
const overlayReturn = document.querySelector("#overlay-return");
openButtonReturn.addEventListener("click", function () {
    overlayReturn.style.display = "block";
});

// Close the overlay when the close button is clicked
const closeButtonReturn = document.querySelector("#close-overlay-return");
closeButtonReturn.addEventListener("click", function () {
    overlayReturn.style.display = "none";
});

ratingInputs.forEach((input) => {
    input.addEventListener("click", () => {
        ratingLabels.forEach((label, index) => {
            if (index < input.value) {
                label.classList.add("selected");
            } else {
                label.classList.remove("selected");
            }
        });
    });
});
