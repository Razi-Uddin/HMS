<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

include('newfunc.php');

if (isset($_POST['docsub'])) {
  $doctor = $_POST['doctor'];
  $dpassword = $_POST['dpassword'];
  $demail = $_POST['demail'];
  $spec = $_POST['special'];
  $city = $_POST['city'];
  $docFees = $_POST['docFees'];
  $query = "insert into doctb(username,password,email,spec,city,docFees)values('$doctor','$dpassword','$demail','$spec','$city','$docFees')";

  // Check if the email already exists in the database
  $check_email_query = "SELECT * FROM `doctb` WHERE `email` = '$demail'";
  $check_email_result = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_result) > 0) {
    // Email already exists, registration failed
    echo 'Email already exists. <a href="admin-panel1.php">Go Back</a>';
    exit;
  }
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Doctor added successfully!');</script>";
    echo "<script>window.location.href = 'admin-panel1.php';</script>";
    exit();
  }
}


if (isset($_POST['docsub1'])) {
  $demail = $_POST['demail'];
  $query = "delete from doctb where email='$demail';";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Doctor removed successfully!');</script>";
    echo "<script>window.location.href = 'admin-panel1.php';</script>";
    exit();
  } else {
    echo "<script>alert('Unable to delete!');</script>";
  }
}


?>
<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Care Group </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <script>
      var check = function() {
        if (document.getElementById('dpassword').value ==
          document.getElementById('cdpassword').value) {
          document.getElementById('message').style.color = '#5dd05d';
          document.getElementById('message').innerHTML = 'Matched';
        } else {
          document.getElementById('message').style.color = '#f55252';
          document.getElementById('message').innerHTML = 'Not Matching';
        }
      }

      function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || key == 32);
      };
    </script>

    <style>
      .bg-primary {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
      }

      .col-md-4 {
        max-width: 20% !important;
      }

      .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #342ac1;
        border-color: #007bff;
      }

      .text-primary {
        color: #342ac1 !important;
      }

      #cpass {
        display: -webkit-box;
      }

      #list-app {
        font-size: 15px;
      }

      .btn-primary {
        background-color: #3c50c1;
        border-color: #3c50c1;
      }
    </style>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
    </div>
  </nav>
</head>
<style type="text/css">
  button:hover {
    cursor: pointer;
  }

  #inputbtn:hover {
    cursor: pointer;
  }
</style>

