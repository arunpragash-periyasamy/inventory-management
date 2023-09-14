// function for change the content of the page
const change_content = async () => {
  let url = $(location).attr("pathname");
  if (url != "/" && url != "/dashboard") {
    let path = url + ".php";
    let page = url.split("/")[2];
    if (
      $(".main-wrapper").find(".header") &&
      $(".main-wrapper").find(".sidebar")
    ) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");

      // request to get the page content
      await $.ajax({
        url: "/get_file.php?file="+path,
        type: "GET",
        success: (data) => {
          $(".page-wrapper").replaceWith(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          var errorMessage = jqXHR.responseText;
          $(".main-wrapper").replaceWith(errorMessage);
          console.log(errorMessage);
      }
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
  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault();
    }
  });

  $(".submit-button").on(
    "click",
    _.throttle(
      function () {
        $(".submit-button").prop("disabled", true);
        var formData = $("form#new_data").serializeArray();
        formDataObject = {};
        formData.forEach((item) => {
          formDataObject[item.name] = item.value;
        });
        console.log(formDataObject);
        submit_ended();
        $("form")[0].reset();
        $(".select").each((index, element) => {
          element.prop("selectedIndex",0);
        })
      },
      5000,
      { trailing: false }
    )
  );
  
  const submit_ended = () => {
    $(".submit-button").prop("disabled", false);
    console.log("throttle ended");
  };


// end of the document ready function
});
