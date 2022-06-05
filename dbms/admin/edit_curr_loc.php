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
            if(!($_POST['id'])||!($_POST['city'])){ 
                // echo 'All the fields marked as * are compulsary.<br>';
                echo 
                    '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                    <strong>All the fields marked as * are compulsory!!</strong><br> .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                $validationFlag = false; 
            } 

            else{ 
                $cid = $_POST['id']; 
                $ccity= $_POST['city']; 
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
                $query = "INSERT INTO curr_loc (c_id,c_city) VALUES ('$cid','$ccity')"; 
                //Execute query 
                $results = mysqli_query($link, $query); 
                
                //Check if query executes successfully 
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
                            <strong>Data Inserted sucessfully!!</strong>'.mysqli_info($link).' .
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>'; 
                }
            } 
        } 
        
        // Code to be executed when 'Update' is clicked. 
        if ($_POST['submit'] == 'Update'){ 
            if(!$_POST['id']) 
            echo 'Enter the id  as it is the primary key.'; 
            else{ 
                $validationFlag = true;

                $cid = $_POST['id']; 
                $ccity= $_POST['city'];
                
                //$update = "UPDATE account SET account_number='$account_number"; 

                if($_POST['city']){ 
                    $update = "UPDATE curr_loc SET c_city= '$ccity' WHERE c_id='$cid'"; 
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

                         
                        echo 
                        '<div class="alert alert-danger alert-dismissible fixed-top fade show" role="alert">
                        <strong>OOPs something went wrong!!</strong>'.mysqli_error($link).' .
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
            echo 'Enter the id as it is the primary key.'; 
            else{ 
                $cid = $_POST['id']; 
                $ccity= $_POST['city'];

                $delete = "DELETE FROM curr_loc WHERE c_id='$cid'";
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
                        <strong>Try again!!</strong>'.mysqli_error($link).' .
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'; 
                }
                else {
                    
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