<body style="padding-top:50px;">
  <div class="container-fluid" style="margin-top:50px;">
    <h3 style="margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME ADMIN </h3>
    <div class="row">
      <div class="col-md-4" style="max-width:25%;margin-top: -5%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list" role="tab" aria-controls="home" data-toggle="list">Doctor List</a>
          <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Patient List</a>
          <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
          <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list" role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
          <a class="list-group-item list-group-item-action" href="#list-settings-list" id="list-udoc-list" role="tab" data-toggle="list" aria-controls="home">Update Doctor</a>
          <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list" role="tab" data-toggle="list" aria-controls="home">Delete Doctor</a>
          <a class="list-group-item list-group-item-action" href="#list-settings2" id="list-apat-list" role="tab" data-toggle="list" aria-controls="home">Add Patient</a>
          <a class="list-group-item list-group-item-action" href="#list-settings-list2" id="list-upat-list" role="tab" data-toggle="list" aria-controls="home">Update Patient</a>
          <a class="list-group-item list-group-item-action" href="#list-settings3" id="list-dpat-list" role="tab" data-toggle="list" aria-controls="home">Delete Patient</a>
          <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list" role="tab" data-toggle="list" aria-controls="home">Queries</a>

        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">



          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>
                      <p class="links cl-effect-1">
                        <a href="#list-doc" onclick="clickDiv('#list-doc-list')">
                          View Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Appointment Details</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                          View Appointments
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4" style="left: 15%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack  fa-2x"> <i class="fa fa-square fa-2x text-primary"></i> <i class="fa fa-user-md fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-udoc-list')">Update Doctors</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">Delete Doctor</a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-2x text-primary"></i> <i class="fa fa-wheelchair fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Patients</h4>

                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-apat-list')">Add Patients</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-upat-list')">Update Patients</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-dpat-list')">Delete Patients</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>




            </div>
          </div>









          <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">


            <div class="col-md-8">
              <form class="form-group" action="doctorsearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="doctor_contact" placeholder="Enter Email ID" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Specialization</th>
                  <th scope="col">Email</th>
                  <th scope="col">City</th>
                  <th scope="col">Password</th>
                  <th scope="col">Fees</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;
                $query = "select * from doctb ORDER BY id DESC";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_array($result)) {
                  $username = $row['username'];
                  $spec = $row['spec'];
                  $email = $row['email'];
                  $city = $row['city'];
                  $password = $row['password'];
                  $docFees = $row['docFees'];

                  echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$city</td>
                        <td>$password</td>
                        <td>$docFees</td>
                      </tr>";
                }


                ?>
              </tbody>
            </table>
            <br>

          </div>


          <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">

            <div class="col-md-8">
              <form class="form-group" action="patientsearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Patient ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;
                $query = "select * from patreg ORDER BY pid DESC";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                  $pid = $row['pid'];
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $gender = $row['gender'];
                  $email = $row['email'];
                  $contact = $row['contact'];
                  $password = $row['password'];

                  echo "<tr>
                        <td>$pid</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$gender</td>
                        <td>$email</td>
                        <td>$contact</td>
                        <td>$password</td>
                      </tr>";
                }

                ?>
              </tbody>
            </table>
            <br>
          </div>







          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">

            <div class="col-md-8">
              <form class="form-group" action="appsearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="app_contact" placeholder="Enter Contact" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="app_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">Patient ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Consultancy Fees</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Appointment Status</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select * from appointmenttb ORDER BY ID DESC;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['doctor']; ?></td>
                    <td><?php echo $row['docFees']; ?></td>
                    <td><?php echo $row['appdate']; ?></td>
                    <td><?php echo $row['apptime']; ?></td>
                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                        echo "Active";
                      }
                      if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                        echo "Cancelled by Patient";
                      }

                      if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                        echo "Cancelled by Doctor";
                      }
                      ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
          </div>

          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="row">
                <div class="col-md-4"><label>Doctor Name:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
                <div class="col-md-4"><label>Specialization:</label></div>
                <div class="col-md-8">
                  <select name="special" class="form-control" id="special" required="required">
                    <option value="head" name="spec" disabled selected>Select Specialization</option>
                    <option value="General" name="spec">General</option>
                    <option value="Cardiologist" name="spec">Cardiologist</option>
                    <option value="Neurologist" name="spec">Neurologist</option>
                    <option value="Pediatrician" name="spec">Pediatrician</option>
                  </select>
                </div><br><br>
                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div><br><br>
                <div class="col-md-4"><label>City:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="city" required></div><br><br>
                <div class="col-md-4"><label>Password:</label></div>
                <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="dpassword" id="dpassword" required></div><br><br>
                <div class="col-md-4"><label>Confirm Password:</label></div>
                <div class="col-md-8" id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>


                <div class="col-md-4"><label>Consultancy Fees:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="docFees" required></div><br><br>
              </div>
              <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
            </form>
          </div>




          <div class="tab-pane fade" id="list-settings-list" role="tabpanel" aria-labelledby="list-settings-list">
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="row">
                <div class="col-md-4"><label>Doctor Name:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="doctor_name" required></div><br><br>
              </div>
              <div class="row">
                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" placeholder="Email Remain Same" class="form-control" name="demail" required></div><br><br>
              </div>
              <div class="row">
                <div class="col-md-4"><label>City</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="city" required></div><br><br>
              </div>
              <div class="row">
                <div class="col-md-4"><label>New Password:</label></div>
                <div class="col-md-8"><input type="password" class="form-control" name="new_dpassword" required></div><br><br>
              </div>
              <div class="row">
                <div class="col-md-4"><label>New Specialization:</label></div>
                <div class="col-md-8">
                  <select name="new_special" class="form-control" id="new_special" required="required">
                    <option value="head" name="new_spec" disabled selected>Select Specialization</option>
                    <option value="General" name="new_spec">General</option>
                    <option value="Cardiologist" name="new_spec">Cardiologist</option>
                    <option value="Neurologist" name="new_spec">Neurologist</option>
                    <option value="Pediatrician" name="new_spec">Pediatrician</option>
                  </select>
                </div><br><br>
              </div>
              <div class="row">
                <div class="col-md-4"><label>New Consultancy Fees:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="new_docFees" required></div><br><br>
              </div>
              <input type="submit" name="docsub2" value="Update Doctor" class="btn btn-primary">
            </form>
          </div>
          <?php
          // Database connection
          $con = mysqli_connect("localhost", "root", "", "myhmsdb");

          if (isset($_POST['docsub2'])) {
            // Retrieve form data
            $name = $_POST['doctor_name'];
            $demail = $_POST['demail'];
            $city = $_POST['city'];
            $new_dpassword = $_POST['new_dpassword'];
            $new_special = $_POST['new_special'];
            $new_docFees = $_POST['new_docFees'];

            // Validate email format
            if (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
              echo "<script>alert('Invalid email format!');</script>";
            } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM doctb WHERE email='$demail'")) == 0) {
              echo "<script>alert('Email does not exist in the database!');</script>";
            } else {
              // Proceed with the update
              // Update query
              $query = "UPDATE doctb SET password='$new_dpassword', username='$name',city='$city', spec='$new_special', docFees='$new_docFees' WHERE email='$demail'";

              // Execute the update query
              $result = mysqli_query($con, $query);

              if ($result) {
                echo "<script>alert('Doctor information updated successfully!');</script>";
                echo "<script>window.location.href = 'admin-panel1.php';</script>";
                exit();
              } else {
                echo "<script>alert('Failed to update doctor information!');</script>";
              }
            }
          }
          ?>





          <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="row">

                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div><br><br>

              </div>
              <input type="submit" name="docsub1" value="Delete Doctor" class="btn btn-danger" onclick="confirm('do you really want to delete?')">
            </form>
          </div>

          <div class="tab-pane fade" id="list-settings2" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading" style="color:black; font-weight:bold;">Register as Patient</h3><br>
            <form method="post" action="func2.php">
              <div class="row register-form">

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name *" name="fname" pattern="[A-Za-z]+" required />
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Patient Email *" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" id="password" name="password" required />
                  </div>

                  <div class="form-group">
                    <div class="maxl">
                      <label class="radio inline">
                        <input type="radio" name="gender" value="Male" checked>
                        <span> Male </span>
                      </label>
                      <label class="radio inline">
                        <input type="radio" name="gender" value="Female">
                        <span>Female </span>
                      </label>
                    </div>
                    <a href="index1.php">Already have an account?</a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name *" name="lname" pattern="[A-Za-z]+" required />
                  </div>

                  <div class="form-group">
                    <input type="tel" minlength="10" maxlength="13" name="contact" class="form-control" placeholder="Patient Phone *" pattern="[0-9]+" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password *" name="cpassword" required /><span id='message'></span>
                  </div>
                  <input type="submit" class="btn btn-primary" name="patsub1" value="Register" />
                </div>

              </div>
            </form>
          </div>

          <div class="tab-pane fade" id="list-settings-list2" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading" style="color:black; font-weight:bold;">Update Patient Information</h3><br>
            <form method="post" action="admin-panel1.php">
              <div class="row register-form">

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name *" name="fname" pattern="[A-Za-z]+" required />
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Patient Email Remain Same *" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="New Password" id="password" name="password" />
                  </div>

                  <div class="form-group">
                    <div class="maxl">
                      <label class="radio inline">
                        <input type="radio" name="gender" value="Male">
                        <span> Male </span>
                      </label>
                      <label class="radio inline">
                        <input type="radio" name="gender" value="Female">
                        <span>Female </span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name *" name="lname" pattern="[A-Za-z]+" required />
                  </div>

                  <div class="form-group">
                    <input type="tel" minlength="10" maxlength="13" name="contact" class="form-control" placeholder="Patient Phone *" pattern="[0-9]+" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm New Password" name="cpassword" /><span id='message'></span>
                  </div>
                  <input type="submit" class="btn btn-primary" name="patupdate" value="Update Information" />
                </div>

              </div>
            </form>
          </div>

          <?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['patupdate'])) {
        // Retrieve form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = isset($_POST['password']) ? $_POST['password'] : ''; // Only update password if provided
        $contact = $_POST['contact'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; // Check if 'gender' is set

        // Check for empty fields
        if (empty($fname) || empty($lname) || empty($email) || empty($contact)) {
            echo "<script>alert('All fields are required!');</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format!');</script>";
        } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM patreg WHERE email='$email'")) == 0) {
            echo "<script>alert('Email does not exist in the database!');</script>";
        } else {
            // Prepare update query
            $query = "UPDATE patreg SET fname='$fname', lname='$lname', contact='$contact'";
            
            // Include password update if provided
            if (!empty($password)) {
                $query .= ", password='$password'";
            }

            // Include gender update if provided
            if (!empty($gender)) {
                $query .= ", gender='$gender'";
            }

            $query .= " WHERE email='$email'";

            // Execute the update query
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Patient information updated successfully!');</script>";
                echo "<script>window.location.href = 'admin-panel1.php';</script>";
                exit();
            } else {
                echo "<script>alert('Failed to update patient information!');</script>";
            }
        }
    }
}
?>



