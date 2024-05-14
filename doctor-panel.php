<!DOCTYPE html>
<?php
include('func1.php');
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['dname'];
if (isset($_GET['cancel'])) {
  $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where ID = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}

?>
<html lang="en">

<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Care Group </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <style>
      .btn-outline-light:hover {
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

    <style>
      .bg-primary {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
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
      <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Enter contact number" aria-label="Search" name="contact">
        <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
      </form>
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
    <h3 style="margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $_SESSION['dname'] ?> </h3>
    <div class="row">
      <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="#list-profile" id="list-profile-list" role="tab" aria-controls="profile" data-toggle="list">Profile</a>
          <a class="list-group-item list-group-item-action" href="#list-updateprofile" id="list-updateprofile-list" role="tab" aria-controls="updateprofile" data-toggle="list">Update Profile</a>
          <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
        </div><br>
      </div>
      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 950px;">

          <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
            <div class="container-fluid container-fullw bg-white">
              <div class="row" style="margin-top: 2%; margin-left: 2%;">
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-user fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Profile</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>
                      <p class="links cl-effect-1">
                        <a href="#list-profile" onclick="clickDiv('#list-profile-list')">
                          View Profile
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-edit fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Update Profile</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>
                      <p class="links cl-effect-1">
                        <a href="#list-updateprofile" onclick="clickDiv('#list-updateprofile-list')">
                          Update Profile
                        </a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> View Appointments</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>
                      <p class="links cl-effect-1">
                        <a href="#list-app" onclick="clickDiv('#list-app-list')">
                          Appointment List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <h4>Doctor Profile</h4>
            <div class="card">
              <div class="card-body">
                <?php
                // Fetch and display doctor's profile information
                $query = "SELECT * FROM doctb WHERE username = '$doctor'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  // Display the updated profile information
                ?>
                  <div class="row">
                    <div class="col-md-6">
                      <p><strong>Username:</strong> <?php echo $row['username']; ?></p>
                      <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                      <p><strong>Specialization:</strong> <?php echo $row['spec']; ?></p>
                    </div>
                    <div class="col-md-6">
                      <p><strong>Fees:</strong> <?php echo $row['docFees']; ?></p>
                      <p><strong>City:</strong> <?php echo $row['city']; ?></p>
                      <p><strong>Password:</strong> <?php echo $row['password']; ?></p>
                    </div>
                  </div>
                <?php
                  // Add more profile information fields as needed
                } else {
                  echo "No profile found for this doctor.";
                }
                ?>
              </div>
            </div>
          </div>




          <div class="tab-pane fade" id="list-updateprofile" role="tabpanel" aria-labelledby="list-updateprofile-list">
            <h4>Update Profile</h4>
            <form method="post" action="doctor-panel.php">
              <div class="form-group">
                <label for="username">Username Not Changed</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
              </div>
              <div class="form-group">
                <label for="spec">Specialization</label>
                <input type="text" class="form-control" id="spec" name="spec" value="<?php echo $row['spec']; ?>">
              </div>
              <div class="form-group">
                <label for="fees">Fees</label>
                <input type="text" class="form-control" id="fees" name="fees" value="<?php echo $row['docFees']; ?>">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
              </div>
              <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
          </div>

          <?php

          $con = mysqli_connect("localhost", "root", "", "myhmsdb");
          $doctor = $_SESSION['dname'];

          // Check if the form is submitted
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Escape user inputs for security
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $spec = mysqli_real_escape_string($con, $_POST['spec']);
            $fees = mysqli_real_escape_string($con, $_POST['fees']);
            $city = mysqli_real_escape_string($con, $_POST['city']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            // Update profile information in the database
            $query = "UPDATE doctb SET username='$username', email='$email', spec='$spec', docFees='$fees', city='$city', password='$password' WHERE username='$doctor'";
            $result = mysqli_query($con, $query);

            if ($result) {
              echo "<script>alert('Profile updated successfully');</script>";
              // Redirect to the same page after updating the profile
              echo "<script>window.location.href = 'doctor-panel.php';</script>";
              exit();
            } else {
              echo "<script>alert('Error updating profile: " . mysqli_error($con) . "');</script>";
            }
          }
          ?>






          <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Patient ID</th>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                  <th scope="col">Current Status</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;
                $dname = $_SESSION['dname'];
                $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointmenttb where doctor='$dname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
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
                        echo "Cancelled by You";
                      }
                      ?></td>

                    <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                        <a href="doctor-panel.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php } else {

                        echo "Cancelled";
                      } ?>

                    </td>




                  </tr></a>
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