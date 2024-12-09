<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>

    <div class="main-content">
        <div class="main">
            <section>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Type</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Password</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = mysqli_query($conn, "SELECT * FROM `user`");
                            while ($row = mysqli_fetch_assoc($users)) {
                                echo "
                            <tr>
                                <td>{$row['user_type']}</td>
                                <td>{$row['id']}</td>
                                <td>{$row['user_name']}</td>
                                <td>{$row['user_email']}</td>
                                <td>{$row['user_address']}</td>
                                <td>{$row['user_number']}</td>
                                <td>{$row['u_password']}</td>
                                <td><a href='delete.php?id={$row['id']}' class='btn'>Delete</a></td>
                            </tr>
                        ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <section>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Birthdate</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Doctor Speciality</th>
                                <th scope="col">Password</th>
                                <th scope="col">Confirm Password</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dentists = mysqli_query($conn, "SELECT * FROM `dentist`");
                            while ($row = mysqli_fetch_assoc($dentists)) {
                                echo "
                            <tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['birthdate']}</td>
                                <td>{$row['Gender']}</td>
                                <td>{$row['Address']}</td>
                                <td>{$row['contact_number']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['degree']}</td>
                                <td>{$row['doctor_speciality']}</td>
                                <td>{$row['password']}</td>
                                <td>{$row['confirm_password']}</td>
                                <td><a href='delete.php?id={$row['birthdate']}' class='btn'>Delete</a></td>
                            </tr>
                        ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <style>
        /* Style the section */
        section {
            margin: 20px;
        }

        /* Style the "Accounts" header */
        #accounts {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px;
        }
/* Table styles */
.container {
    margin: 20px auto;
    max-width: 1000px;
    padding: 20px;
    overflow: auto;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 10px;
    text-align: left;
}

/* Table header styles */
.table thead {
    background-color: navy;
    color: white;
}

.table th {
    position: sticky;
            top: 0;
    font-weight: bold;
    text-transform: uppercase;
}

/* Alternating row colors */
.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Delete button style */
.btn {
    padding: 5px 10px;
    background-color: navy;
    color: white;
    text-decoration: none;
    border-radius: 3px;
}

.btn:hover {
    background-color: #001f3f; /* Darker shade of navy on hover */
}

    </style>

    <footer>
        <button id="showRecordsButton">Show Records</button>
        <input type="search" id="searchInput" placeholder="Search">
    </footer>
</body>

</html>