<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX CRUD Operation in PHP</title>
    <!-- bootstrap 5 -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- custom css -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <div class="container-fluid mx-auto">
        <div class="row mt-5">
            <div id="msg" class="text-center text-capitalize fs-4 mx-auto"></div>
            <div class="col-md-4 text-center m-1 bg-one mx-auto">
                <h3>Student Info.</h3>
                <form action="process.php" method="POST" class="mt-5">
                    <div class="form-group mb-2">
                        <input type="text" id="myName" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" id="fName" class="form-control" placeholder="Enter Your Father Name">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" id="mName" class="form-control" placeholder="Enter Your Mother Name">
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" id="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" id="dist" class="form-control" placeholder="Your District">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" id="dept" class="form-control" placeholder="Your Department">
                    </div>
                    <div class="form-group">
                        <input type="submit" id="addStd" class="form-control mb-2" value="Add Student">
                    </div>
                    <div class="form-group">
                        <input type="submit" id="upStd" class="form-control mb-2" value="Update Student">
                    </div>
                    
                </form>
            </div>
            
            <div class="col-md-7 text-center m-1 bg-one mx-auto">
                <h3>Student List</h3>
                <div id="show" class="w-100"></div>
            </div>
        </div>
    </div>





    <!-- JavaScript Bundle with Popper -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./app.js"></script>

</body>
</html>