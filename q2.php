<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <center>
        <form method="POST" action="display.php">
            <h1>----Registartion Form----</h1>
            <table border="2">
                <tr>
                    <td>Enter Name:</td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name:">
                    </td>
                </tr>
               
                <tr>
                    <td>Enter Mobile_No:</td>
                    <td>
                        <input type="number" name="mobile" placeholder="Enter mobile:">
                    </td>
                </tr>
                <tr>
                    <td>Enter email:</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter email:">
                    </td>
                </tr>
                <tr>
                    <td>Enter DOB:</td>
                    <td>
                        <input type="date" name="dob" placeholder="Enter DOB:">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>