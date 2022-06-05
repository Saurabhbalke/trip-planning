

<?php
//Start the session to see if the user is authenticated user. 
session_start();
//Check if the user is authenticated first. Or else redirect to login page 
if (isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1) {
    require('menu.php');
} else {
    header('location:login_form.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .heading {
            background-color: #5F9EA0;
            color: white;
        }
        .center{
            text-align: center;
        }
        .box{
            display:flex;
            justify-content: center;
            
        }
    </style>


</head>

<body>


    <!--  JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Destination  -->

    <h1 class="p-4 center">Edit Customer details</h1>
    <div class="container box p-4 shadow bg-white">
        
        <div class="insert  border  ">
            <article class="heading p-2">
                <h2>Update / Delete customer details</h2>
            </article>
            <div class="container my-2 ">

                <form action="edit_customer.php" method="post">
                    <div>
                        <label>
                            <h6>Customer gmail id</h6>
                        </label>
                        <br>
                        <!-- <input type="text" name="id" class="rounded border"> -->
                       
                        <?php
                          
                    /*Check link to the mysql server*/ 
                    $link = mysqli_connect('localhost', 'root', '', 'trip');
                    if(!$link)
                    { 
                    die('Failed to connect to server: ');
                    } 
                        echo
                        '<select class=" border p-1 col-4 rounded"  name="id" >
                        
                        <option value="" >Choose customer id</option>';
                        
                        $qry= "SELECT uid FROM customer";
                        $result = mysqli_query($link, $qry);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<option value=".$row['uid'].">".$row['uid']."</option>";
                            
                        };

                    echo '</select>';
                        ?>
                    </div>
                    <div>
                        <label>
                            <h6>Customer name</h6>
                        </label>
                        <br>
                        <input type="text" name="name" class="rounded border">
                    </div>
                    
                    <button type="submit" name="submit" value="Update" class="btn my-2" style="color: white; background: #5F9EA0;">
                        Update </button>
                    <button type="submit" name="submit" value="Delete" class="btn my-2" style="color: white; background: #5F9EA0;">
                        Delete </button>
                    </form>
            </div>

        </div>
    </div>


    </div>



</body>

</html>















