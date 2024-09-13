<?php
$con = mysqli_connect('localhost', 'root', '', 'online_db');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
   if (isset($_GET['Edit']))
   {
     $kmn="select * from bike where id=$_GET[Edit]";
     $result=mysqli_query($con,$kmn);
     $row=mysqli_fetch_array($result);
     
   }
   if (isset($_POST['update']))
   {
    $type = $_POST['type'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $model = $_POST['mdl_name'];

    $upd="update bike set type='$type' , date='$date' , name='$name' , model_name='$model' where id=$_GET[Edit]";
    $result=mysqli_query($con,$upd);
   }
?>
<!DOCTYPE html>
<table="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Management</title>
</head>
<body>
    <center>
        <form  method="POST" action="">
            <h1>----Online Bike Management System----</h1>
            <table border="2">
                <tr>
                    <td>Service Type:</td>
                    <td>
                        <input type="text" name="type" value="<?php if(isset($_GET['Edit'])) echo $row['type']?>" placeholder="Enter Type:">
                    </td>
                </tr>
                <tr>
                    <td>Service Date:</td>
                    <td>
                        <input type="date" name="date" value="<?php if(isset($_GET['Edit'])) echo $row['date']?>" placeholder="Enter date:">
                    </td>
                </tr>
                
                <tr>
                    <td>Customer Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php if(isset($_GET['Edit'])) echo $row['name']?>" placeholder="Enter Name:">
                    </td>
                </tr>
                <tr>
                    <td>Model Name:</td>
                    <td>
                        <input type="text" name="mdl_name" value="<?php if(isset($_GET['Edit'])) echo $row['model_name']?>" placeholder="Model Name:">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
     <br><br>
       
            <label>Search</label>
            <input type="number" name="search" placeholder="Search By Id:">
            <button type="submit" name="s1">search</button>
            <button type="submit" name="v1">View Data</button>
            <button name="Del">Delete</button>
            <button name="update">Update</button><br><br>
            
             
<br><br>
        <table border="2">
            <tr>  
                <th>Id</th>
                <th>Service Type</th>
                <th>Service Date</th>
                <th>Customer Name</th>
                <th>Model Name</th>
                
                
            </tr>
            <?php
              $con = mysqli_connect('localhost', 'root', '', 'online_db');

              if (!$con) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              if(isset($_POST['s1']))
              {
                $search = $_POST['search'];
                $sel = "select * from bike where id=$search";
                $result = mysqli_query($con, $sel);

                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['model_name']."</td>";
                        echo "</tr>";
                       
                        
                        

                    }
                }
              }
             

              
            ?>
            <?php
             $con = mysqli_connect('localhost', 'root', '', 'online_db');

             if (!$con) {
                 die("Connection failed: " . mysqli_connect_error());
             }

             if(isset($_POST['v1']) or isset($_POST['Del']))
             {
               
               $sel = "select * from bike ";
               $result = mysqli_query($con, $sel);

               if(mysqli_num_rows($result)>0)
               {
                   while($row = mysqli_fetch_array($result))
                   {
                       echo "<tr>";
                       echo "<td>".$row['id']."</td>";
                       echo "<td>".$row['type']."</td>";
                       echo "<td>".$row['date']."</td>";
                       echo "<td>".$row['name']."</td>";
                       echo "<td>".$row['model_name']."</td>";
                       echo "<td><a href='que2.php?Delete=".$row['id']."'>Delete</a></td>";
                       echo "<td><a href='que2.php?Edit=".$row['id']."'>Edit</a></td>";
                        echo "</tr>";
                       
                      
                       

                   }
               }
             } 
             if(isset($_GET['Delete']))
              {
               
                $del="delete from bike where id=$_GET[Delete]";
                mysqli_query($con,$del);

            

              }  

            ?>
    
    
            </form>
        </table>
    </center>
</body>
</html>

<?php
  $con=mysqli_connect('localhost','root','','online_db');
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
  if(isset($_POST['submit']))
  {
    $type = $_POST['type'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $model = $_POST['mdl_name'];

    $ins="insert into bike values('','$type','$date','$name','$model')";
    mysqli_query($con,$ins);
  }
    mysqli_close($con);
 
?>