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
      $.ajax({
        url: "/get_file.php?file=" + path,
        type: "GET",
        success: (data) => {
          $(".page-wrapper").replaceWith(data);
        },
        error: (jqXHR, textStatus, errorThrown) => {
          var errorMessage = jqXHR.responseText;
          $(".main-wrapper").replaceWith(errorMessage);
        }
      });
    } else {
      console.error("Page not foun");
    }

  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
    $.ajax({
      url: "/get_file.php?file=/dashboard.php",
      type: "GET",
      success: (data) => {
        $(".page-wrapper").replaceWith(data);
      },
      error: (jqXHR, textStatus, errorThrown) => {
        var errorMessage = jqXHR.responseText;
        $(".main-wrapper").replaceWith(errorMessage);
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

  let formData = getFormData();

  console.log(formData);

  $("form")[0].reset();
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


  // handling submit form with throttle(loadash.js) function
  $(".submit-button").on("click", _.throttle(handleForm, 5000, { trailing: false }));


  // handling the page refresh
  $("a.page_url").click(async function(event) {
    event.preventDefault(); // Prevent the default link behavior (page reload)

    // Get the target URL from the href attribute
    var targetUrl = $(this).attr("href");
    // Change the URL without a full page reload
    window.history.pushState({}, "", targetUrl);
    // You can also update the page content here if needed
    // Optionally, trigger any other actions related to the link click
    change_content();
    // if($('#sales_charts').length>0){var options={series:[{name:'Sales',data:[50,45,60,70,50,45,60,70],},{name:'Purchase',data:[-21,-54,-45,-35,-21,-54,-45,-35]}],colors:['#28C76F','#EA5455'],chart:{type:'bar',height:300,stacked:true,zoom:{enabled:true}},responsive:[{breakpoint:280,options:{legend:{position:'bottom',offsetY:0}}}],plotOptions:{bar:{horizontal:false,columnWidth:'20%',endingShape:'rounded'},},xaxis:{categories:[' Jan ','feb','march','april','may','june','july','auguest'],},legend:{position:'right',offsetY:40},fill:{opacity:1}};var chart=new ApexCharts(document.querySelector("#sales_charts"),options);chart.render();}});
    $(this).closest(".submenu").children("a").addClass("active subdrop");
    if(targetUrl === "/dashboard" || targetUrl === "/") location.reload(true);
    return false; // Prevent any other click handlers from executing
});

});
