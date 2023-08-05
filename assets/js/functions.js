
// function for change the content of the page 
const change_content = async () => {
  let url = $(location).attr("pathname");
  if (url != "/" && url != "/dashboard") {
    let path = url + ".php";
    let page = url.split("/")[2];
    if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");
      await $.ajax({
        url: path,
        type: "GET",
        success: function (data) {
          $(".page-wrapper").replaceWith(data);
        },
      });
    }
  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
  }
};

change_content();


$(document).ready(function () {

  $("form#new_data").on("submit",(event) => {
    event.preventDefault();
    console.log("Form is tried to submit");
  })

  $("form#new_data :input").on("keypress", function (event) {
    // Check if the Enter key (key code 13) is pressed
    if (event.which === 13) {
      // Prevent the default Enter key behavior
      event.preventDefault();
      console.log("Enter preseed");
    }
  });


  
  $(".submit-button").on("click",_.throttle(function () {
    $(".submit-button").prop("disabled", true);
    var formData = $("form#new_data").serializeArray();
    formDataObject = {};
    formData.forEach((item) => {
      formDataObject[item.name] = item.value;
    });
    console.log(formDataObject);
    submit_ended();
  },5000, { trailing: false }))
});

const submit_ended = () => {
  $(".submit-button").prop("disabled",false);
  console.log("throttle ended");
}