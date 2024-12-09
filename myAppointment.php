<?php 
@include('config.php');
    @include('user_header.php');
?>
<section id="appointments">
    <h2>Appointments</h2>
    <table>
        <thead>
             <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Email</th>
                <th>City</th>
                <th>Phone Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
              $dentists = mysqli_query($conn, "SELECT * FROM `appointment`");
              while ($row = mysqli_fetch_assoc($dentists)) {
                echo "
                            <tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['appoint_date']}</td>
                                <td>{$row['appoint_time']}</td>
                                <td>{$row['email_id']}</td>
                                <td>{$row['city']}</td>
                                <td>{$row['phone_number']}</td>
                                <td>{$row['status']}</td>
                                
                            </tr>
                        ";
              }
              ?>
        </tbody>
    </table>
</section>
<style>
    /* Style for the appointments section */
#appointments {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
}

/* Style for the table */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Style for table header (thead) */
thead {
    background-color: #007bff;
    color: #fff;
}

/* Style for table header cells (th) */
th {
    padding: 10px;
    text-align: left;
}

/* Style for table data cells (td) */
td {
    padding: 10px;
    border: 1px solid #ccc;
}

/* Style for alternating rows */
tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Style for table cells in the "Status" column */
td:nth-child(8) {
    font-weight: bold;
    color: green; /* You can change this color to represent different statuses */
}
    </style>