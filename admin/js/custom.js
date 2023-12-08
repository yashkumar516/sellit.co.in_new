/* Add here all your JS customizations */
{
  // Get the label element
  var searchLabel = document.getElementById("searchLabel");

  // Create an icon element (you can replace this with your preferred icon)
  var searchIcon = document.createElement("i");
  searchIcon.className = "fas fa-search"; // Font Awesome search icon

  // Insert the icon before the input field within the label
  searchLabel.insertBefore(searchIcon, searchLabel.firstChild);
}
