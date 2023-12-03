$("#toggle_btn").addClass("active");
$("*").removeClass("active");
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

// storing the ip address
let ipAddress;
(async () => {
  let data = await $.getJSON('https://api.ipify.org?format=json');
  ipAddress = data.ip;
})();
// processing the form data by removing the empty field of the form.


const getFormData = async (elementClass = "newForm") => {
  const formData = new FormData(); // Initialize a FormData object

  formData.append('time', getTime());
  formData.append('ip', ipAddress);

  $(`form.${elementClass} :input`).each(function () {
    const $input = $(this);
    const name = $input.attr('name');
    const value = $input.val();

    if (name && value !== "") {
      formData.append(name, value);
    }
  });

  $("input[type='file'][id$='image']").each(function () {
    var id = $(this).attr("id");
    var files = $(this)[0].files;

    if (files.length > 0) {
      formData.append(id, files[0]);
    }
  });

  return formData; // Return the FormData object
}


const resetForm = (elementClass = "newForm") => {
  // reset the form data 
  $(`form.${elementClass}`)[0].reset();
  $('.select').val('').trigger('change.select2');
}


const handleForm = async (event, elementClass = "newForm", method = "insert") => {
  try {
    let formData = await getFormData(); // Use the formData from getFormData function
    if (method == "delete") {
      $.ajax({
        url: '/',
        type: "DELETE",
        data: { id: 1 },
        success: (data) => {
          console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // Handle errors, if any
          console.error('AJAX Error:', textStatus, errorThrown);
        }
      });
      console.log("delete method called");
    } else if (method == "update") {
      $.ajax({
        url: '/',
        type: "PUT",
        data: { id: 1 },
        success: (data) => {
          console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // Handle errors, if any
          console.error('AJAX Error:', textStatus, errorThrown);
        }
      });
      console.log("update method called");
    } else {
      console.log(formData);
      $.ajax({
        url: '/',
        type: 'POST',
        data: formData, // Use the correct formData object
        processData: false, // Prevent jQuery from processing the data
        contentType: false, // Prevent jQuery from setting contentType
        success: (response) => {
          if(response !== ""){
            console.log(response);
          }
        },
        error: (xhr, status, error) => {
          // Handle any errors that occurred during the request here
          console.error(error);
        }
      });
    }
  } catch (err) {
    console.log(err);
  }

  resetForm(elementClass);
  successMessage("Form Submitted", "");
}


const submitForm = () =>{ 
}


const updateData = (data) =>{
  $.each(data, (key, value) => {
      $(`#${key}`).val(value).trigger("change");;
  })
}


const successMessage = ( title = "Title of the message", message = "Success Message") =>{
  toastr.success(message, title, {
    showDuration: 500,
  });
}

$(document).ready(()=>{
  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault(); // preventing automatic form subbmission
    }
  });

  
  $(".btn-submit").on("click", _.throttle(handleForm, 5000, { trailing: false }));
});