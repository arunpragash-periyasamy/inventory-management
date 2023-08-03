const change_content = () => {
    let url = $(location).attr("pathname");
    if(url != "/"){
        let path = url + ".php";
        let page = "#" + url.split("/")[2];
        $("*").removeClass("active");
        $(page).addClass("active");
        $.ajax({
            url: path,
            type: 'GET',
            success: function (data) {
                $(".page-wrapper").html(data);
            }
        });
    }
}

$("form-button").on("click", (e) => {
    
});

change_content();
