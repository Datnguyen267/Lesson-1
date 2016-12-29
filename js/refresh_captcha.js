/**
 *
 */
$(document).ready(function() {
    $("a.refresh").click(function() {
        var baseUrl = document.location.origin;
        jQuery.ajax({
            type: "POST",
            url: baseUrl + "/guest/registration/refreshCaptcha",
//            url: baseUrl + "/welcome/refresh",
            success: function(res) {
                if (res)
                {
                    jQuery("td.captcha").html(res);
//                    jQuery("div.image").html(res);
                }
            }
        });
    });
});