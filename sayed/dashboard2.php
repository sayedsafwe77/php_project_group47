<?php
 include('dashboard.php');
 include('db.php');
 $users= new db('localhost','php_project','root','');
 $allusers=$users->getAll('admin');
?>

<link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="dashboard.css">
<link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<div class="container">
  <div class="header">
    <div class="header-logo">
      <svg class="site-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M512 256a15 15 0 00-7.1-12.8l-52-32 52-32.5a15 15 0 000-25.4L264 2.3c-4.8-3-11-3-15.9 0L7 153.3a15 15 0 000 25.4L58.9 211 7.1 243.3a15 15 0 000 25.4L58.8 301 7.1 333.3a15 15 0 000 25.4l241 151a15 15 0 0015.9 0l241-151a15 15 0 00-.1-25.5l-52-32 52-32.5A15 15 0 00512 256zM43.3 166L256 32.7 468.7 166 256 298.3 43.3 166zM468.6 346L256 479.3 43.3 346l43.9-27.4L248 418.7a15 15 0 0015.8 0L424.4 319l44.2 27.2zM256 388.3L43.3 256l43.9-27.4L248 328.7a15 15 0 0015.8 0L424.4 229l44.1 27.2L256 388.3z" />
      </svg>
      <span class="site-title">Layerz</span>
    </div>
    <div class="header-search">
      <button class="button-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 385 385">
          <path d="M12 120.3h361a12 12 0 000-24H12a12 12 0 000 24zM373 180.5H12a12 12 0 000 24h361a12 12 0 000-24zM373 264.7H132.2a12 12 0 000 24H373a12 12 0 000-24z" />
        </svg></button>
      <input type="search" placeholder="Search Documentation..." />
    </div>
  </div>
  <div class="main">
    <div class="sidebar">
      <ul>
        <li><a href="#" class="active"><i class="lni lni-home"></i><span>Dashboard</span></a></li>
        <li><a href="#"><i class="lni lni-text-format"></i><span>Form Elements</span></a></li>
        <li><a href="#"><i class="lni lni-bar-chart"></i><span>Charts</span></a></li>
        <li><a href="#"><i class="lni lni-grid"></i><span>Grid System</span></a></li>
        <li><a href="#"><i class="lni lni-bullhorn"></i><span>Notifications</span></a></li>
        <li><a href="#"><i class="lni lni-support"></i><span>Help & Support</span></a></li>
      </ul>
    </div>
    <div class="page-content">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">image</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allusers as $user):?>
    <tr>
      <form action="delete.php" method="post">
      <th scope="row">1</th>
      <td><?php echo $user['username']?></td>
      <td><?php echo $user['email']?></td>
      <td><?php echo $user['image']?></td>
      <input type="hidden" name="id" value='<?php echo $user['id']?>'>
      <td><i class="fas fa-edit" ></i><button type="submit"><i class="fas fa-trash"></i></button></td>
      </form>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
    </div>    
  </div>
</div>