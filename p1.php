<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<?php
    $con = mysqli_connect('localhost', 'root', '', 'form_db');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $email = $_POST['email'];

        $ins = "INSERT INTO student (name, type, email) VALUES ('$name', '$type', '$email')";
        mysqli_query($con,$ins);
    }

    mysqli_close($con);
    ?>
    
    <center>
        <h1>----Form----</h1>
        <form method="POST" action="">
            <table border="2">
                <tr>
                    <td>Enter Name:</td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Enter Type:</td>
                    <td>
                        <input type="text" name="type" placeholder="Enter Type" required>
                    </td>
                </tr>
                <tr>
                    <td>Enter Email:</td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form><br>
        <!-- <label>Search:</label>
        <input type="text" name="search">
        <button name="s1">submit</button><button name="v1">view data</button><br><br> -->
        <form method="POST" action="">
            <label>Search : </label>
            <input type="text" name="search" placeholder="Enter Id to search">
            <button type="submit" name="s1">Search</button>
            <button type="submit" name="v1">View Data</button>
        </form>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Email</th>
            </tr>
            <!--search code-->
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'form_db');

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_POST['s1']))
            {
                $s=$_POST['search'];
                $sel="SELECT * from student where id=$s";
                $re=mysqli_query($con,$sel);

                if(mysqli_num_rows($re)>0)
                {
                    while($row=mysqli_fetch_array($re)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                    }
                }

            }
            
            if(isset($_POST['v1']))
            {
              
                $sel="SELECT * from student";
                $re=mysqli_query($con,$sel);

                if(mysqli_num_rows($re)>0)
                {
                    while($row=mysqli_fetch_array($re)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                    }
                }

            }
            mysqli_close($con);
            ?>
        </table>
    </center>
</body>
</html>
