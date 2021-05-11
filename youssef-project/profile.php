<?php
include('config.php');
include('server.php');

  if (!isset($_COOKIE['email'])) {
  	$_COOKIE['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_COOKIE['email']);
	// setcookie("PHPSESSID","",time()-3600);
  	header("location: login.php");
  }

?>
<link rel="stylesheet" href="profile.css" />

<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&family=Recursive&family=Work+Sans:ital@1&display=swap"/>
<script
  src="https://kit.fontawesome.com/2a24445aba.js"
></script>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <!-- <div class="nav__logo">Sanskrati</div> -->
    <div class="nav__content">
      <ul>
        <li class="nav__items"><a href="#About_me">About Me</a></li>
        <li class="nav__items"><a href="#Education">Education</a></li>
        <li class="nav__items"><a href="#Skills">Skills</a></li>
        <li class="nav__items"><a href="#Contact">Contact</a></li>
      </ul>
    </div>
    <div class="actions">
    <?php  if (isset($_COOKIE['email'])) : ?>
      <p> <a href="index.php?logout='1'" style="color:  linear-gradient(
      to top,
      rgb(11, 236, 199) 0%,
      rgb(15, 238, 89) 100%);;">logout</a> </p>
     <?php endif ?>
     <li class="nav__items"><a href="settings.php"><i class="fas fa-user-cog"></i></a></li>
    </div>
  </div>

  <!-- Main-Introduction  -->
  <a name="About_me"></a>
    <div class="introduction">
      <div class="content">
        <h1>Hello, My name is</h1>
        <span><?php echo $_COOKIE['name']; ?></span>
        <p>
          I am a student with major in commerce and
          business administration. I am a coder and a developer.
        </p>
      </div>
    </div>




  <!-- Contact info -->
  <a name="Contact"></a>
    <div class="contact">
      <h1>Contact Info</h1>
      <div class="details">
        <div class="info">
          <i class="fas fa-envelope"></i><?php echo $_COOKIE['email']; ?>
        </div>
        <div class="info">
          <a href="https://www.linkedin.com/in/sanskrati-jain-21aa55208/"
            ><i class="fab fa-linkedin"></i> Linkedin</a
          >
        </div>
        <div class="info">
          <a href="https://twitter.com/SanskratiJain4"
            ><i class="fab fa-twitter-square"></i> Twitter</a
          >
        </div>
      </div>
    </div>
</body>

