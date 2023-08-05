
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


  // this is safety that prevert the form tried to submit when button type is submit
  $("form").on("submit keypress",(event) => {
    if(event.type === 'submit' || event.type === 'keydown'){
      event.preventDefault();
    }
  })

  // this is the function when the 
  // $("form#new_data :input").on("keypress", function (event) {
  //   if (event.which === 13) {
  //     event.preventDefault();
  //     console.log("Enter preseed");
  //   }
  // });


  isThrottle = false;
  $(".submit-button").on("click",function () {
    if(!isThrottle){
      isThrottle = true;
      $(".submit-button").prop("disabled", true);
      var formData = $("form#new_data").serializeArray();
      formDataObject = {};
      formData.forEach((item) => {
        formDataObject[item.name] = item.value;
      });
      console.log(formDataObject);
      setTimeout(() => {
        isThrottled = false;
        $("form")[0].reset();
        $(".submit-button").prop("disabled", false);
        console.log("Submit button enabled");
      }, 5000);
    }
  });


  const submit_ended = () => {
    $(".submit-button").prop("disabled",false);
    console.log("throttle ended");
  }

});

  
//   $(".submit-button").on("click",_.throttle(function () {
//     $(".submit-button").prop("disabled", true);
//     var formData = $("form#new_data").serializeArray();
//     formDataObject = {};
//     formData.forEach((item) => {
//       formDataObject[item.name] = item.value;
//     });
//     console.log(formDataObject);
//     submit_ended();
//     console.log($("form").reset());
//   },5000, { trailing: false }))
// });
