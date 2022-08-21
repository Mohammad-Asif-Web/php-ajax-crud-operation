<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP form submission script with frontend validation</title>
    <!-- bootstrap 5 -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- custom css -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="msg" class="text-center text-capitalize fs-4 mx-auto"></div>
    <h1 class="text-center text-white fw-bold">Simple PHP form submission script with validation </h1>
    <p class="text-center">
        <img class="text-center m-auto" src="https://inside.xpeedstudio.com/wp-content/uploads/2019/10/logo_v2-185x48.png" alt="xpeedstudio">
    </p>
    <div class="container mx-auto main-section">
        <div class="col-md-8 text-center mx-auto my-5">
            <form action="process.php" method="POST" class="mt-5" id="mainForm">
                <div class="form-group mb-2">
                    <input type="text" id="amount" class="form-control" placeholder="Amount" title="amount only number allowed">
                </div>
                <div class="form-group mb-2">
                    <input type="text" id="buyer" class="form-control" placeholder="Buyer" title="buyer only letter and number allowed">
                </div>
                <div class="form-group mb-2">
                    <input type="text" id="items" class="form-control" placeholder="Items" title="item only letter allowed">
                </div>
                <div class="form-group mb-2">
                    <input type="email" id="buyer_email" class="form-control" placeholder="Buyer Email">
                </div>
                <div class="form-group mb-2">
                    <input type="text" id="note" class="form-control" placeholder="Note" title="not more than 30 characters">
                </div>
                <div class="form-group mb-2">
                    <input type="text" id="city" class="form-control" placeholder="City" title="city only letter and space allowed">
                </div>
                <div class="form-group mb-2">
                    <input type="text" id="phone" class="form-control" placeholder="Phone" title="phone only number allowed">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" id="upStd" class="form-control mb-2" value="Update Buyer">
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" id="addStd" class="form-control mb-2" value="Add Buyer">
                </div>
            </form>
        </div>

        <hr style="margin-top: 10px;height:3px;border-width:0;color: #fff;background-color:#fff;opacity: 1" >

        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-md-6 ps-0">
                    <h3 class="text-white fs-1">Display Buyer Entries</h3>
                </div>
                <div class="col-md-3 pe-0">
                    <input type="text" name="search" id="search" placeholder="Search entries" class="form-control" /><br>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center my-2 mx-auto">
            <div id="show" class="w-100"></div>
        </div>
    </div>

    <!-- footer section -->
    <footer class="container-fluid p-2">
        <div class="container text-center">
            <span>Copyright &#169; 2022</span>
            <span class="mb-0 ">Made With 💙 <a href="https://muhammadasif10.blogspot.com/">Muhammad Asif</a></span>
            <span><a href="https://www.linkedin.com/in/mohammadasif10/">linkedIn</a></span>
            <span><a href="https://github.com/Mohammad-Asif-Web">Github</a></span>
        </div>
    </footer>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="./app.js"></script>

</body>
</html>