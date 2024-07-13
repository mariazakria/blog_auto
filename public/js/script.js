// First, select the element
var myElement = document.getElementById('toggleMainMenu');

// Then, add an event listener for the 'click' event
myElement.addEventListener('click', function() {
  // This function is called whenever the element is clicked
  var elem = document.getElementById('mainMenu');

  // Add the 'active' class to the element
  elem.classList.add('open');
});


// First, select the element
var myElement = document.getElementById('close-menu');

// Then, add an event listener for the 'click' event
myElement.addEventListener('click', function() {
  // This function is called whenever the element is clicked
  var elem = document.getElementById('mainMenu');

  // Add the 'active' class to the element
  elem.classList.remove('open');
});


// First, select the element
var myElement = document.getElementById('home-viewall');

// Then, add an event listener for the 'click' event
myElement.addEventListener('click', function() {
  // This function is called whenever the element is clicked
  var elem = document.getElementById('js-home-vehicles');

  // Add the 'active' class to the element
  elem.classList.contains("open") ?  elem.classList.remove('open') : elem.classList.add('open');
});







