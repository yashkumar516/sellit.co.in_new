var selectedFile;

function importCSVFile(e) {
  console.log("hiiiii");

  $("#importCSV").val("");
  $("#importCSV").trigger("click");
}
function changeFile(e) {
  console.log("hello");
  e.preventDefault();
  var fileName = e.target.files[e.target.files.length - 1];

  console.log("hiiiii", fileName);
  $(".dragInner span").html("Upload File " + fileName.name);
  // selectedFile = fileName;
}

function dropFile(event) {
  event.preventDefault();
  var files = event.dataTransfer.files;

  if (files.length > 0) {
    console.log("----files----", files);
    var fileName = files[0].name;
    // selectedFile = files[0].name;
    // Update the text inside the span with the file name
    $(".dragInner span").html("Upload File " + fileName);
    $("#importCSV").prop("files", files);
    // .files = files;
    console.log("hiiifilesii----files----", files[0]);
  }
}

function dragNdrop(event) {
  event.preventDefault();
}

function submitFormCSV(event, url) {
  // Access the selected file and perform actions (e.g., submit the form)
  if (selectedFile) {
    var formData = new FormData(document.getElementById("uploadCSVForm"));

    formData.append("csvfile", selectedFile);

    console.log("uploadCSVForm");
    // Add additional form data if needed
    for (var pair of formData.entries()) {
      console.log(pair[0] + ": " + pair[1]);
    }

    // Submit the form
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("Upload successful", response);
      },
      error: function (error) {
        console.error("Upload failed", error);
      },
    });
    event.preventDefault();
  }
}
