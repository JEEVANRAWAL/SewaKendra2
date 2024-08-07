const bookButton = document.getElementById('book-now');
const popupForm = document.getElementById('popupForm');
const closeButton = document.querySelector('.close-button');



// Function to show the popup form
function showPopupForm() {
  popupForm.classList.add('active');
}

// Function to hide the popup form
function hidePopupForm() {
  popupForm.classList.remove('active');
}

// Event listener for the book button
bookButton.addEventListener('click', showPopupForm);


// Event listener for the close button
closeButton.addEventListener('click', hidePopupForm);
