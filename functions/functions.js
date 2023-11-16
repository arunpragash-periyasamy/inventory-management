
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
  $('.datetimepicker').datetimepicker({
    format: 'MM/DD/YYYY', 
  });
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

// function for change the content of the page
const change_content = async () => {
  $("#global-loader").fadeIn("fast");
  $('.page_content').html("");
  $(".page-wrapper").empty();
  let url = $(location).attr("pathname"); // get the page from the url
  url = url.endsWith('/') ? url.slice(0, -1) : url;

  let search = $(location).attr("search").replace(/\?/g, '');
  if (url != "/" && url != "/dashboard") {
    let page = url.split("/")[2];
    let path = url+"/"+page;
    document.title = page.split("_").join(' ');
    if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
      $("*").removeClass("active");
      $(`#${page}`).addClass("active");
      // request to get the page content
      let contentPage = path+".html";
      let scriptPage = path+".script";
      let phpPage = path+".php";
      console.log(path + "  " + contentPage);
      await $.get(`/config/request_handling.php?file_name=${contentPage+"&"+search}`, (data)=> {
        // Replace the entire #content element with the loaded content
        $('.page_content').html(data);
      });
      await $.get(`/config/request_handling.php?file_name=${scriptPage}`, (data)=>{
        // Replace the entire #content element with the loaded content
        $('.script').html(data);
      });
      await $.get(`/config/request_handling.php?file_name=${phpPage}`, (data)=>{
        // Replace the entire #content element with the loaded content
        $('.php_content').html(data);
      })
      applyPlugins();
      methodsOnReady();

    } else {
      console.error("Page not found");
    }

  } else {
    $("*").removeClass("active");
    $("#dashboard").addClass("active");
    await $.get("/config/request_handling.php?file_name=/dashboard.php", function (data) {
      // Replace the entire #content element with the loaded content
      $('.page-wrapper').replaceWith(data);
    }).done(() => {
      renderApexChart();
    });
  }

  setTimeout(function () {
    $("#global-loader");
    setTimeout(function () {
      $("#global-loader").fadeOut("slow");
    }, 100);
  }, 500);
};


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
}

const methodsOnReady = () => {

  $("form").on("submit keypress", (event) => {
    if (event.type === "submit" || event.type === "keydown") {
      event.preventDefault(); // preventing automatic form subbmission
    }
  });

  $(".btn-submit").on("click", _.throttle(handleForm, 5000, { trailing: false }));
  applyPlugins();

}


const getOptions = async() =>{
  let options ="";
  let id = $("#id").val();
  await $.get(`/?option=''&id=${id}`, function (data) {
    options = data;
    console.log(options);
  });
  return JSON.parse(options);

}


// function calling
change_content();



// var queryString = $.param(requestData); //it contains the path and file type in get request
// console.log(queryString);