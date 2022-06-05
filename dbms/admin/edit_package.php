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
        if(!($_POST['id']) || !($_POST['name'])|| !($_POST['price']) )
        { 
            echo 'All the fields marked as * are compulsary.<br>'; 
            $validationFlag = false; 
        } 

        else{ 
            $id = $_POST['id'];  
            $price = $_POST['price']; 
            $content = $_POST['content'];
            $img = $_POST['img'];
            $name= $_POST['name']; 
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
            $query = "INSERT INTO package (pkg_id , pkg_price , contents , pkg_link , pkg_name) VALUES ('$id','$price','$content','$img','$name')"; 
            // $query = "INSERT INTO hotel (h_id,h_info,h_price,did) VALUES ('$id','$info','$price','$did')"; 
            //Execute query 
            $results = mysqli_query($link, $query); 
            
            //Check if query executes successfully 
            if($results == FALSE) {
                echo 
                        '<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
                        <strong>Try again!!</strong>'.mysqli_error($link) .' .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            
            else{
                echo 
                        '<div class="alert alert-success alert-dismissible fixed-top fade show" role="alert">
                        <strong>Data Inserted sucessfully!!</strong> .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
           
        } 
        else
        echo'false';
    } 
    
    // Code to be executed when 'Update' is clicked. 
    if ($_POST['submit'] == 'Update'){ 
        if(!$_POST['id']) 
            echo 'Enter id  as it is the primary key.'; 
        else{ 
            $validationFlag = true;

            $id = $_POST['id']; 
            $name= $_POST['name']; 
            $price = $_POST['price']; 
            $content = $_POST['content'];
            $img = $_POST['link'];
            
            //$update = "UPDATE account SET account_number='$account_number"; 

            if($_POST['name']){ 
                $update = "UPDATE package SET pkg_name= '$name' WHERE pkg_id='$id'"; 
            } 
            if($_POST['price']){ 
                $update = "UPDATE package SET pkg_price='$price' WHERE pkg_id='$id'";
            }
            if($_POST['content']){ 
                $update = "UPDATE package SET contents='$content' WHERE pkg_id='$id'";
            }
            if($_POST['link']){ 
                $update = "UPDATE package SET pkg_link='$img' WHERE pkg_id='$id'";
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
                else{
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
            $price = $_POST['price']; 
            $content = $_POST['content'];
            $link = $_POST['link'];

            $delete = "DELETE FROM package WHERE pkg_id='$id'";
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
