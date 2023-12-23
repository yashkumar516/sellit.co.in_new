{
  /* Add here all your JS customizations */
  $("#do-spinner-call").click(function () {
    //The load button
    $("#spinner-div").show(); //Load button clicked
  });
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

        // Replace the second link format
        newSrc = newSrc.replace(
          /https:\/\/drive.google.com\/file\/d\/([^\/]+)\/view\?usp=(drive_link|share|sharing|embed|direct_url|open_url)/,
          "https://drive.google.com/uc?id=$1"
        );

        $(this).attr("src", `${preImageUrl}/placeholder-product.png`);
        $(this).attr("src", newSrc);
      } else if (oldSrc.indexOf("https") !== -1) {
        newSrc = oldSrc.replace(/.*https/, "https");
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
  //   // Call your function here
  //   // $("img").each(function () {
  //   //   $(this).attr("src", `${preImageUrl}/placeholder-product.png`);
  //   // });
  // };
  $(document).ready(function () {
    checkImageUrl();
  });
  // Get the label element
  var searchLabel = document.getElementById("searchLabel");

  // Create an icon element (you can replace this with your preferred icon)
  var searchIcon = document.createElement("i");
  searchIcon.className = "fas fa-search"; // Font Awesome search icon

  // Insert the icon before the input field within the label
  searchLabel.insertBefore(searchIcon, searchLabel.firstChild);

  function showImage() {
    // Get the actual image and placeholder
    var actualImage = document.getElementById("actualImage");
    var placeholder = document.getElementById("placeholder");

    // Display the actual image and hide the placeholder
    actualImage.style.display = "block";
    placeholder.style.display = "none";
  }
}

function syncImageAjax(syncOn) {
  var id = 1;
  console.log("syncOn---", { syncOn });
  if (syncOn && syncOn !== "") {
    $("#spinner-div").show();
    $.ajax({
      method: "post",
      url: "ajaxSyncImage.php",
      data: {
        syncOn: syncOn,
      },
      dataType: "html",
      success: function (result) {
        console.log({ result });
        alert(result);
        let callbackUrl = syncOn === "Model" ? "ecommerce-products-form.php" : "brandquestions.php";
        window.location.href = callbackUrl;
        $("#spinner-div").hide();
      },
    });
  }
}

function uploadAjaxCSV(uploadOn) {
  var id = 1;
  console.log("syncOn---", { syncOn });
  if (syncOn && syncOn !== "") {
    $("#spinner-div").show();
    $.ajax({
      method: "post",
      url: "ajaxSyncImage.php",
      data: {
        uploadOn: uploadOn,
      },
      dataType: "html",
      success: function (result) {
        console.log({ result });
        alert(result);
        let callbackUrl = syncOn === "Model" ? "ecommerce-products-form.php" : "brandquestions.php";
        window.location.href = callbackUrl;
        $("#spinner-div").hide();
      },
    });
  }
}

function submitCSVForm(uploadCSVForm, uploadType) {
  $("#spinner-div").show();
  var formData = new FormData($(`#${uploadCSVForm}`)[0]);
  // var formData = new FormData($("#fileUploadForm")[0]);

  formData.append("uploadType", uploadType);
  // child-category.php?category=1
  let callbackUrl =
    uploadType === "Model"
      ? "ecommerce-products-form.php"
      : uploadType === "Brand"
      ? "brandquestions.php"
      : `child-category.php?category=${formData.get("categoryId")}`;
  console.log({ formData });
  $.ajax({
    type: "POST",
    url: "ajaxUploadCSV.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log("File uploaded successfully", { response });

      alert(response);
      window.location.href = callbackUrl;
      $("#spinner-div").hide();
    },
    error: function (error) {
      alert("Upload failed");

      window.location.href = callbackUrl;
      $("#spinner-div").hide();
      console.error("Error uploading file", error);
    },
  });
}
