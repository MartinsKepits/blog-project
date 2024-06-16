$(document).ready(function () {
    $('#login-form').validate({
        errorClass: "is-invalid",
        rules: {
            login_email: {
                required: true,
                email: true
            },
            login_password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            login_email: {
                required: "Email address is required.",
                email: "Please enter a valid email address.",
            },
            login_password: {
                required: "Password is required.",
                minlength: "Password must be at least 8 characters."
            }
        }
    });

    $('#register-form').validate({
        errorClass: "is-invalid",
        rules: {
            register_firstname: {
                required: true,
                maxlength: 255
            },
            register_lastname: {
                required: true,
                maxlength: 255
            },
            register_email: {
                required: true,
                email: true
            },
            register_password: {
                required: true,
                minlength: 8
            },
            register_confirm_password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            register_firstname: {
                required: "First name is required."
            },
            register_lastname: {
                required: "Last name is required."
            },
            register_email: {
                required: "Email address is required.",
                email: "Please enter a valid email address.",
            },
            register_password: {
                required: "Password is required.",
                minlength: "Password must be at least 8 characters."
            },
            register_confirm_password: {
                required: "Password confirmation is required.",
                minlength: "Password confirmation must be at least 8 characters."
            }
        }
    });

    $('#create-post-form').validate({
        errorClass: "is-invalid",
        rules: {
            title: {
                required: true,
                minlength: 8
            },
            description: {
                required: true,
                minlength: 50
            }
        },
        messages: {
            title: {
                required: "Post title is required.",
                minlength: "Post title must be at least 8 characters.",
            },
            description: {
                required: "Post description is required.",
                minlength: "Post description must be at least 50 characters."
            }
        }
    });
});
