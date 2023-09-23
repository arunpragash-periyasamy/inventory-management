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

const getIp = async () => {
  try {
    const data = await $.getJSON('https://api.ipify.org?format=json');
    const ipAddress = data.ip;
    console.log(ipAddress);
    return ipAddress;
  } catch (error) {
    console.error('Error getting IP address: ' + error.statusText);
    throw error;
  }
}

let currentPage = null;

// function for change the content of the page
const change_content = () => {

  $(".page-wrapper").empty();
  let url = $(location).attr("pathname"); // get the page from the url

  if (url != "/" && url != "/dashboard") {
    let path = url + ".php";
    let page = url.split("/")[2];
    currentPage = page;
    if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");

      // request to get the page content
      // $(".page-wrapper").load("/get_file.php?file=" + path, (response, status, xhr) => {
      //   if (status == "error") {
      //     $(".main-wrapper").html(response);
      //   }
      // });
      $.get("/get_file.php?file=" + path, function (data) {
        // Replace the entire #content element with the loaded content
        $('.page-wrapper').replaceWith(data);
      });
  
    } else {
      console.error("Page not found");
    }

  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
    // $(".page-wrapper").load("/get_file.php?file=/dashboard.php", (response, status, xhr) => {
    //   if (status == "error") {
    //     $(".main-wrapper").html(response);
    //   }
    // });
    $.get("/get_file.php?file=/dashboard.php", function (data) {
      // Replace the entire #content element with the loaded content
      $('.page-wrapper').replaceWith(data);
    });

  }

};


// processing the form data by removing the empty field of the form.
// const getFormData = (elementClass = "new_form") => {
//   let formData = $(`form#${elementClass}`).serializeArray();

//   formDataObject = {};
//   formDataObject.time = getTime();
//   getIp().then((ipAddress) => {
//     formDataObject.ip = ipAddress;
//   }).catch((error)=>{
//     formDataObject.ipAddress = "error";
//   });

//   formData.forEach((item) => {
//     if (item.value !== "") {
//       formDataObject[item.name] = item.value;
//     }
//   });
//   return formDataObject;
// }

const getFormData = async (elementClass="new_form") => {
  const formData = $(`form.${elementClass}`).serializeArray();

  const formDataObject = {
    time: getTime(),
  };

  try {
    const ipAddress = await getIp();
    formDataObject.ip = ipAddress;
  } catch (error) {
    formDataObject.ip = "error";
    console.error('Error:', error);
  }

  formData.forEach((item) => {
    if (item.value !== "") {
      formDataObject[item.name] = item.value;
    }
  });

  return formDataObject;
}


const resetForm = (elementClass = "new_form") => {
  // reset the form data 
  $(`form.${elementClass}`)[0].reset();
  $('.select').val('').trigger('change.select2');
}

// processing the form data by removing the empty field of the form.
const handleForm = async (elementClass = "new_form") => {
  console.log("Form is going to submit");
  let formData = await getFormData();
  $.ajax({
    url: '/functions/form_submit.php',
    type: 'POST',
    data: {
      table_name: currentPage,
      form: formData,
    },
    success: function (response) {
      // Handle the success response from the server here
      console.log(response);
    },
    error: function (xhr, status, error) {
      // Handle any errors that occurred during the request here
      console.error(error);
    }
  });

  resetForm();
}


// function calling
change_content();


$(document).ready(function () {

  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault(); // preventing automatic form subbmission
    }
  });

  $(".btn-submit").on("click", _.throttle(handleForm, 5000, { trailing: false }));
});