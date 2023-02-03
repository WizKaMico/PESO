$(function () {
        $("#switch-id").change(function () {
            if ($(this).is(":checked")) {
                $(".contentB").show();
                $(".contentA").hide();
            } else {
                $(".contentB").hide();
                $(".contentA").show();
            }
        });
    });