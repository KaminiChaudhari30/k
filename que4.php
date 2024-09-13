<?php
$con = mysqli_connect('localhost', 'root', '', 'child_db');
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_GET['Edit'])) {
    $id = $_GET['Edit'];
    $kmn = "SELECT * FROM class WHERE id=$id";
    $result = mysqli_query($con, $kmn);
    $row = mysqli_fetch_array($result);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $field = $_POST['field'];

    $id = $_GET['Edit'];
    $upd = "UPDATE class SET name='$name', date='$date', field='$field' WHERE id=$id";
    mysqli_query($con, $upd);
}
?>
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
            <h1>----Student Record----</h1>
            <table border="2">
                <tr>
                    <td>Enter Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php if(isset($_GET['Edit'])) echo $row['name']; ?>" placeholder="Enter Name:">
                    </td>
                </tr>
                <tr>
                    <td>Enter Date:</td>
                    <td>
                        <input type="date" name="date" value="<?php if(isset($_GET['Edit'])) echo $row['date']; ?>" placeholder="Enter Date:">
                    </td>
                </tr>
                <tr>
                    <td>Enter Field:</td>
                    <td>
                        <input type="text" name="field" value="<?php if(isset($_GET['Edit'])) echo $row['field']; ?>" placeholder="Enter Field:">
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
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="s1">Search</button>
            <button type="submit" name="v1">View Data</button>
            <button type="Del" name="delete">Delete</button>
            <button type="update" name="update">Update</button><br><br>

            <br><br>
            <table border="2">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Field</th>
                </tr>

                <?php
                if (isset($_POST['s1'])) {
                    $search = $_POST['search'];
                    $sel = "SELECT * FROM class WHERE id=$search";
                    $result = mysqli_query($con, $sel);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['field'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }

                if (isset($_POST['v1'])) {
                    $sel = "SELECT * FROM class";
                    $result = mysqli_query($con, $sel);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['field'] . "</td>";
                            echo "<td><a href='que4.php?Delete=" . $row['id'] . "'>Delete</a></td>";
                            echo "<td><a href='que4.php?Edit=" . $row['id'] . "'>Edit</a></td>";
                            echo "</tr>";
                        }
                    }
                }

                if (isset($_GET['Delete'])) {
                    $id = $_GET['Delete'];
                    $del = "DELETE FROM class WHERE id=$id";
                    mysqli_query($con, $del);
                }
                ?>
            </table>
        </form>
    </center>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $field = $_POST['field'];

    $ins = "INSERT INTO class (name, date, field) VALUES ('$name', '$date', '$field')";
    mysqli_query($con, $ins);
}
mysqli_close($con);
?>
