<!DOCTYPE html>
<html>
<head>
    <title>staff User</title>
    <style>
        body {
            background-image: url('UI dash 2.jpg');
            background-size: cover;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            text-decoration: underline;
        }
        button {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h2>staff User</h2>

    <table>
        <tr>
            <th>Full Name</th>
            <th>birthdate</th>
            <th>Gender</th>
            <th>address</th>
            <th>Contact number</th>
            <th>email</th>
            <th>password</th>
            <th>confirmed password</th>
        </tr>

        <?php
        include("config.php");
        error_reporting(0);
        $query = "SELECT * FROM staff";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                        <td>" . $result['full name'] . "</td>
                        <td>" . $result['birthdate'] . "</td>
                        <td>" . $result['Gender'] . "</td>
                        <td>" . $result['address'] . "</td>
                        <td>" . $result['contact number'] . "</td>
                        <td>" . $result['email'] . "</td>
                        <td>" . $result['password'] . "</td>
                        <td>" . $result['confirm password'] . "</td>
                        <td>
                            <a href='update_appointment.php?id={$result['id']}'>Update</a> |
                            <a href='delete.php?id={$result['id']}'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No staff found.</td></tr>";
        }
        ?>
    </table>

    <button><a href="update_appointment.php">update Appointment</a></button>
    <button><a href="delete_appointment.php">delete_appointment</a></button>
</body>
</html>
