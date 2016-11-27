<script>
    var testUsername = new RegExp(/^[a-zA-Z0-9 ]*$/);
    var testEmail = new RegExp(/([\w\-]+\@[\w\-]+\.[\w\-]+)/);
    var testName = new RegExp(/^[a-zA-Z ]*$/);
    var testAddress = new RegExp(/^\d+\s[A-z]+\s[A-z]+/);
    var testCity = new RegExp(/^[a-zA-Z]+([-.]?[a-zA-Z ]+|)$/);
    var testZip = new RegExp(/^\d{5}(?:[-\s]\d{4})?$/);
    var testCard = new RegExp(/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/);
    var testExp = new RegExp(/^(0[1-9]|1[0-2])\/[0-9]{2}$/);
    var testCVV = new RegExp(/^[0-9]{3,4}$/);
    $('#sign-up-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $(document).ready(function (e) {
        $('input#email').bind('input propertychange', function () {
            if (testEmail.test($(this).val())) {
                $('#2').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#2').text("Please use a valid email.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#username').bind('input propertychange', function () {
            if (testUsername.test($(this).val())) {
                $(this).css({'border': '1px solid green'});
                $('#1').text("");
            } else {
                $('#1').text("Only letters, numbers, and spaces allowed.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#name').bind('input propertychange', function () {
            if (testName.test($(this).val())) {
                $('#3').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#3').text("Only letters and whitespace allowed.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#address').bind('input propertychange', function () {
            if (testAddress.test($(this).val())) {
                $('#4').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#4').text("Please use a valid address.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#city').bind('input propertychange', function () {
            if (testCity.test($(this).val())) {
                $('#5').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#5').text("Please use a valid city.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#zip').bind('input propertychange', function () {
            if (testZip.test($(this).val())) {
                $('#6').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#6').text("Please use a valid zip code.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#cardnumber').bind('input propertychange', function () {
            if (testCard.test($(this).val())) {
                $('#cardErr').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#cardErr').text("Use a valid credit card number");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#expiration').bind('input propertychange', function () {
            if (testExp.test($(this).val())) {
                $('#expirationErr').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#expirationErr').text("Use a valid expiration date.");
                $(this).css({'border': '1px solid red'});
            }
        });
        $('input#cvv').bind('input propertychange', function () {
            if (testCVV.test($(this).val())) {
                $('#cvvErr').text("");
                $(this).css({'border': '1px solid green'});
            } else {
                $('#cvvErr').text("Use a valid CVV");
                $(this).css({'border': '1px solid red'});
            }
        });
    });

    $(function () {
        $('#check').click(function () {
            var b = true;
            if ($('#username').val() == "") {
                $('#1').text("Username is required.")
                b = false;
            } else {
                var username = $('#username').val();
                if (testUsername.test(username) == false) {
                    b = false;
                }
            }

            if ($('#email').val() == "") {
                $('#2').text("Email is required.")
                b = false;
            } else {
                var email = $('#email').val();
                if (testEmail.test(email) == false) {
                    b = false;
                }
            }

            if ($('#name').val() == "") {
                $('#3').text("Name is required.")
                b = false;
            } else {
                var name = $('#name').val();
                if (testName.test(name) == false) {
                    b = false;
                }
            }

            if ($('#address').val() == "") {
                $('#4').text("Address is required.");
                b = false;
            } else {
                var address = $('#address').val();
                if (testAddress.test(address) == false) {
                    b = false;
                }
            }

            if ($('#city').val() == "") {
                $('#5').text("City is required.")
                b = false;
            } else {
                var city = $('#city').val();
                if (testCity.test(city) == false) {
                    b = false;
                }
            }

            if ($('#zip').val() == "") {
                $('#6').text("Enter a zip code.")
                b = false;
            } else {
                var zipCode = $('#zip').val();
                if (testZip.test(zipCode) == false) {
                    b = false;
                }
            }
            if ($('#cardnumber').val() == "") {
                $('#cardErr').text("Credit card number is required.");
                b = false;
            } else {
                var cardNum = $('#cardnumber').val();
                if (testCard.test(cardNum) == false) {
                    b = false;
                }
            }
            if ($('#expiration').val() == "") {
                $('#expirationErr').text("Expiration date is required.");
                b = false;
            } else {
                var expirDate = $('#expiration').val();
                if (testExp.test(expirDate) == false) {
                    b = false;
                }
            }
            if ($('#cvv').val() == "") {
                $('#cvvErr').text("CVV is required.");
                b = false;
            } else {
                var cvvVal = $('#cvv').val();
                if (testCVV.test(cvvVal) == false) {
                    b = false;
                }
            }

            if (b) {
                $('#submit').click(); // submit form
            }
        });
    })
</script>