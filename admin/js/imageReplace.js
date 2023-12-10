/* Add here all your JS customizations */
{
  $(document).ready(function () {
    // Replace old image paths with new ones
    $("img").each(function () {
      var oldSrc = $(this).attr("src");
      oldSrc = oldSrc.replace(/^(\.\.\/)+/, "");
      if (oldSrc.indexOf("https://drive.google.com") !== -1) {
        var newSrc = oldSrc.replace(/admin\/img\//, "");
        newSrc = newSrc.replace(
          /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=sharing/,
          "https://drive.google.com/uc?id=$1"
        );
        $(this).attr("src", newSrc);
      } else if (oldSrc.indexOf("https") !== -1) {
        oldSrc = oldSrc.split("https");
        if (oldSrc.length > 0) {
          oldSrc = "https" + oldSrc[1];
          $(this).attr("src", oldSrc);
        }
      }
    });
  });
}
