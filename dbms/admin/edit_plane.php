<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
    require('menu.php'); 
    // Code to be executed when 'Insert' is clicked. 
    if ($_POST['submit'] == 'Insert'){
        //validation flag to check that all validations are done 
        $validationFlag = true; 
        //Check all the required fields are filled 
        if(!($_POST['id'])||!($_POST['name'])||!($_POST['from'])||!($_POST['to']))
        { 
            // echo 'All the fields marked as * are compulsary.<br>';
            echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>All the fields marked as * are compulsory !!</strong><br> .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            $validationFlag = false; 
        } 

        else{ 
            $id = $_POST['id']; 
            $name= $_POST['name']; 
            $from = $_POST['from']; 
            $to = $_POST['to']; 
            $dep = $_POST['dep']; 
            $arr = $_POST['arr']; 
            $price = $_POST['price'];
        }


        //If all validations are correct, connect to MySQL and execute the query 
        if($validationFlag){ 
            //Connect to mysql server 
            $link = mysqli_connect('localhost', 'root', '', 'trip'); 
            //Check link to the mysql server 
            if(!$link){ 
                die('Failed to connect to server'); 
            } 
            //Create Insert query 
            $query = "INSERT INTO plane (p_id,p_name,p_price,p_timea,p_timeb,cid,did) VALUES ('$id','$name','$price','$dep','$arr','$from','$to')"; 
            //Execute query 
            $results = mysqli_query($link, $query); 
            
            //Check if query executes successfully 
            if($results == FALSE){
                echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>OOPs something went wrong!!</strong><br>'.mysqli_error($link).' .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            // echo mysqli_error($link) . '<br>'; 
            else{
                echo 
                        '<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
                        <strong>Data Inserted sucessfully!!</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                
            }
           
        } 
    } 
    
    // Code to be executed when 'Update' is clicked. 
    if ($_POST['submit'] == 'Update'){ 
        if(!$_POST['id']){

            
            
            echo '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                <strong>Try again!</strong> Enter the id as it is the primary key.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

        else{ 
            $validationFlag = true;

            $id = $_POST['id']; 
            $name= $_POST['name']; 
            $from = $_POST['from']; 
            $to = $_POST['to']; 
            $dep = $_POST['dep']; 
            $arr = $_POST['arr']; 
            $price = $_POST['price'];
            
            //$update = "UPDATE account SET account_number='$account_number"; 

            if($_POST['name']){ 
                $update = "UPDATE plane SET p_name= '$name' WHERE p_id='$id'"; 
            } 
            if($_POST['from']){ 
                $update = "UPDATE plane SET cid='$from' WHERE p_id='$id'";
            }
            if($_POST['to']){ 
                $update = "UPDATE plane SET did='$to' WHERE p_id='$id'";
            }
            if($_POST['dep']){ 
                $update = "UPDATE plane SET p_timea= '$arr' WHERE p_id='$id'"; 
            } 
            if($_POST['arr']){ 
                $update = "UPDATE plane SET p_timeb= '$dep' WHERE p_id='$id'"; 
            } 
            if($_POST['price']){ 
                $update = "UPDATE plane SET p_price= '$price' WHERE p_id='$id'"; 
            } 
            

            //If all validations are correct, connect to MySQL and execute the query 
            if($validationFlag){ 
                //Connect to mysql server 
                $link = mysqli_connect('localhost', 'root', '','trip'); 
                //Check link to the mysql server 
                if(!$link){ 
                    die('Failed to connect to server: '); 
                } 
                //Execute query 
                $results = mysqli_query($link, $update); 
                if($results == FALSE) 
                {
                    echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>OOPs something went wrong!!</strong><br>'.mysqli_error($link).' .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                // echo mysqli_error($link) . '<br>';
                else 
                {
                    echo 
                        '<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
                        <strong>Data Updated sucessfully!!</strong>'.mysqli_info($link).' .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                 
            } 
        } 
    } 
    // Code to be executed when 'Delete' is clicked. 
    if ($_POST['submit'] == 'Delete'){ 
        if(!$_POST['id']) 
        echo 'Enter the id as it is the primary key.'; 
        else{ 
            $id = $_POST['id']; 
            $name= $_POST['name']; 
            $from = $_POST['from']; 
            $to = $_POST['to']; 
            $dep = $_POST['dep']; 
            $arr = $_POST['arr']; 
            $price = $_POST['price'];

            $delete = "DELETE FROM plane WHERE p_id='$id'";
            //Connect to mysql server 
            $link = mysqli_connect('localhost', 'root', '','trip'); 
            //Check link to the mysql server 
            if(!$link){ 
                die('Failed to connect to server: '); 
            } 
            //Execute query 
            $results = mysqli_query($link, $delete); 
            if($results == FALSE)
            {
                echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>OOPs something went wrong!!</strong><br>'.mysqli_error($link).' .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            // echo mysqli_error($link) . '<br>'; 
            else
            {
                echo 
                        '<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
                        <strong>Data Deleted sucessfully!!</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                
            } 
            
        } 
    } 
} 
else{ 
    header('location:login_form.php'); 
    exit(); 
} 
?>
