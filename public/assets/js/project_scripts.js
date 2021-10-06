// modules javascripts starts here
add_module_button = document.querySelector('#add_module_submit');
add_module_title = document.querySelector('#add_module_title');
add_module_des = document.querySelector('#add_module_des');

add_module_button.setAttribute('disabled', 'disabled')

add_module_title.addEventListener('keyup', (event) => {
    val = add_module_title.value;

    if(val.length < 4){
        add_module_title.className = "form-control is-invalid";
        add_module_button.setAttribute('disabled', 'disabled')
    }else{
        add_module_title.className = "form-control";
        add_module_button.removeAttribute('disabled')
    }
});

add_module_des.addEventListener('keyup', (event) => {
    val = add_module_des.value;

    if(val.length < 4){
        add_module_des.className = "form-control is-invalid";
        add_module_button.setAttribute('disabled', 'disabled')
    }else{
        add_module_des.className = "form-control";
        add_module_button.removeAttribute('disabled')
    }
});

$(function () {


    $('.addModules').on('click', function() {
        $('#addModules').modal('show'); 
   });


    $('body').on('click', '.deleteModule', function () {
        const delId = $(this).data('id');
        const delTitle = $(this).data('title');
        console.log(delId);
        $('#del_module_modal').modal('show');
        $('#del_module_title').html(delTitle);
        $('#del_module_id').val(delId);
    });


    $('body').on('click', '.editmodule', function () {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const des = $(this).data('des');
        console.log(des);
        $('#module_edit_modal').modal('show');
        $('#edit_module_title').val(title);
        $('#edit_module_id').val(id);
        $('#edit_module_des').val(des);
    })


});


//module js ends here


//topic js starts here  

$('.addTopics').on('click', function() {
    $('.add_topic_module_id').val($(this).data('module_id'));
    $('.add_topic_project_id').val($('#project_id').val());
    $('#addTopics').modal('show'); 
});



add_topic_button = document.querySelector('#add_topic_submit');
add_topic_title = document.querySelector('#add_topic_topic');

add_topic_button.setAttribute('disabled', 'disabled')

add_topic_title.addEventListener('keyup', (event) => {
    val = add_topic_title.value;

    if(val.length < 4){
        add_topic_title.className = "form-control is-invalid";
        add_topic_button.setAttribute('disabled', 'disabled')
    }else{
        add_topic_title.className = "form-control";
        add_topic_button.removeAttribute('disabled')
    }
});




$(function () {
    $('body').on('click', '#delete', function () {
        const delId = $(this).data('id');
        const delTitle = $(this).data('title');
        console.log(delId);
        $('#del_modal').modal('show');
        $('#deltitle').html(delTitle);
        $('#delId').val(delId);
    });


    $('body').on('click', '#edittopic', function () {
        const id = $(this).data('id');
        const title = $(this).data('title');
        console.log(title);
        $('#edit_modal').modal('show');
        $('#etitle').val(title);
        $('#eid').val(id);
    })


})

//topic ends here



// content scripts starts here

$('.addContents').on('click', function() {
    id = $(this).data('topic_id')
    $('#add_content_topic_id').val(id);
    $('.add_content_title').html('Add Content ('+$(this).data('topic')+')');
    console.log(id)
    $('#addContents').modal('show'); 
});



//faq starts here

$('.addFaq').on('click', function() {
    $('#addFaq').modal('show'); 
});


$('.editFaq').on('click', function() {
    $('#editFaq').modal('show'); 
    $('.edit_faq_question').val( $(this).data('question') );
    $('.edit_faq_answer').val( $(this).data('answer') );
    $('.edit_faq_id').val( $(this).data('id') );
});



//uescae scripts starts here    

$('.addUseCase').on('click', function() {
    $('#addUseCase').modal('show');
});


$('.editUseCase').on('click', function() {
    $('#editUseCase').modal('show'); 
    $('.edit_usecase_title').val( $(this).data('title') );
    $('.edit_usecase_description').val( $(this).data('description') );
    $('.edit_usecase_id').val( $(this).data('id') );
});
