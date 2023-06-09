<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="icon" href="../assets/logo.png" type="image/x-icon">
  <!-- <link rel="stylesheet" href="css/profile.css" /> -->

</head>

<body>

  <div class='nav-bar'>
    <?php
    require('navbar.php');
    ?>
  </div>

  <div class="profile_container">
    <div class="side-link">
      <a href="profile.php?cat=profile">Profile Information</a>
      <a href="profile.php?cat=update">Update Profile</a>
      <a href="profile.php?cat=orderlist">Orders List</a>
      <a href="../db/logout.php">Logout</a>
    </div>

    <div class="profile-content">
      <?php
      if (isset($_GET['cat'])) {
        $links = $_GET['cat'];
        if ($links == "profile") {
          require('profilepage.php');
        }
        if ($links == 'update') {
          require('editprofile.php');
        }
        if ($links == 'deactivate') {
          require('deactivate.php');
        }
        if ($links == 'history') {
          require('orderviewpage.php');
        }
        if ($links == 'orderlist') {
          require('orderlistpage.php');
        }
      } else {
        require('profilepage.php');
      }
      ?>

    </div>
  </div>


  <?php
  require('footer.php');
  ?>

</body>

</html>