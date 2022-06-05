<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
$r=$_GET['r'];
$q = $_GET['q'];

$con = mysqli_connect('localhost', 'root', '', 'trip'); 
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"trip");


$qry = "SELECT p_id ,p_name,p_timea,p_timeb,p_price FROM plane,des_loc,curr_loc WHERE curr_loc.c_city='$r' AND des_loc.d_city='$q' AND des_loc.d_id=plane.did AND curr_loc.c_id=plane.cid;";
  
 
 /*Execute query*/ 
 $result = mysqli_query($con, $qry);
 
 echo "<h3>The Flight from '$r' to '$q' Details are - </h3>";
 
  
 
 
 /*Draw the table for Players*/
 echo '<div class="container">'; 
 echo '<table class="table table-striped table-bordered">
       <thead>
         <tr>
           
           <th scope="col">Flight number</th></th>
           <th scope="col">Flight name</th>
           <th scope="col">Charges</th>
           <th scope="col">Time of departure</th>
           <th scope="col">Time of arival</th>
           <th scope="col"><i class="fas fa-cart-plus"></i></th>
         </tr>
       </thead>
       <tbody>';
 
       
         
         $result = mysqli_query($con, $qry);
 /*Show the rows in the fetched result set one by one*/ 
         while($row = mysqli_fetch_assoc($result))
         {
             echo "<tr>
           <th scope='row'>". $row['p_id']. "</th>
           <td>". $row['p_name'] ."</td>
           <td>" . $row['p_price'] . "</td>
           <td>" . $row['p_timea'] . "</td>
           <td>" . $row['p_timeb'] . "</td>
           <td><button type='button' class='btn btn-success' onclick='sum(".$row['p_price'].")' >".$row['p_price']."</button></td>
           
         </tr>";
            
         }
 
      echo '</tbody>
     </table>';






mysqli_close($con);
?>
</body>
</html>