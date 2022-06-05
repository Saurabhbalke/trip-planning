<?php
    // code to be executed when when insert is clicked.
if($_POST['submit']=='insert'){
    $id = $_POST['name']; 
    $pass=$_POST['password'];
    $name= $_POST['cname']; 
    $cid = '202';

    $link = mysqli_connect('localhost', 'root', '','trip'); 
    //Check link to the mysql server 
    if(!$link){ 
    die('Failed to connect to server: '); 
    }
    $qry="INSERT INTO customer (name, uid, upass,cid ) VALUES ('$name','$id','$pass','$cid')";
    //Execute query 
    $results = mysqli_query($link, $qry); 
    if($results == FALSE) 
    echo mysqli_error($link) . '<br>'; 
    else 
    echo mysqli_info($link); 

}
include('login_cus.php');
echo '
<div class="alert alert-info alert-dismissible fixed-top fade show" role="alert">
  <strong>Successful!</strong> You can login now with your Id.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
?>