<?php 
@include('config.php');
@include('user_header.php');
    session_start();
    if(isset($_SESSION['userid'])){
        $user_id=$_SESSION['userid'];
    }
?>
<section id="services">
    <h2>services</h2>
    <table>
        <thead>
            <tr>
                <th>full name</th>
                <th>timing</th>
                <th>service date</th>
                <th>address</th>
                <th>city</th>
                <th>pincode</th>
                <th>price</th>
                <th>payment method</th>
            </tr>
        </thead>
        <tbody>
        <?php
              $services = mysqli_query($conn, "SELECT * FROM `services` WHERE user_id=$user_id");
              while ($row = mysqli_fetch_assoc($services)) {
                echo "
                            <tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['timing']}</td>
                                <td>{$row['service_date']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['city']}</td>
                                <td>{$row['pincode']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['payment_method']}</td>
                            </tr>
                        ";
              }
              ?>
        </tbody>
    </table>
</section>
<style>
    /* Style for the appointments section */
#services {
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

    </style>