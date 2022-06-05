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
        if(!($_POST['id'])||!($_POST['did'])||!($_POST['info']))
        { 
            // echo 'All the fields marked as * are compulsary.<br>';
            echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>ALL the fields are marked as * are compuslary </strong><br>'.mysqli_error($link).' .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            $validationFlag = false; 
        } 

        else{ 
            $id = $_POST['id'];  
            $info= $_POST['info']; 
            $price = $_POST['price']; 
            $did = $_POST['did'];
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
            $query = "INSERT INTO hotel (h_id,h_info,h_price,did) VALUES ('$id','$info','$price','$did')"; 
            //Execute query 
            $results = mysqli_query($link, $query); 
            
            //Check if query executes successfully 
            if($results == FALSE) {
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
                        <strong>Data Inserted sucessfully!!</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } 
            
        } 
    } 
    
    // Code to be executed when 'Update' is clicked. 
    if ($_POST['submit'] == 'Update'){ 
        if(!($_POST['id']))
        { 
            echo 'select id'; 
            $validationFlag = false; 
        } 
        
        else{ 
            $validationFlag = true;
            $id = $_POST['id']; 
            $info= $_POST['info'];  
            $price = $_POST['price']; 
            $did = $_POST['did'];
            
        
    
            //$update = "UPDATE account SET account_number='$account_number"; 

            if($_POST['info']){ 
            $update = "UPDATE hotel SET h_info= '$info' WHERE h_id='$id'"; 
            } 
            if($_POST['price']){ 
            $update = "UPDATE hotel SET h_price='$price' WHERE h_id='$id'";
            }
            if($_POST['did']){ 
            $update = "UPDATE hotel SET did='$did' WHERE h_id='$id'";
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
                if($results == FALSE) {
                    // echo mysqli_error($link) . '<br>'; 
                    echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>OOPs something went wrong!!</strong><br>'.mysqli_error($link).' .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
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
        echo 'Enter id as it is the primary key.'; 
        else{ 
            $id = $_POST['id'];  
            $info= $_POST['info']; 
            $price = $_POST['price']; 
            $did = $_POST['did'];
            

            $delete = "DELETE FROM hotel WHERE h_id='$id'";
            //Connect to mysql server 
            $link = mysqli_connect('localhost', 'root', '','trip'); 
            //Check link to the mysql server 
            if(!$link){ 
                die('Failed to connect to server: '); 
            } 
            //Execute query 
            $results = mysqli_query($link, $delete); 
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