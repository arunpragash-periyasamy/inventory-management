
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


// form submit handling
$(document).ready(() => {
        $("button").on("click", ()=>{
            $("form").submit();
        })
        console.log("Document loaded");
})