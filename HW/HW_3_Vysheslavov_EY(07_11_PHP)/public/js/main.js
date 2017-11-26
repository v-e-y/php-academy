// TODO delete dev comments and breakpoints
(function($) {
    'use strict';
    $(document).ready(function() {
        // console.log("ready");

        // Button for show or hide user password
        let buttonShowHidePassword = $('#showPasswordButton');
        // console.log(typeof buttonShowHidePassword);

        buttonShowHidePassword.on('click', function() {
            // Password input
            let passwordInput = $('#user-password');
            // Password input type. Default = password
            let passwordInputType = $('#user-password').attr('type');

            if (passwordInputType == 'password') {
                // Change password input type to text type
                passwordInput.attr('type', 'text');
                // Change button icon
                buttonShowHidePassword.html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
            } else {
                // Change password input type to password type
                passwordInput.attr('type', 'password');
                // Change button icon
                buttonShowHidePassword.html('<i class="fa fa-eye" aria-hidden="true"></i>');
            }
        })
    });
})(jQuery);