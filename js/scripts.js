$(document).ready(function () {
    $('.submit').on('click', function () {
        var $email = $('.email').val();
        var $name = $('.name').val();
        var $dog_name = $('.dog-name').val();
        var $years = $('.years').val();
        var $weight = $('.weight').val();
        var $neutered = $('input[name=neutered]:checked').val();
        var $breed = $('.breed').val();
        var $body = $('input[name=bodyindex]:checked').val();
        var $allergies = $('.allergies').val();
        var $activity = $('input[name=activity]:checked').val();

        localStorage.email = $email;
        localStorage.name = $name;
        localStorage.dog_name = $dog_name;
        localStorage.years = $years;
        localStorage.weight = $weight;
        localStorage.neutered = $neutered;
        localStorage.breed = $breed;
        localStorage.body = $body;
        localStorage.allergies = $allergies;
        localStorage.activity = $activity;
    });

    $('.continue').on('click', function () {
        if (localStorage.email == $('.email').val()) {
            $('.name').val(localStorage.name);
            $('.dog-name').val(localStorage.dog_name);
            $('.years').val(localStorage.years);
            $('.weight').val(localStorage.weight);

            $('.firstname').val(localStorage.firstname);
            $('.surname').val(localStorage.surname);
            $('.phone').val(localStorage.phone);
            $('.more-info').val(localStorage.moreInfo);
            $('.city').val(localStorage.city);
            $('.neighbourhood').val(localStorage.neighbourhood);
            $('.street').val(localStorage.street);
            $('.others').val(localStorage.others);

            // if (localStorage.neutered == 'on') {
            //     $('.neutered').prop('checked', true);
            // }

            $('.breed').val(localStorage.breed);
            $('.allergies').val(localStorage.allergies);

            $('input[name=activity][value=' + localStorage.activity + ']').prop('checked', true);
            $('input[name=bodyindex][value=' + localStorage.body + ']').prop('checked', true);
            $('input[name=neutered][value=' + localStorage.neutered + ']').prop('checked', true);
        }
    });

    $('.meat').on('click', function () {
        var $email = $('.email').val();
        var $name = $('.name').val();
        var $dog_name = $('.dog-name').val();
        var $years = $('.years').val();
        var $weight = $('.weight').val();
        var $neutered = $('input[name=neutered]:checked').val();
        var $breed = $('.breed').val();
        var $body = $('input[name=bodyindex]:checked').val();
        var $allergies = $('.allergies').val();
        var $activity = $('input[name=activity]:checked').val();
        var $meat = $('input[name=meat]:checked').val();

        var data = {
            email: $email,
            name: $name,
            dog_name: $dog_name,
            years: $years,
            weight: $weight,
            neutered: $neutered,
            breed: $breed,
            body: $body,
            allergies: $allergies,
            active: $activity,
            meat: $meat
        };

        $.post('calculatorAPI/api.php', data, function (data, status) {
            var response_obj = JSON.parse(data);

            var price1Day = (response_obj.price / 7).toFixed(2);
            var price7Day = response_obj.price;

            if (response_obj.price != response_obj.lowPrice) {
                price1Day = '<s>' + (response_obj.price / 7).toFixed(2) + '</s> ' + (response_obj.lowPrice / 7).toFixed(2);
                price7Day = '<s>' + response_obj.price + '</s> ' + response_obj.lowPrice;
            }

            $('.response_price').html(price1Day);
            $('.response_price_final').html(price7Day);
            $('.response_calories').text(Math.floor(response_obj.calories));
            $('.reponse_dog_name').text($dog_name);
            $('.continue-address-form').removeAttr('disabled');
        });
    });

    $('.complete-order').on('click', function () {
        var $firstname = $('.firstname').val();
        var $surname = $('.surname').val();
        var $phone = $('.phone').val();
        var $moreInfo = $('.more-info').val();
        var $city = $('.city').val();
        var $neighbourhood = $('.neighbourhood').val();
        var $street = $('.street').val();
        var $others = $('.others').val();

        localStorage.firstname = $firstname;
        localStorage.surname = $surname;
        localStorage.phone = $phone;
        localStorage.moreInfo = $moreInfo;
        localStorage.city = $city;
        localStorage.neighbourhood = $neighbourhood;
        localStorage.street = $street;
        localStorage.others = $others;

        var $email = $('.email').val();
        var $name = $('.name').val();
        var $dog_name = $('.dog-name').val();
        var $years = $('.years').val();
        var $weight = $('.weight').val();
        var $neutered = $('input[name=neutered]:checked').val();
        var $breed = $('.breed').val();
        var $body = $('input[name=bodyindex]:checked').val();
        var $allergies = $('.allergies').val();
        var $activity = $('input[name=activity]:checked').val();
        var $meat = $('input[name=meat]:checked').val();

        var data = {
            email: $email,
            name: $name,
            dog_name: $dog_name,
            years: $years,
            weight: $weight,
            neutered: $neutered,
            breed: $breed,
            body: $body,
            allergies: $allergies,
            active: $activity,
            meat: $meat,
            firstname: $firstname,
            surname: $surname,
            phone: $phone,
            moreInfo: $moreInfo,
            city: $city,
            neighbourhood: $neighbourhood,
            street: $street,
            others: $others,
            send_mails: true
        };

        $.post('calculatorAPI/api.php', data, function (data, status) {
            // alert(status);
            // alert(data);
            if (data == '') {
                // $('.information-food-bowl').removeClass('none');
                // $('.address-form').addClass('none');
                $('.animation-waiting').addClass('none');
                $('.information-food-bowl').removeClass('none');
            } else {
                alert('Грешка: \n' + data);
            }
        });
    });

    $('.continue').click(function() {
        $('.all-dogs-info').removeClass('none');
        $(this).hide();
    });

    $('.continue-recipes').click(function() {
        $('.all-dogs-info').addClass('none');
        $('.write-email').addClass('none');
        $('.recipes-choice').removeClass('none');
        $('.vivi-image').addClass('none');
        $('.check-meat').removeClass('none');
        $('.price-calories').removeClass('none');
        $('.description-email ').css({ 'padding-top': '0' });
        $('.email-welcome').css({ 'margin-top': '1em' });
        $('.back-button').removeClass('none');
        $('.continue-address-form').removeClass('none');
        $('html, body').animate({ scrollTop: 0 }, 'fast');

        $('.response_price').html('');
        $('.response_price_final').html('');
        $('.response_calories').text('');
        $('.continue-address-form').prop('disabled', true);
        $('input[name=meat]').prop('checked', false);
    });

    $('.continue-address-form').click(function() {
        $('.recipes-choice').addClass('none');
        $('.address-form').removeClass('none');
        $('.back-button').addClass('none');
        $('.continue-address-form').addClass('none');
        $('.price-calories').addClass('none');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });

    $('.back-button').on('click', function () {
        $('.recipes-choice').addClass('none');
        $('.all-dogs-info').removeClass('none');
        $('.write-email').removeClass('none');
        $('.vivi-image').removeClass('none');
        $('.price-calories').addClass('none');
        $('.back-button').addClass('none');
        $('.continue-address-form').addClass('none');
    });

    $('.back-to-recipes').on('click', function() {
        $('.address-form').addClass('none');
        $('.recipes-choice').removeClass('none');
        $('.continue-address-form').removeClass('none');
        $('.price-calories').removeClass('none');
        $('.back-button').removeClass('none');
    });

    // $('.make-order').click(function() {
    //     alert('daaa');
    //     window.location = 'orders.html';
    // });
    // $('.show-article').on('click', function() {

    // }

    $('.complete-order').on('click', function() {
        $('.address-form').addClass('none');
        $('.animation-waiting').removeClass('none');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
});

// api/api.php
