// get the current date and time
const getTime = () => {
  // Get the current date and time
  var currentTime = new Date();

  // Extract the current time components (hours, minutes, seconds)
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();

  // You can format the time as desired, e.g., to display it on a webpage
  var formattedTime = hours + ":" + minutes + ":" + seconds;
  return formattedTime;
}



// function for change the content of the page
const change_content = () => {

  $(".page-wrapper").empty();
  let url = $(location).attr("pathname"); // get the page from the url

  if (url != "/" && url != "/dashboard") {
    let path = url + ".php";
    let page = url.split("/")[2];
    if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");

      // request to get the page content
      $(".page-wrapper").load("/get_file.php?file=" + path, (response, status, xhr) => {
        if (status == "error") {
          $(".main-wrapper").html(response);
        }
      });
    } else {
      console.error("Page not found");
    }

  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
    $(".page-wrapper").load("/get_file.php?file=/dashboard.php", (response, status, xhr) => {
      if (status == "error") {
        $(".main-wrapper").html(response);
      }
    });

  }

};


// processing the form data by removing the empty field of the form.
const getFormData = () => {
  let formData = $("form#new_data").serializeArray();

  formDataObject = {};
  formDataObject.time = getTime();
  formData.forEach((item) => {
    formDataObject[item.name] = item.value;
  });
  return formDataObject;
}

// processing the form data by removing the empty field of the form.
const handleForm = () => {
  console.log("form submitted");
  let formData = getFormData();

  console.log(formData);


  $(".select").each((index, element) => {
    $(element).prop("selectedIndex", 0);
  });
}



// function calling
change_content();


$(document).ready(function () {

  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault(); // preventing automatic form subbmission
    }
  });
});

$(".submit-button").on("click", () => {
  console.log("form buitton clicekd")
  _.throttle(handleForm(), 5000, { trailing: false });
});