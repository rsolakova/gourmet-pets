
$(document).ready(function () {
    $('.submit-contact-form').on('click', function () {
        var name = $('#name').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var subject = $('#subject').val();

        var data = {
            email: email,
            name: name,
            subject: subject,
            message: message
        };

        $.post('calculatorAPI/contact-form.php', data, function (data, status) {

        });
    });
});
