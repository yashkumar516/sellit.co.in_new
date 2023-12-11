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
          /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=drive_link/,
          "https://drive.google.com/uc?id=$1"
        );
        $(this).attr("src", newSrc);
      } else if (oldSrc.indexOf("https") !== -1) {
        if (oldSrc.indexOf("https://drive.google.com") !== -1) {
          // var newSrc = oldSrc.replace(/admin\/img\//, "");
          newSrc = newSrc.replace(
            /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=sharing/,
            "https://drive.google.com/uc?id=$1"
          );
          $(this).attr("src", newSrc);
        } else {
          oldSrc = oldSrc.split("https");
          if (oldSrc.length > 0) {
            oldSrc = "https" + oldSrc[1];
            $(this).attr("src", oldSrc);
          }
        }
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
}
