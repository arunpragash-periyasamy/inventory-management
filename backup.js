// code for preventing the page reload and make the submenu active.
$("a.page_url").click(function(event) {
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