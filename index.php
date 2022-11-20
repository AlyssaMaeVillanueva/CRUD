<?php
    include "conn.php";
    include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
</head>
<body>
    <a href="add.php">New Student</a> &nbsp;
    <a href="logout.php">Logout</a>

    
    <form action="search-result.php" method="get">
        <table >
            <tr>
                <td>Search:</td>
                <td><input type="text" name="query" placeholder="Lastname or Firstname"></td>
                <td><input type="submit" value="Search" name="search"></td>
            </tr>    
        </table>
    </form>
    

    <table width="75%" border="1" cellspacing="0">
        <tr>
            <th>ID Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>MI</th>
            <th>Age</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM student_tbl";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
        ?>
                    <tr>
                        <td><?php echo $row['student_id'];  ?></td>
                        <td><?php echo $row['lastname'];  ?></td>
                        <td><?php echo $row['firstname'];  ?></td>
                        <td><?php echo $row['mi'];  ?></td>
                        <td><?php echo $row['age'];  ?></td>
                        <td><?php echo $row['course'];  ?></td>
                        <td>
                            <a href="edit.php?idnum=<?php echo $row['student_id']; ?>">Edit</a>
                        | 
                            <a href="delete.php?idnum=<?php echo $row['student_id']; ?>">Delete</a>
                        </td>
                    </tr>
        <?php
                } //end of while
            } else {
        ?>
                    <tr>
                        <td colspan="7">No record to show...</td>
                    </tr>
        <?php
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
