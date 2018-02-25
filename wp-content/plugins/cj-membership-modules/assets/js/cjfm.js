jQuery(document).ready(function($) {

    $('#cjfm-modalbox-login-form, #cjfm-modalbox-register-form, .cjfm-modalbox').fadeOut(0);

    // modalbox forms
    $(".cjfm-show-login-form").on('click', function() {
        var redirect = $(this).attr('data-redirect');
        if(redirect != undefined){
            $('.cjfm-login-form #redirect_url').val(redirect);
        }
        $('.cjfm-modalbox').fadeIn(250);
        $('#cjfm-modalbox-login-form').fadeIn(250);
        return false;
    });

    $(".cjfm-show-register-form").on('click', function() {
        $('.cjfm-modalbox').fadeIn(250);
        $('#cjfm-modalbox-register-form').fadeIn(250);
        return false;
    });

    $('.cjfm-close-modalbox').on('click', function() {
        $('.cjfm-modalbox').fadeOut(250);
        $('#cjfm-modalbox-login-form').fadeOut(250);
        $('#cjfm-modalbox-register-form').fadeOut(250);
        $('.cjfm-modalbox').removeClass('show');
        $('#cjfm-modalbox-login-form').removeClass('show');
        $('#cjfm-modalbox-register-form').removeClass('show');
        return false;
    });

    // Password Meter
    $('.cjfm-pw input[type="password"], .cjfm-cpw input[type="password"]').on('keyup', function() {

        // Must have capital letter, numbers and lowercase letters
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        // Must have either capitals and lowercase letters or lowercase and numbers
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");

        var weak = '<span class="weak">'+cjfm_locale.weak+'</span>';
        var medium = '<span class="medium">'+cjfm_locale.medium+'</span>';
        var strong = '<span class="strong">'+cjfm_locale.strong+'</span>';

        if($(this).val() === ''){
            $(this).closest('div.cjfm-pw').find('.cjfm-pw-strength').html('');
        } else if (strongRegex.test($(this).val())) {
            // If reg ex matches strong password
            $(this).closest('div.cjfm-pw').find('.cjfm-pw-strength').html(strong);
        } else if (mediumRegex.test($(this).val())) {
            // If medium password matches the reg ex
            $(this).closest('div.cjfm-pw').find('.cjfm-pw-strength').html(medium);
        } else {
            // If password is ok
            $(this).closest('div.cjfm-pw').find('.cjfm-pw-strength').html(weak);
        }
        return true;
    });

    // Confirm message
    $('.cj-confirm, .cjfm-confirm').click(function() {
        var msg = $(this).attr('data-confirm');
        var confmsg = confirm(msg);
        if (confmsg === true) {
            return true;
        } else {
            return false;
        }
    });

    $('.cjfm-alert').on('click', function(){
        var msg = $(this).attr('data-alert');
        alert(msg);
        return false;
    });


    // $ UI Date
    $(function() {
        $('.cjfm-date input[type="text"]').datepicker();
    });

});