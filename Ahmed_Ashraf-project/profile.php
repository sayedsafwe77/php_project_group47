<?php
if($_COOKIE['role']=='user')
{
    //to dashboard

}
else
{
    // to profile
    header('Location:http://localhost/project/login (2).php');
}
?>
<link rel="stylesheet" href="profile.css" />
<link href="bootstrap.min.css" rel="stylesheet">
<link
  href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&family=Recursive&family=Work+Sans:ital@1&display=swap"
/>
<script
  src="https://kit.fontawesome.com/2a24445aba.js"
></script>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="#" style="border: 1px whitesmoke;">Global</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="products.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="login%20(2).php">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="register.html">sign in</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <!-- Main-Introduction  -->
  <a name="About_me"></a>
    <div class="introduction">
      <div class="content">
        <h1>Hello, My name is</h1>
          <?php
          if(isset($_COOKIE['userLogin']))
          {
              echo '<span>'.$_COOKIE['name'].'</span>';
          }
          ?>
        <p>
          I am a student with major in Computer Science and
          Engineering. I am a coder and a developer.
        </p>
      </div>
        <?php
        if(isset($_COOKIE['userLogin']))
        {
            echo '<img src="userImages//'.$_COOKIE['profilepic'].'" alt="profile image">';
        }
        ?>
    </div>

  <!-- Contact info -->
  <a name="Contact"></a>
    <div class="contact">
      <h1>Contact Info</h1>
      <div class="details">
        <div class="info">
          <i class="fas fa-envelope"></i> Email : <?php echo $_COOKIE['userLogin'] ?>
        </div>
        <div class="info">
          <a href="https://www.linkedin.com/in/sanskrati-jain-21aa55208/"><i class="fab fa-linkedin"></i> Linkedin</a>
        </div>
        <div class="info">
          <a href="https://twitter.com/SanskratiJain4"><i class="fab fa-twitter-square"></i> Twitter</a>
        </div>
      </div>
    </div>
</body>

