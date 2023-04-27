<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <title>LARAVEL QUERIES PRACTICE</title>
</head>

<body>
@include('sweetalert::alert')


  {{-- <div id="success_message"></div> --}}

  <div class="alert alert-dismissible" role="alert" id="success_message">
    <strong class="strong">Holy guacamole!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="jumbotron">
    <h2 class="text-center">Student List</h2>
    <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Student</a>
  </div>

  @include('modal')
  @include('edit_modal')
  @include('delete_modal')

  <div class="container">

    <table class="table table-striped mt-5 table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>


      </tbody>
    </table>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>



  <script>
    $(document).ready(function(){
      fetch_students();


////////////////// FETCH STUDENTS START ////////////////////////

      function fetch_students(){
        $('tbody').html('')
        $.ajax({
            type: 'get',
            url : 'fetch_students',
            dataType:'json',
            success: function(response){
              $.each(response.studentsdata, function(key,item){
                $('tbody').append(' <tr>\
          <th>'+item.id+'</th>\
          <td>'+item.name+'</td>\
          <td>'+item.email+'</td>\
          <td>'+item.phone+'</td>\
          <td><button type="button" value="'+item.id+'" class="btn btn-sm mr-2 btn-primary edit_student">Edit Student</button></td>\
          <td><button type="button" value="'+item.id+'"class="btn btn-sm btn-danger delete_student">Delete Student</button></td>\
        </tr>')
              }
        )}
        })
      }

////////////////// FETCH STUDENTS END ////////////////////////

     


        
////////////////// EDIT STUDENTS START ////////////////////////
  
  
    $(document).on('click','.edit_student', function(e){

    e.preventDefault();
    var stud_id = $(this).val()
    // console.log(stud_id)
    $('#edit_modal').modal('show')

    $.ajax({
      url:'edit_student/' + stud_id,
      type: 'GET',
      success:function(response){
        
        if(response.status == 404){
          $('#success_message').html('')
          $('#success_message').addClass('alert alert-danger')
          $('#success_message').html(response.message)
        }else{
          $('#edit_name').val(response.student.name)
          $('#edit_email').val(response.student.email)
          $('#edit_phone').val(response.student.phone)
          $('#student_id').val(stud_id)
          
        }
        
      }
    })
  })


////////////////// EDIT STUDENTS END ////////////////////////

      $('#success_message').hide()
      

////////////////// ADD STUDENTS START ////////////////////////
    
      $(document).on('click','.add_student', function(event){
        event.preventDefault();
        
        $('#edit_name').val('')
        $('#edit_email').val('')
        $('#edit_phone').val('')

        // console.log('inserted');
        var data = {
          'name' : $('#name').val(),
          'email' : $('#email').val(),
          'phone' : $('#phone').val()
        }
        // console.log(data);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                  });

        $.ajax({
          type: "post",
          url: '/stu',
          data:data,
          dataType:"json",
          success: function(response){
            $('#errlist').html('')
            if(response.status == 400){
              $('#errlist').addClass("alert alert-danger") 
              $.each(response.errors, function(key, err_values){
                $('#errlist').append('<li>'+ err_values +'</li>')
              })
              
            }
            else{
              $('#success_message').addClass('alert alert-success col-md-10 offset-1 mt-1 alert-dismissible')
              $('#success_message').show()
              $('#success_message').delay(4000).fadeOut(400);
              $('.strong').text(response.message)
              $('#errlist').html('')
              $('#exampleModal').modal('hide')
              fetch_students();
               
            }
            // $('#exampleModal').modal('hide')
            
          },

         
        })
      
      })
////////////////// ADD STUDENTS END ////////////////////////

////////////////// UPDATE STUDENTS START ///////////////////////

$(document).on('click', '.update_student', function(e){
  e.preventDefault();
  $('#edit_errlist').hide()

  var stud_id = $('#student_id').val()
  var data = {
    'name' : $('#edit_name').val(),
    'email' : $('#edit_email').val(),
    'phone' : $('#edit_phone').val(),
  }

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
    url : 'update_student/' + stud_id,
    type: 'PUT',
    data : data,
    dataType: 'JSON',
    success: function(response){

      if(response.status == 400){
        $('#edit_errlist').show()

        $('#edit_errlist').addClass("alert alert-danger ") 
              $.each(response.errors, function(key, err_values){
                $('#edit_errlist').append('<li>'+ err_values +'</li>')
              })
      }
      else if(response.status == 404){
        $('#edit_errlist').hide()
        $('#edit_errlist').html('')
          $('#success_message').html('')
          $('#success_message').addClass('alert alert-danger col-md-10 offset-1 mt-1 alert-dismissible')
          
          $('#success_message').delay(4000).fadeOut(400);
          $('#success_message').html(response.message)
      }
      else{
        
        $('#edit_errlist').html('')
        $('#success_message').html('')
        $('#success_message').addClass('alert alert-success col-md-10 offset-1 mt-1 alert-dismissible')
        $('#success_message').text(response.message)
        $('#success_message').delay(4000).fadeOut(400)
        $('#success_message').show()

        $('#edit_modal').modal('hide')
        fetch_students();

      }
    }
  })
})


////////////////// UPDATE STUDENTS END ////////////////////////

///////////// DELETE STUDENT START //////////////

$(document).on('click','.delete_student',function(e){
    e.preventDefault()
    var id = $(this).val()
    // alert(id)
    $('#std_id').val(id)
    $('#delete_model').modal('show')
    // alert(id)

})

$(document).on('click', '.delete_student_btn', function(e){
    e.preventDefault();
    var id = $('#std_id').val()
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'DELETE',
        url:'delete_student/'+id,
        success:function(response){
            if(response.status == 200){
              $('#success_message').addClass('alert alert-danger col-md-10 offset-1 mt-1 alert-dismissible')
              $('#success_message').show()
              $('#success_message').delay(4000).fadeOut(400);
              $('#errlist').html('')
              $('#success_message').text(response.message)
              $('#delete_model').modal('hide')
              fetch_students();
              
             
            }
        }
    })

})

///////////// DELETE STUDENT END //////////////



    })
  </script>

<script src="{{asset('student_delete.js')}}"></script>

</body>

</html>