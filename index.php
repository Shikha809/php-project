<?php include 'db.php';
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

        // Google secret API {

    $secretAPIkey = "6Le2X-YcAAAAAD6W1HJdf9mr4U3XkrUL_tnCwCH0";

    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretAPIkey . '&response=' . $_POST['g-recaptcha-response']);
    $response = json_decode($verifyResponse);
    }
 ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>PHP-Machine Test</title>
</head>

<body>
    <div class="container  sliderContainer">
    <div class="sliderDiv" id="slide1" style="background: red"></div>
        <div class="sliderDiv" id="slide2" style="background: lawngreen"></div>
        <div class="sliderDiv" id="slide3" style="background: deepskyblue"></div>
        <div class="sliderDiv" id="slide4" style="background: purple"></div>
        <div class="card mt-5">
        <h1 class="text-dark">Machine Task</h1>
            <div class="card-body">
                <form method="post" id="userForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required="">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required="">
                            </div>
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required="">
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary" required="">
                            </div>
                            <div class="form-group mb-3">
                             <div class="g-recaptcha"  data-sitekey="6Le2X-YcAAAAAEguiND-WKcT0WnqyviNRkBAGJzp"></div>
                            </div>
                            <div class="float-right">
                                <button type="submit" value="submit" name='submit' class="btn btn-info">Sumbit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="result">
               </div> -->
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="table table-responsive table-invoice">
                    <div id="table-data">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('button').click(function(event) {
            event.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var designation = $('#designation').val();
            var salary = $('#salary').val();
            if (name != '' && email != '' && designation != '' && salary !== '') {
                $.ajax({
                type: "POST",
                url: "process.php",
                data: {
                    name: name,
                    email: email,
                    designation: designation,
                    salary: salary
                },

                success: function(data) {
                Swal.fire('Succesfully Data Added!')
                    $("#table-data").html(data);
                    $('#userForm')[0].reset();
                    // alert(data);
                     
                  
                }
            });
            } else {
                Swal.fire('Please Fill all Fields') 
        }   
        });
    });

     
    var slide = 1;

function slider(){
    $(".sliderDiv").fadeOut();
    $("#slide" + slide).fadeIn();
    slide = slide + 1;

    if(slide == 5){
        slide = 1;
    }
    setTimeout(function(){ slider(); }, 3000);
}
slider();

    
</script>