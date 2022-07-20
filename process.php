<?php

include 'database.php';

$checker = $_POST['checker'];

$checker();

// if the checker variable has insert value, then the insert function will call or if it has update value then the update function will execute.
// $checker() same as insert() when the value is insert
// $checker() same as update() when the value is update.


// Insert Student Data to Mysql Database
function insert(){
    global $con;

    $name = $_POST['name'];
    $fatherName = $_POST['fName'];
    $motherName = $_POST['mName'];
    $email= $_POST['email'];
    $dist = $_POST['dist'];
    $dept = $_POST['dept'];

    if(empty($name)){
        echo '<div class="alert alert-danger">Name field required</div>'; 
    } 
    if(empty($fatherName)){
        echo '<div class="alert alert-danger">Father name field required</div>'; 
    } 
    if(empty($motherName)){
        echo '<div class="alert alert-danger">Mother name field required</div>'; 
    } 
    if(empty($email)){
        echo '<div class="alert alert-danger">Email required</div>'; 
    } 
    if(empty($dist)){
        echo '<div class="alert alert-danger">District required</div>'; 
    } 
    if(empty($dept)){
        echo '<div class="alert alert-danger">Department required</div>'; 
    } 
    else {
        $sql = "INSERT INTO student_list(name, fatherName, motherName, email, district, department) VALUES ('$name', '$fatherName', '$motherName', '$email', '$dist', '$dept')";
        $result = $con->query($sql);

        if($result){
            echo '<div class="alert alert-success bg-info">Data Inserted</div>';
        } else{
            echo '<div class="alert alert-success bg-danger">Data Not Inserted </div>';
        }
    }
}
// Show all Student Data
function show(){
    global $con;
    // sql command to select the all data from database
    $sql = "SELECT * FROM student_list";
    // query for execute the data, otherwise it will not work. here the $result stores the data as array
    $result = $con->query($sql);
    // here the $show string is empty for not repeat same data every click. because database sends all data every click.
    $show = '';

    // this is normal table format concatenate with show variable
    $show .= "<table class='table border text-white bg-success'>
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Email</th>
                    <th>District</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    $sl = 1;
    // $data stores the data as objects
    while($data = $result->fetch_assoc()){
    $show .=   "<tr>
                    <td>".$sl."</td>
                    <td>".$data['name']."</td>
                    <td>".$data['fatherName']."</td>
                    <td>".$data['motherName']."</td>
                    <td>".$data['email']."</td>
                    <td>".$data['district']."</td>
                    <td>".$data['department']."</td>
                    <td><button onclick='editData({$data['id']})' class='btn btn-sm btn-secondary' >Edit</button></td>
                    <td><button onclick='deleteData({$data['id']})' class='btn btn-sm btn-danger' >Delete</button></td>
                    
                </tr>";
        $sl++;
    }
    $show .="</tbody>
            </table>";

    echo $show;

}

// edit specific student data
function editData(){
    global $con;
    $id = $_POST['id'];
    // sql command to select the all data from database
    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    // query for execute the data, otherwise it will not work. here the $result stores the data as array
    $result = $con->query($sql);
    $show ="";
    while($data = $result->fetch_assoc()){
        $show = $data;
    }
    echo json_encode($show);
}

// Update all Student Data
function update(){
    global $con;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $fatherName = $_POST['fName'];
    $motherName = $_POST['mName'];
    $email= $_POST['email'];
    $dist = $_POST['dist'];
    $dept = $_POST['dept'];

    $sql = "UPDATE student_list SET name ='$name', fatherName = '$fatherName', motherName = '$motherName', email = '$email', district = '$dist', department = '$dept' WHERE id = '$id'";
    $result = $con->query($sql);

    if($result){
        echo '<div class="alert alert-success">student updated success</div>';
    } 
    else{
        echo '<div class="alert alert-danger">update not success</div>';
    }
}

// Delete Student data
function delete(){
    global$con;
    $id = $_POST['id'];

    $sql = "DELETE FROM student_list WHERE id = '$id'";

    $result = $con->query($sql);

    if($result){
        echo '<div class="alert alert-success">Successfully Deleted</div>';
    }
    else{
        echo '<div class="alert alert-success">Unsuccessful Delete</div>';

    }
}


?>
