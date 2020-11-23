
// $("#lecture_date").change(function(){        
//     console.log('Hello World');
//     $.post('/assignedLectures', function(response){

//         if ( response.success ) {
//             var instructor_name = $('#instructor_name').empty();
//             $.each(response.instructorsNotAssigned, function(i, instructor){
//                 $('<option/>', {
//                     value:instructor.id,
//                     text:instructor.instructor_name
//                 }).appendTo(instructor_name);
//             })
//         }

//     }, 'json');

// });


// CREATE
// $("#check-instructor").click(function (e) {

//     alert('Hello');

// });


$("#lecture_date").change(function(){        
    console.log('Hello World');

    var lecture_date = $('#lecture_date').val();
    console.log(lecture_date);

    $.ajax({
        type:'POST',
        url:'/get-instructor',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{            
            lecture_date : lecture_date
        },
        success: function( response ) {

            if ( response.success ) {
                var instructor_id = $('#instructor_id').empty();
                $.each(response.instructorsNotAssigned, function(i, instructor){
                    $('<option/>', {
                        value:instructor.id,
                        text:instructor.instructor_name
                    }).appendTo(instructor_id);
                })
            }
        }
    });
   
});