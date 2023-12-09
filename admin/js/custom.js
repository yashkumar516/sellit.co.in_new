/* Add here all your JS customizations */
{
  $(document).ready(function () {
    // Replace old image paths with new ones
    $("img").each(function () {
      var oldSrc = $(this).attr("src");
      oldSrc = oldSrc.replace(/^(\.\.\/)+/, "");

      if (oldSrc.indexOf("https://drive.google.com") !== -1) {
        oldSrc = oldSrc.replace(/admin\/img\//, "");
        var newSrc = oldSrc.replace(/img\//, "");
        newSrc = newSrc.replace(
          /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=sharing/,
          "https://drive.google.com/uc?id=$1"
        );
        $(this).attr("src", newSrc);
      }
    });
  });
  // Get the label element
  var searchLabel = document.getElementById("searchLabel");

  // Create an icon element (you can replace this with your preferred icon)
  var searchIcon = document.createElement("i");
  searchIcon.className = "fas fa-search"; // Font Awesome search icon

  // Insert the icon before the input field within the label
  searchLabel.insertBefore(searchIcon, searchLabel.firstChild);

  // function dragNdrop(event) {
  //   var fileName = event.target.files[0] || {};

  //   $(".dragInner span").html("Upload File " + fileName.name);
  // }
  function dragNdrop(event) {
    var fileName = event.target.files[0] || {};

    $(".dragInner span").html("Upload File " + fileName.name);
  }
}
