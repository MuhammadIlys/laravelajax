<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>


  </head>
  <body>


<div class="row">
    <div class="col-md-12 jumbotron">
        <p id="para">Hello to ajax</p>
        <button class="btn btn-success" id="mybtn">Click me</button>
    </div>
</div>



<script>


        // alert('helo');

        $(document).ready(function(){
            $('#mybtn').click(function(){
                alert('helo');
                $('#para').load();
            })

        });
        



    // function ajaxCall(){
    //     // alert('helo');
    //     var req = new XMLHttpRequest();
    //     req.open('GET','/ajaXCall',true);
    //     req.send();

    //     req.onreadystatechange = function(){
    //         if(req.readyState == 4 && req.status == 200){
    //             console.log(req.responseText)
    //         }
    //     }
    // }
</script>




      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>