<div class="tab-pane fade" id="list-settings3" role="tabpanel" aria-labelledby="home-tab">
    <h3 class="register-heading" style="color:black; font-weight:bold;">Delete Patient</h3><br>
    <form method="post" action="admin-panel1.php">
        <div class="row register-form">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Patient Email" name="email" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="tel" minlength="10" maxlength="13" name="contact" class="form-control" placeholder="Patient Phone" />
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-danger" name="patdelete" value="Delete Patient" />
            </div>
        </div>
    </form>
</div>

<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['patdelete'])) {
        // Retrieve form data
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        // Check if either email or contact is provided
        if (empty($email) && empty($contact)) {
            echo "<script>alert('Please provide either email or contact for deletion!');</script>";
        } else {
            // Prepare query to check if email or contact exists in the database
            $query = "SELECT * FROM patreg WHERE";
            $conditions = [];

            if (!empty($email)) {
                $conditions[] = " email='$email'";
            }

            if (!empty($contact)) {
                $conditions[] = " contact='$contact'";
            }

            $query .= implode(" OR", $conditions);

            // Execute the query to check if email or contact exists
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                // If email or contact exists, proceed with deletion
                $deleteQuery = "DELETE FROM patreg WHERE" . implode(" OR", $conditions);
                $deleteResult = mysqli_query($con, $deleteQuery);

                if ($deleteResult) {
                    echo "<script>alert('Patient information deleted successfully!');</script>";
                    echo "<script>window.location.href = 'admin-panel1.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Failed to delete patient information!');</script>";
                }
            } else {
                // If email or contact doesn't exist, show error message
                echo "<script>alert('Provided email or contact does not exist in the database!');</script>";
            }
        }
    }
}
?>






          <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

          <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

            <div class="col-md-8">
              <form class="form-group" action="messearch.php" method="post">
                <div class="row">
                  <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class="form-control"></div>
                  <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div>
                </div>
              </form>
            </div>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">User Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Message</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select * from contact ORDER BY id DESC";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                  #$fname = $row['fname'];
                  #$lname = $row['lname'];
                  #$email = $row['email'];
                  #$contact = $row['contact'];
                ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <br>
          </div>



        </div>
      </div>
    </div>
  </div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
</body>

</html>