<?php

class process{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'md_asif';
    private $con;
    
    //database connection
    function __construct()
    {
        $this->con = new mysqli($this->host,$this->user,$this->password,$this->db_name);

        if($this->con->connect_error){
            echo 'connection failed';
        } else{
            return $this->con;
        }
    }

    // get data into table function
    public function getDataIntoTable($sql){
        $result = mysqli_query($this->con, $sql);
        $show = '';
        $show .= "<table class='table table-bordered table-striped text-white bg-color-1'>
                <thead class='bg-secondary fw-600 text-uppercase'>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>Buyer IP</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Entry_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

        while($data = $result->fetch_assoc()){
        $show .=   "<tr class='fw-bold'>
                        <td>".$data['id']."</td>
                        <td>".$data['amount']."</td>
                        <td>".$data['buyer']."</td>
                        <td>".$data['items']."</td>
                        <td>".$data['buyer_email']."</td>
                        <td>".$data['buyer_ip']."</td>
                        <td>".$data['note']."</td>
                        <td>".$data['city']."</td>
                        <td>".$data['phone']."</td>
                        <td>".$data['entry_at']."</td>
                        <td>
                            <button class='btn btn-sm btn-info mb-1' onclick=editData({$data['id']})>Edit</button>
                            <button class='btn btn-sm btn-danger' onclick=deleteData({$data['id']})>Delete</button>
                        </td>
                    </tr>";
        }
        $show .="</tbody>
                </table>";
        echo $show;
    }

    // data insert
    public function insertData(){
        $amount = $_POST['amount'];
        $buyer = $_POST['buyer'];
        $items= $_POST['items'];
        $buyer_email = $_POST['buyer_email'];
        $note = $_POST['note'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];

        // get ip address
        function getIPAddress() {  
            //whether ip is from the share internet  
             if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
             }  
        //whether ip is from the remote address  
            else{  
                     $ip = $_SERVER['REMOTE_ADDR'];  
             }  
             return $ip;  
        }  
        $ip = getIPAddress(); 

        
        if(empty($amount)){
            echo '<div class="alert alert-danger">Amount field is empty</div>'; 
        } 
        if(empty($buyer)){
            echo '<div class="alert alert-danger">Buyer field required</div>'; 
        } 
        if(empty($items)){
            echo '<div class="alert alert-danger">Items field required</div>'; 
        } 
        if(empty($buyer_email)){
            echo '<div class="alert alert-danger">Buyer Email field required</div>'; 
        } 
        if(empty($note)){
            echo '<div class="alert alert-danger">Note field required</div>'; 
        } 
        if(empty($city)){
            echo '<div class="alert alert-danger">City field required</div>'; 
        } 
        if(empty($phone)){
            echo '<div class="alert alert-danger">Phone field required</div>'; 
        }  
        if((!empty($amount)) && (!empty($buyer)) && (!empty($items)) && (!empty($buyer_email)) && (!empty($note)) && (!empty($city)) && (!empty($phone))){
            // amount validation for number only
            if (!is_numeric($amount)){
                echo '<div class="alert alert-danger">amount only number allowed</div>'; 
            } 
            // buyer validation for text, number, not more than 20 characters
            else if(!preg_match("/^[a-zA-Z\s0-9]{0,20}+$/", $buyer)){
                echo '<div class="alert alert-danger">buyer field only letter and number allowed</div>';
            }
             // items validation for text only
            else if(ctype_digit($items)){
                echo '<div class="alert alert-danger">items field only letters allowed</div>'; 
            }
            // buyer email validation
            else if (!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="alert alert-danger">Invalid Email Format</div>';
            }
            // note validation not more than 30 words and can be input unicode(bangla text) characters too.
            else if ((strlen($note) > 30)){
                echo '<div class="alert alert-danger">Invalid Note Format</div>';
            }
            // city validation for letter and spaces
            else if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
                echo '<div class="alert alert-danger">city field only letter and spaces allowed</div>'; 
            }
            // phone validation for numbers only
            else if (!is_numeric($phone)){
                echo '<div class="alert alert-danger">phone field only number allowed</div>'; 
            }
            else{
                $sql = "INSERT INTO user (amount, buyer, items, buyer_email, buyer_ip, note, city, phone, entry_at) VALUES ('$amount', '$buyer', '$items', '$buyer_email', '$ip', '$note', '$city', '$phone', NOW())";
                $result = mysqli_query($this->con, $sql);
    
                if($result){
                echo '<div class="alert alert-success bg-info">"Data Inserted". Reload the browser</div>';
                } else{
                echo '<div class="alert alert-success bg-danger">"Data Not Inserted"</div>';
                }
            }
        }
    }

    // Show all Student Data
    public function show(){
        $sql = "SELECT * FROM user";
        echo $this->getDataIntoTable($sql);
    }

    // edit specific data
    public function editData(){
        $id = $_POST['id'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($this->con, $sql);
        $show ="";
        while($data = $result->fetch_assoc()){
            $show = $data;
        }
        echo json_encode($show);
    }

    // update student
    public function updateData(){
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $buyer = $_POST['buyer'];
        $items = $_POST['items'];
        $buyer_email = $_POST['buyer_email'];
        $note = $_POST['note'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];

        $sql = "UPDATE user SET amount='$amount', buyer='$buyer', items='$items', buyer_email='$buyer_email', note='$note', city='$city', phone='$phone' WHERE id ='$id' ";
        $result = mysqli_query($this->con, $sql);
        if($result){
            echo '<div class="alert alert-success">Data Updated Successfully</div>';
        } else {
            echo '<div class="alert alert-danger">Data Not Updated</div>';

        }
    }

    // delete data
    // delete data
    public function delete(){
        $id = $_POST['id'];

        $sql = "DELETE FROM user WHERE id = '$id'";

        $result = mysqli_query($this->con, $sql);

        if($result){
            echo '<div class="alert alert-success">Successfully Deleted</div>';
        }
        else{
            echo '<div class="alert alert-success">Unsuccessful Delete</div>';

        }
    }
    
    // search Data
    public function searchData(){
        if($_POST["action"] == "Search"){
        $search = mysqli_real_escape_string($this->con, $_POST["queryId"]);
        $query = "
        SELECT * FROM user 
        WHERE id LIKE '%".$search."%' 
        ORDER BY id DESC
        ";
        echo $this->getDataIntoTable($query);             
        }
    }

}//class end


$obj = new process();

if(isset($_POST['checker'])){
    // data insert
    if($_POST['checker'] == 'insert'){
        $obj->insertData();
    }

    // Read Data
    if($_POST['checker'] == 'show'){
        $obj->show();
    }
    // edit data
    if($_POST['checker'] == 'editData'){
        $obj->editData();
    }
    // update student
    if($_POST['checker'] == 'updateData'){
        $obj->updateData();
    }
    // delete data
    if($_POST['checker'] == 'delete'){
        $obj->delete();
    }
    // Search Data
    if($_POST['checker'] == 'searchData'){
        $obj->searchData();
    }
}



?>
