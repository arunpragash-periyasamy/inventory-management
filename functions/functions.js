
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

const applyPlugins = () => {
  $(".select").select2();
  feather.replace();

  // Initialize DataTables
  if ($.fn.DataTable) {
    $('.data-table').DataTable();
  }

  // Initialize Select2
  if ($.fn.select2) {
    $('select').select2();
  }

  // Initialize Bootstrap DateTimePicker
  if ($.fn.datetimepicker) {
    $('.datetimepicker').datetimepicker();
  }

  // // Initialize SweetAlert
  // if (typeof Swal === 'function') {
  //   Swal.fire({});
  // }

  // Initialize Owl Carousel
  if ($.fn.owlCarousel) {
    $('.owl-carousel').owlCarousel();
  }


}

const renderApexChart = () => {
  if ($('#sales_charts').length > 0) {
    var options = {
      series: [
        {
          name: 'Sales',
          data: [50, 45, 60, 70, 50, 45, 60, 70],
        },
        {
          name: 'Purchase',
          data: [-21, -54, -45, -35, -21, -54, -45, -35],
        },
      ],
      colors: ['#28C76F', '#EA5455'],
      chart: {
        type: 'bar',
        height: 300,
        stacked: true,
        zoom: {
          enabled: true,
        },
      },
      responsive: [
        {
          breakpoint: 280,
          options: {
            legend: {
              position: 'bottom',
              offsetY: 0,
            },
          },
        },
      ],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '20%',
          endingShape: 'rounded',
        },
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'August'],
      },
      legend: {
        position: 'right',
        offsetY: 40,
      },
      fill: {
        opacity: 1,
      },
    };

    // Initialize ApexCharts in the desired <div>
    var chart = new ApexCharts(document.querySelector("#sales_charts"), options);
    chart.render();
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
    let requestData = {
      path: path,
      type: "file"
    }
    var queryString = $.param(requestData);
    if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");
      // request to get the page content
      $.get("/request_handling?file=" + path, function (data) {
        // Replace the entire #content element with the loaded content
        $('.page-wrapper').replaceWith(data);

        $html = $(data);
        console.log($html.html());
        applyPlugins();
        methodsOnReady();
      });
      // $.get("/get_file.php?file=" + path, function (data) {
      //   // Replace the entire #content element with the loaded content
      //   $('.page-wrapper').replaceWith(data);
      //   applyPlugins();
      //   methodsOnReady();  
      // });

    } else {
      console.error("Page not found");
    }

  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
    $.get("/request_handling?file=/dashboard.php", function (data) {
      // Replace the entire #content element with the loaded content
      $html = $(data);
      console.log($html.find('.page-wrapper'));
      console.log($html.find('script'));
      $('.page-wrapper').replaceWith(data);
    }).done(() => {
      renderApexChart();
    });
  }

};


// processing the form data by removing the empty field of the form.


const getFormData = async (elementClass = "new_form") => {
  const formDataObject = {
    time: getTime(),
  };

  formDataObject.ip = ipAddress;

  $(`form.${elementClass} :input`).each(function () {
    const $input = $(this);
    const name = $input.attr('name');
    const value = $input.val();

    if (name && value !== "") {
      formDataObject[name] = value;
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
const handleForm = async (elementClass = "new_form", method = "insert") => {
  let formData = await getFormData();
  $.ajax({
    url: '/form_data',
    type: 'POST',
    data: {
      page: currentPage,
      form: formData,
      method: method
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



const methodsOnReady = () => {

  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault(); // preventing automatic form subbmission
    }
  });

  $(".btn-submit").on("click", _.throttle(handleForm, 5000, { trailing: false }));
  applyPlugins();

  // code for preventing the page reload and make the submenu active.
  $("a.page_url").click(function (event) {
    event.preventDefault(); // Prevent the default link behavior (page reload)


    var targetUrl = $(this).attr("href"); // Get the target URL from the href attribute
    window.history.pushState({}, "", targetUrl); // Change the URL without a full page reload

    change_content();
    $(this).closest(".submenu").children("a").addClass("active subdrop");
    return false; // Prevent any other click handlers from executing
  });

}





// function calling
change_content();

