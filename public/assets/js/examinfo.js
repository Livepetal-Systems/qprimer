
const exam = document.getElementsByClassName('exam_id')[0].value



////////add subject function

// const loadSubjects = () => {
//     $.ajax({
//         url : '/control/fetchExamSubject/'+exam,
//         method : 'GET',
//     }).done( function (res) {

//     })
// }


// $('#add_subject_button').on('click', function () {
//     event.preventDefault(); alert = '#add_subject_alert';
//     subject = $('#add_subject_subject').val()
//     code = $('#add_subject_code').val()

//     if( subject == '' || code == ''){
//         report('All fields are required', alert, 1);
//     }else {
//         $.ajax({
//             url : '/control/addExamSubject',
//             method : 'POST',
//             data : {
//                 "_token": $('.csrf').val(),
//                 subject : subject,
//                 code : code,
//                 id : exam,
//             },
//             beforeSend: () => {
//                 $('#add_subject_button').html(`Processing...`)
//             }
//         }).done( function (res) { 
//             console.log(res);
//         })
//     }

// })
