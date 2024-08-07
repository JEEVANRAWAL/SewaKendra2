const viewButtons = document.querySelectorAll('.view');
const popupForm = document.querySelector('#popupForm');
const closeButton = document.querySelector('.close-button');


viewButtons.forEach((button) => {
  button.addEventListener('click', function(event) {
    showPopupForm();
    handleUpdateClick(event); // Pass the event to handleUpdateClick
  });
});


// Event listener for the close button
closeButton.addEventListener('click', hidePopupForm);



function showPopupForm() {
  popupForm.classList.add('active');
}


// Function to hide the popup form
function hidePopupForm() {
    popupForm.classList.remove('active');
  }


function handleUpdateClick(event) {
  // Get the row containing the update button that was clicked
  const row = event.target.closest('tr');
  
  // Get the data from the row cells
  const ProviderId = row.cells[0].innerText;
  const ProviderName = row.cells[1].innerText;
  const ProviderEmail= row.cells[4].innerText;
  
  // Populate the edit form with the current data
  document.querySelector('.spanProviderId').innerText = ProviderId;
  document.querySelector('.ProviderId').value = ProviderId;
  document.querySelector('.spanProviderName').innerText = ProviderName;
  document.querySelector('.ProviderName').value = ProviderName;
  document.querySelector('.spanProviderEmail').innerText = ProviderEmail;
  document.querySelector('.ProviderEmail').value = ProviderEmail;
  
}
