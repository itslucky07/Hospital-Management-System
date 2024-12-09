<?php
include('config.php');
session_start();
$name = $_SESSION['adminname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/admin_header.css">
</head>

<body>
  <div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <h2><span><i onclick="closeNav()" class="fas fa-tooth" width="50px" alt="logo"></i></span>Dentist Clinic
      </h2>
    </div>
    <div class="sidebar-menu">
      <ul>
        <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <li><a href="#dentist1"><i class="fas fa-tooth"></i>Dentist</a></li>
        <li><a href="#accounts1"><i class="fas fa-user"></i>Patient</a></li> 
        <li><a href="#schedule1"><i class="fas fa-calendar"></i>Doctor Schedule</a></li>
        <li><a href="#appoint1"><i class="fas fa-calendar-check"></i>Appointment</a></li>
        <li><a href="#message1"><i class="fas fa-envelope"></i>Messages</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
      </ul>
    </div>
  </div>
  <div class="main-content" id="main-content">
    <header>
      <h2>
        <label for="" onclick="openNav()"><span class="fa-solid fa-bars"></span></label>
        Dashboard
      </h2>
      <div class="user-wrapper">
        <h4>
          <?php echo $name; ?>
        </h4>
        <small>Admin</small>
      </div>
    </header>
    <div class="card-container">
      <!-- First Row -->
      <div class="user-card">
        <i class="fas fa-users user-icon"></i>
        <h2>Total Users</h2>
        <?php
        $users = mysqli_query($conn, "SELECT * FROM user");
        $total_users = mysqli_num_rows($users);
        ?>
        <p>
          <?php echo $total_users; ?>
        </p>
      </div>
      <div class="user-card">
        <i class="fas fa-id-card user-icon"></i>
        <h2>Doctors</h2>
        <?php
        $dentist = mysqli_query($conn, "SELECT * FROM dentist");
        $total_dentist = mysqli_num_rows($dentist);
        ?>
        <p>
          <?php echo $total_dentist; ?>
        </p>
      </div>
      <div class="user-card">
        <i class="fas fa-envelope user-icon"></i>
        <h2>Messages</h2>
        <?php
        $msgs = mysqli_query($conn, "SELECT * FROM messages");
        $total_msgs = mysqli_num_rows($msgs);
        ?>
        <p>
          <?php echo $total_msgs; ?>
        </p>
      </div>

      <!-- Second Row -->
      <div class="user-card">
        <i class="fas fa-handshake user-icon"></i>
        <h2>Appointments</h2>
        <?php
        $appointments = mysqli_query($conn, "SELECT * FROM appointment");
        $total_appointments = mysqli_num_rows($appointments);
        ?>
        <p>
          <?php echo $total_appointments; ?>
        </p>
      </div>

      <div class="user-card">
        <i class="fas fa-id-card user-icon"></i>
        <h2>Schedules</h2>
        <?php
        $schedule = mysqli_query($conn, "SELECT * FROM schedule");
        $total_schedule = mysqli_num_rows($schedule);
        ?>
        <p>
          <?php echo $total_schedule; ?>
        </p>
      </div>
    </div>
    <div class="main">

    <!-- -------------------------Dentist-----------------------------------  -->
      <br></br><br></br><br id='dentist1'></br><br></br>
      <section>
        <div class="container">
        <div class="Add-Doc"><a href="dentist.php"><i class="fa-solid fa-plus"></i></a>Doctor</div>
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
                <th scope="col">Speciality</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
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
                                <td>
                                <div class='action_btn'>
                                <a href='delete.php?doc_id={$row['doc_id']}' class='btn'>&times</a>
                                <a href='update_doc.php?id={$row['doc_id']}' class='btn'><i class='fa-solid fa-pen fa-2xs'></i></a>                          </div>
                                </td>
                            </tr>
                        ";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
      <!-- -------------------------Dentist Ends-----------------------------------  -->


      <!-- -------------------------Patient-----------------------------------  -->
      <div class="space"></div>
      <br></br><br></br><br id='accounts1'></br><br></br>
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
        <br></br><br></br><br></br><br></br>
        <br></br><br></br><br></br><br></br>
        <br></br><br></br><br></br><br></br>
        <!-- -------------------------Patient ends-----------------------------------  -->



        <!-- -------------------------doctor scheduling-----------------------------------  -->
      <div class="space"></div>
      <br></br><br></br><br id='schedule1'></br><br></br>
      <section>
        <div class="container">
        <div class="Add-Doc"><a href="schedule.php"><i class="fa-solid fa-plus"></i></a>Schedule</div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Schedule Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Consulting Time</th>
                <th scope="col">Availability</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $schedule = mysqli_query($conn, "SELECT * FROM `schedule`");
              while ($row = mysqli_fetch_assoc($schedule)) {
                  echo "
                      <tr>
                          <td>{$row['Doctor_Name']}</td>
                          <td>{$row['d_date']}</td>
                          <td>{$row['d_start_time']}</td>
                          <td>{$row['d_end_time']}</td>
                          <td>{$row['d_consult_time']} min</td>
                          <td>{$row['availability']}</td>
                          <td>
                              <div class='action_btn'>
                                  <a href='delete.php?doc_id={$row['d_id']}&d_id={$row['d_id']}' class='btn'>&times;</a>
                                  <a href='update_schedule.php?id={$row['d_id']}&s_date={$row['d_date']}' class='btn'><i class='fa-solid fa-pen fa-2xs'></i></a>
                              </div>
                          </td>
                      </tr>
                  ";
              }
            ?>
            </tbody>
          </table>
        </div>
      </section>
      <br></br><br></br><br></br><br></br>
<!-- -------------------------doctor scheduling ends-----------------------------------  -->




        <!-- -------------------------Appointment-----------------------------------  -->
      <div class="space"></div>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br id='appoint1'></br><br></br>
      <section>
        <div class="container">
        <div class="Add-Doc"><a href="Appointment.php"><i class="fa-solid fa-plus"></i></a>Appointment</div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Appoint_date</th>
                <th scope="col">Appoint_time</th>
                <th scope="col">Status</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $appointments = mysqli_query($conn, "SELECT * FROM `appointment`");
              while ($row = mysqli_fetch_assoc($appointments)) { ?>
                <tr>
                  <td>
                    <?php echo $row['full_name'] ?>
                  </td>
                  <td>
                    <?php echo $row['phone_number'] ?>
                  </td>
                  <td>
                    <?php echo $row['email_id'] ?>
                  </td>
                  <td>
                    <?php echo $row['city'] ?>
                  </td>
                  <td>
                    <?php echo $row['appoint_date'] ?>
                  </td>
                  <td>
                    <?php echo $row['appoint_time'] ?>
                  </td>
                  <td class="<?php echo ($row['status'] == 'pending') ? 'pending' : 'delivered'; ?>"><?php echo $row['status'] ?></td>
                  <td>
                    <form action="update_status.php" method='post'>
                      <input type='hidden' name='appoint_id' value='<?php echo $row['appoint_id'] ?>'>
                      <select class="status" name='status' id='appoint_status'>
                        <option value='pending' <?php if ($row['status'] == 'pending') ?>>pending</option>
                        <option value='rejected' <?php if ($row['status'] == 'rejected') ?>>rejected</option>
                        <option value='accepted' <?php if ($row['status'] == 'accepted') ?>>accepted</option>
                      </select>
                      <input class="update_btn" type='submit' name='update_status' value='Update'>
                    </form>
                  </td>
                  <td><a href="delete.php?app_id=<?php echo $row['appoint_id'] ?>" class='btn'>Delete</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br></br><br></br>
<!-- -------------------------Appointment ends-----------------------------------  -->


<!-- -------------------------Message-----------------------------------  -->
<div class="space"></div>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br id='message1'></br><br></br>
     
      <section>
        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Meesage_id</th>
                <th scope="col">user_id</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Message</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $message = mysqli_query($conn, "SELECT * FROM `messages`");
              while ($row = mysqli_fetch_assoc($message)) { ?>
                <tr>
                  <td>
                    <?php echo $row['msg_id'] ?>
                  </td>
                  <td>
                    <?php echo $row['user_id'] ?>
                  </td>
                  <td>
                    <?php echo $row['email'] ?>
                  </td>
                  <td>
                    <?php echo $row['name'] ?>
                  </td>
                  <td>
                    <?php echo $row['messages'] ?>
                  </td>
                  <td><a href="delete.php?id=<?php echo $row['user_id']; ?>&msg_id=<?php echo $row['msg_id']; ?>" class='btn'>Delete</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br></br><br></br>
      <br></br><br></br><br></br><br></br>

<!-- -------------------------Message ends-----------------------------------  -->


    </div>
  </div>
  <footer>
    <button id="showRecordsButton">Show Records</button>
    <input type="search" id="searchInput" placeholder="Search">
  </footer>
</body>
</html>