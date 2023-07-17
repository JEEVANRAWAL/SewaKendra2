 var listItems = document.querySelectorAll('li');
 var previousElement = null;


 listItems.forEach(function(item){
    item.addEventListener('click', addClass);
 })
 
 function addClass(event){
    if(previousElement !== null){

        previousElement.classList.remove('active');
    }
     var clickedElement= event.target;
     clickedElement.classList.add('active');
     previousElement = clickedElement;
 }
 


 
 // javascript for logout dropdown 
 
   function toggleDropdown() {
 var dropdownMenu = document.getElementById('dropdownMenu');
 dropdownMenu.classList.toggle('show');
}
 