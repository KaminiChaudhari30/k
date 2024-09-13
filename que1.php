<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
</head>
<body>
    
    <center>
        <form method="POST" action="">
            <h1>Academic Institute</h1>
            <table border="2" bgcolor="pink">
                <tr>
                    <td>Student Id:</td>
                    <td>
                        <input type="number" name="id" placeholder="Student Id:">
                    </td>
                </tr>
                <tr>
                    <td>Student Name:</td>
                    <td>
                        <input type="text" name="name" placeholder="Student Name:">
                    </td>
                </tr>
                <tr>
                    <td>Student Course Id:</td>
                    <td>
                        <input type="number" name="course_id" placeholder="course id:">
                    </td>
                </tr>
                <tr>
                    <td>Contact No:</td>
                    <td>
                        <input type="number" name="number" placeholder="contact no:">
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <textarea cols="20" rows="5" name="address" width="100%"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form><br>
        <form method="POST" action="">
            <label>Search:</label>
            <input type="number" name="search" placeholder="Search by Student Id">
            <button type="submit" name="s1">Search</button>
            <button type="submit" name="v1">View Data</button>
            <button name="v1">Delete</button>
            
        </form>
        <table border="2"><br><br>
            <tr>
                <td>ID</td>
                <td>Student_Name</td>
                <td>Course_Id</td>
                <td>Contact_No</td>
                <td>Address</td>
            </tr>
            <?php
               $con = mysqli_connect('localhost', 'root', '', 'college_db');

               if (!$con) {
                   die("Connection failed: " . mysqli_connect_error());
               }
               if (isset($_POST['s1'])){
                $search = $_POST['search'];
                $sel="select * from guys where id=$search";
                $result = mysqli_query($con, $sel);

                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['stud_name']."</td>";
                        echo "<td>".$row['stud_course']."</td>";
                        echo "<td>".$row['stud_contact']."</td>";
                        echo "<td>".$row['stud_address']."</td>";

                        echo "</tr>";
                    }
                }
               } 
            ?>
            <?php
             $con = mysqli_connect('localhost', 'root', '', 'college_db');

             if (!$con) {
                 die("Connection failed: " . mysqli_connect_error());
             }
             if (isset($_POST['v1'])){
                $sel="select * from guys";
                $result = mysqli_query($con, $sel);

                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['stud_name']."</td>";
                        echo "<td>".$row['stud_course']."</td>";
                        echo "<td>".$row['stud_contact']."</td>";
                        echo "<td>".$row['stud_address']."</td>";
                       

                        echo "</tr>";
                    }
                }
              
             } 

            ?>
        </table>
    </center>
    
</body>
</html>

<?php
  $con=mysqli_connect('localhost','root','','college_db');
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course=$_POST['course_id'];
    $contact=$_POST['number'];
    $address=$_POST['address'];

    $ins="insert into guys values('$id','$name','$course','$contact','$address')";
    mysqli_query($con,$ins);
}
    mysqli_close($con);

