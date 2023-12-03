// code for preventing the page reload and make the submenu active.
$("a.pageUrl").click(function(event) {
    event.preventDefault(); // Prevent the default link behavior (page reload)

    // Get the target URL from the href attribute
    var targetUrl = $(this).attr("href");
    console.log("target " + targetUrl);
    // Change the URL without a full page reload
    window.history.pushState({}, "", targetUrl);

    // You can also update the page content here if needed
    // Optionally, trigger any other actions related to the link click
    change_content();
    $(this).closest(".submenu").children("a").addClass("active subdrop");
    return false; // Prevent any other click handlers from executing
});







// change content



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
    let url = $(location).attr("pathname"); // get the page from the url
    url = url.endsWith('/') ? url.slice(0, -1) : url;
    let search = $(location).attr("search").replace(/\?/g, '');
    if (url != "") {
      let page = url.split("/")[2];
      let path = url+"/"+page;
      document.title = page.split("_").join(' ');
      if ($(".main-wrapper").find(".header") && $(".main-wrapper").find(".sidebar")) {
        $("*").removeClass("active");
        $(`#${page}`).addClass("active");
        // request to get the page content
        let contentPage = path+".php";
        console.log("url "+ url)
        await $.get(`/config/request_handling.php?file_name=${url+".php&"+search}`, (data)=> {
          // Replace the entire #content element with the loaded content
          $('.page_content').html(data);
        });
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
        $('.page_content').replaceWith(data);
      }).done(() => {
        renderApexChart();
      });
    }
  };
  
  
  