<?php
    include "conn.php";
    include "session.php";

    if (isset($_POST['add'])) {
        $idno = $_POST['idnumber'];
        $ln = $_POST['lname'];
        $fn = $_POST['fname'];
        $middle = $_POST['mi'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $sql = "INSERT INTO student_tbl(student_id, lastname, firstname, mi, age, course) 
        VALUES('$idno', '$ln', '$fn', '$middle', '$age', '$course')";

        if ($conn->query($sql) === TRUE) {
            echo "New student record was successfully saved.";
            header('location: index.php');
        } else {
            echo "Unable to save student record due to following error" . $conn->connect_error;
            header('location: add.php');
        }

        $sql->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Student</title>
</head>
<body>
    <form action="add.php" method="post">
    <table border="1" width="30%" cellspacing="0">
        <tr>
            <td align="center" colspan="2">New Record</td>
        </tr>
        <tr>
            <td>ID Number</td>
            <td><input type="text" name="idnumber"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname"></td>
        </tr>
        <tr>
            <td>Middle Initial</td>
            <td><input type="text" name="mi"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age"></td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
                <select name="course"> 
                    <option value="">Select Course</option>
                    <option value="BSET">BSET</option>
                    <option value="BSCPE">BSCPE</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="add" value="Save"> &nbsp;
                <input type="reset" name="reset" value="Clear">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
