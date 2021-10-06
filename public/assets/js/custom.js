const link = document.getElementsByClassName('allLink')[0].value
const report = (message, selector, count = 0) => {
        bg = (count == 0) ? 'alert alert-success' : 'alert alert-danger';
        console.log($(selector));
        $(selector).attr('class', bg);
        $(selector).fadeIn();
        $(selector).html(message)
        setTimeout(function() {
            $(selector).fadeOut();
        }, 3000);
    }
    //validating email on key up
    // $('#login_email').on('keyup', function () {
    //     let email = $('#login_email').val();
    //     if(email == '' || email.length < 5){
    //         $('#login_email').attr('class', 'form-control is-invalid');
    //     }else{
    //         $('#login_email').attr('class', 'form-control');
    //         $.ajax({
    //             method: 'get',
    //             url: link+'?emailChecker='+email,

//         }).done( function (res) {
//             res = JSON.parse(res);
//             if(res.status == 5){
//                 $('#danger1').html('Invalid Email address');
//                 $('#login').attr('disabled', 'disabled');
//             }else{
//                 document.getElementById('danger1').innerHTML = '';
//                 $('#login').removeAttr('disabled');
//             }
//         })
//     }
// });