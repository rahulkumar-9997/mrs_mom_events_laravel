$(document).ready(function() {
    $(".gallery-pills .nav-link").on("click", function(e) {
        e.preventDefault();
        var categoryId = $(this).data("id");
        var tabContent = $(".gallery_content");
        $.ajax({
            url: galleryCategoryUrl,
            type: "GET",
            data: { id: categoryId },
            beforeSend: function() {
                tabContent.html("<p>Loading...</p>");
            },
            success: function(response) {
                if (response.html) {
                    tabContent.html(response.html);
                } else {
                    tabContent.html("");
                }
            },
            error: function(xhr, status, error) {
                tabContent.html("<p>Error loading data.</p>");
            }
        });
    });

    $(".gallery-pills .nav-link.active").trigger("click");
});
