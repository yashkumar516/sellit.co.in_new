/* Add here all your JS customizations */

var baseUrl =
  window.location.protocol +
  "//" +
  window.location.hostname +
  (window.location.port ? ":" + window.location.port : "");
var host = window.location.hostname;
console.log("Base URL: " + baseUrl);
console.log("host URL: " + host);
var preImageUrl = host !== "localhost" ? `${baseUrl}/admin/img` : `${baseUrl}/sellit/admin/img`;
function checkImageUrl() {
  // Replace old image paths with new ones
  $("img").each(function () {
    var oldSrc = $(this).attr("src");
    oldSrc = oldSrc.replace(/^(\.\.\/)+/, "");
    if (
      oldSrc.indexOf("https://drive.google.com") !== -1 &&
      oldSrc.indexOf("https://drive.google.com2/uc?id=") === -1
    ) {
      // Remove everything before https
      newSrc = oldSrc.replace(/.*https/, "https");

      newSrc = newSrc.replace(
        /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/,
        "https://drive.google.com/uc?id=$1"
      );
      $(this).attr("src", newSrc);
    }
    // else if (oldSrc.indexOf("https") !== -1) {
    //   if (oldSrc.indexOf("https://drive.google.com") !== -1) {
    //     // var newSrc = oldSrc.replace(/admin\/img\//, "");
    //     newSrc = newSrc.replace(
    //       /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=sharing/,
    //       "https://drive.google.com/uc?id=$1"
    //     );
    //     $(this).attr("src", newSrc);
    //   } else {
    //     oldSrc = oldSrc.split("https");
    //     if (oldSrc.length > 0) {
    //       oldSrc = "https" + oldSrc[1];
    //       $(this).attr("src", oldSrc);
    //     }
    //   }
    // }
  });
}

// window.onload = function () {
//   $("img").each(function () {
//     $(this).attr("src", `${preImageUrl}/placeholder-product.png`);
//   });
// };
$(document).ready(function () {
  // $("img").each(function () {
  //   $(this).attr("src", `${preImageUrl}/placeholder-product.png`);
  // });
  checkImageUrl();
});

function showImage() {
  // Get the actual image and placeholder
  var actualImage = document.getElementById("actualImage");
  var placeholder = document.getElementById("placeholder");

  // Display the actual image and hide the placeholder
  actualImage.style.display = "block";
  placeholder.style.display = "none";
}
