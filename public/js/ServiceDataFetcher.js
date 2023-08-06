const EditButtons = document.querySelectorAll('.edit');
const DeleteButtons = document.querySelectorAll('.delete');
const popupForm = document.querySelector('#popupForm');
const popupForm2 = document.querySelector('#popupForm2');
const closeButton = document.querySelector('.close-button');
const closeButton2 = document.querySelector('.close-button2');

//to handel edit event
EditButtons.forEach((button) => {
  button.addEventListener('click', function(event) {
    showPopupForm();
    handleUpdateClick(event); // Pass the event to handleUpdateClick
  });
});

//to handel delete event
DeleteButtons.forEach((button) => {
    button.addEventListener('click', function(event2) {
      showPopupForm2();
      handleDeleteClick(event2); 
    });
  });


// Event listener for the close button
closeButton.addEventListener('click', hidePopupForm);
closeButton2.addEventListener('click', hidePopupForm2);



function showPopupForm() {
  popupForm.classList.add('active');
}


function showPopupForm2() {
    popupForm2.classList.add('active');
  }


// Function to hide the popup form
function hidePopupForm() {
    popupForm.classList.remove('active');
  }


  function hidePopupForm2() {
    popupForm2.classList.remove('active');
  }


function handleUpdateClick(event) {
  // Get the row containing the update button that was clicked
  const row = event.target.closest('tr');
  
  // Get the data from the row cells
  const ServiceId = row.cells[0].innerText;
  const Name = row.cells[1].innerText;
  const Description = row.cells[2].innerText;
  const Price = row.cells[3].innerText;
  

  // Populate the edit form with the current data
  document.querySelector('.ServiceId').value = ServiceId;
  document.querySelector('.Name').value = Name;
  document.querySelector('.Description').value = Description;
  document.querySelector('.Price').value = Price;
  
}


function handleDeleteClick(event2) {
    // Get the row containing the update button that was clicked
    const row = event2.target.closest('tr');
    
    // Get the data from the row cells
    const ServiceId = row.cells[0].innerText;
    const ServiceName = row.cells[1].innerText;
    const ServicePrice= row.cells[3].innerText;
    
    // Populate the edit form with the current data
    document.querySelector('.spanServiceId').innerText = ServiceId;
    document.querySelector('.ServiceId2').value = ServiceId;
    document.querySelector('.spanServiceName').innerText = ServiceName;
    document.querySelector('.spanServicePrice').innerText = ServicePrice;
    
    
  }
  