<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
</head>
<body>
    <center>
        <form method="POST" action="">
            <h1>---Place Order---</h1>
            <table border="2">
                <tr>
                    <td>Enter Item Name:</td>
                    <td><input type="text" name="name" placeholder="Item Name"></td>
                </tr>
                <tr>
                    <td>Enter Item Type:</td>
                    <td><input type="text" name="type" placeholder="Item Type"></td>
                </tr>
                <tr>
                    <td>Enter Item Quantity:</td>
                    <td><input type="number" name="quantity" placeholder="Item Quantity"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>

        </form>
    </center>
</body>
</html>

<?php

$con = mysqli_connect('localhost', 'root', '', 'assignment_db');



if(isset($_POST['submit']))
{
    $name=$_POST['name'];   
    $type=$_POST['type'];
    $quantity=$_POST['quantity'];

    $ins="insert into item values('','$name','$type','$quantity')";

    mysqli_query($con, $ins);
} 
  

?>
