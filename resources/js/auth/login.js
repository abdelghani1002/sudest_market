$(function() {
    $(document).on("submit", "#login-form", function() {
        var e = this;
        $(this).find("[type='submit']").html("Login...");
        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $(e).find("[type='submit']").html("Login");
                if (data.status) {
                    window.location = data.redirect;
                } else {
                    $(".alert").remove();
                    $.each(data.errors, function(key, val) {
                        $("#errors-list").append(
                            "<div class='alert p-1 text-red-400 text-center'>" + val +
                            "</div>");
                    });
                }
            }
        });
        return false;
    });
});
