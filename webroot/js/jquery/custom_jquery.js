$(document).ready(function () {
    $(".action-slider-top").click(function () {
        $("#actions-box-slider-top").slideToggle("fast");
        $(this).toggleClass("activated");
        return false;
    });
    $(".action-slider-bot").click(function () {
        $("#actions-box-slider-bot").slideToggle("fast");
        $(this).toggleClass("activated");
        return false;
    });
    $(".showhide-account").click(function () {
        $(".account-content").slideToggle("fast");
        $(this).toggleClass("active");
        return false;
    });
    $(".showhide-more").click(function () {
        $(".more-content").slideToggle("fast");
        $(this).toggleClass("active");
        return false;
    });
    $(".forgot-pwd").click(function () {
        $("#loginbox").hide();
        $("#forgotbox").show();
        return false;
    });
    $(".back-login").click(function () {
        $("#loginbox").show();
        $("#forgotbox").hide();
        return false;
    });
    $(".close-yellow").click(function () {
        $("#message-yellow").fadeOut("slow");
    });
    $(".close-red").click(function () {
        $("#message-red").fadeOut("slow");
    });
    $(".close-blue").click(function () {
        $("#message-blue").fadeOut("slow");
    });
    $(".close-green").click(function () {
        $("#message-green").fadeOut("slow");
    });

    $(".required").bind('focus', function(){
        $(this).removeClass('inp-form-error');
        $(this).next().remove();
    });

    $(document).ready(function(){
        $('#combo_page').live('click', function(){
            $('#combo_page_container').show();
            $('body').bind('click', close_page);
        });
    });
});

$(document).bind("click", function (e) {
    if (e.target.id != $(".showhide-account").attr("class")) $(".account-content").slideUp();
});

$(document).bind("click", function (e) {
    if (e.target.id != $(".action-slider").attr("class")) $("#actions-box-slider").slideUp();
});

$('#spanYear').html(new Date().getFullYear());

function close_page(){
    $('#combo_page_container').hide();
}

function send(){
    var ret = true;
    $(".required").each(function (e) {
        $(this).next(".error-div").remove();
        if($(this).val() == '' || $(this).val() == null){
            var id = $(this).attr('id');
            $(this).addClass('inp-form-error');
            $(this).after('<div class="error-div"><div class="error-left"></div><div class="error-inner">Campo Obrigatório.</div></div>');
            ret = false;
        }
    });

    if ($.trim($("#UserCpassword").val()) != "")
    {
        if ( $.trim($("#UserCpassword").val()) != $.trim($("#UserPassword").val()) )
        {
            $("#UserCpassword").siblings(".error-div").remove();
            $("#UserCpassword").removeClass("inp-form-error");
            $("#UserCpassword").addClass('inp-form-error');
            $("#UserCpassword").after('<div class="error-div"><div class="error-left"></div><div class="error-inner">Senhas não correspondem.</div></div>');
            ret = false;
        }
    }

    if ($.trim($(".users_admin_edit #UserPassword").val()) != "")
    {
        if ($.trim($(".users_admin_edit #UserCpassword").val()) == "")
        {
            $(".users_admin_edit #UserCpassword").siblings(".error-div").remove();
            $(".users_admin_edit #UserCpassword").removeClass("inp-form-error");
            $(".users_admin_edit #UserCpassword").addClass('inp-form-error');
            $(".users_admin_edit #UserCpassword").after('<div class="error-div"><div class="error-left"></div><div class="error-inner">Campo Obrigatório.</div></div>');
            ret = false;
        }
    }

    return ret;
}

function convert_to_slug(str){
    str = str.replace(/^\s+|\s+$/g,'');
    str = str.toLowerCase();

    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') .replace(/\s+/g, '-').replace(/-+/g, '-'); // collapse dashes
    return str;
}