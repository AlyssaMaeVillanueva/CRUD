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
    <title>Search Result</title>
</head>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <th>ID Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle</th>
            <th>Age</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    <?php
        if (isset($_GET['search'])) {
            $search_key = $_GET['query'];
            
            $sql = "SELECT * FROM student_tbl WHERE lastname LIKE '%$search_key%' 
            OR firstname LIKE '%$search_key%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    $idno = $row['student_id'];
                    $ln = $row['lastname'];
                    $fn = $row['firstname'];
                    $mi = $row['mi'];
                    $age = $row['age'];
                    $course = $row['course'];
    ?>
            <tr>
                <td><?php echo $idno; ?></td>
                <td><?php echo $ln; ?></td>
                <td><?php echo $fn; ?></td>
                <td><?php echo $mi; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $course; ?></td>
                <td colspan="2">
                    <a href="edit.php?idnum=<?php echo $idno; ?>">Edit</a>
                    |
                    <a href="delete.php?idnum=<?php echo $idno; ?>">Delete</a>
                </td>
            </tr>
    <?php
                }
            } else {
    ?>
            <tr>
                <td colspan="7">No record(s) found...</td>
            </tr>
    <?php
            }
        }

        $conn->close();
    ?>
    </table>
</body>
</html>
