<?php
session_save_path(getcwd());
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app_container">
  
  <div class="side-nav">
    <div class="logo">
    </div>
    <ul class="nav-links">
        <li>
          <span class="material-symbols-outlined">map</span>
          <a href="#">Roadmap</a>
        </li>
        <li>
          <span class="material-symbols-outlined">lightbulb</span> 
          <a href="#">Plan</a>
        </li>
        <li>
          <span class="material-symbols-outlined">attach_money</span>
          <a href="#">Deals</a>
        </li>
        <li>
          <span class="material-symbols-outlined">settings_accessibility</span>
          <a href="#">Collaborators</a>
        </li>
        <li>
          <span class="material-symbols-outlined">settings</span>
          <a href="#">Preferences</a>
        </li>
        <li>
          <span class="material-symbols-outlined">Logout</span>
          <a href="index.php">Logout</a>
        </li>
      </ul>
      
      <div class="storage">
      </div>
  </div>
  
  <nav>
    <h2>SuperAdmin Dashboard</h2>
    <div class="button-group">
      <div class="avatars">
        <div class="avatar three">SA</div>
      </div>
      <button class="secondary-btn">Open Drafts</button>
      <button class="primary-btn">Create New</button>
    </div>
  </nav>
  
  <header>
    <div class="breadcrumbs">
      <ul>
        <li><a href=""><span class="material-symbols-outlined">home</span></a></li>
        <span class="material-symbols-outlined">chevron_right</span>
        <li><a href="">All Deals</a></li>
        <span class="material-symbols-outlined">chevron_right</span>
        <li><a href="">Deals to watch</a></li>
      </ul>
    </div>
    <div class="drafts">
      <label class="switch">
        <input type="checkbox" checked>
        <span class="slider"></span>
      </label>
      <span>Show Drafts</span>
    </div>
  </header>
  
  <table>
  
  <thead>
    <tr>
      <th class="first"> </th>
      <th class="second">Name</th>
      <th class="third">Email</th>
      <th class="fourth">Phone</th>
      <th class="fifth">Revenue</th>
      <th class="sixth"></th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <td class="first"><input type="checkbox" checked></td>
      <td class="second">Katrin Murphy</td>
      <td class="third">murphy@example.com</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$87.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Marvin McKinnie</td>
      <td class="third">mckinnie@example.com</td>
      <td class="fourth">(211) 432-2368</td>
      <td class="fifth">$987.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox" checked></td>
      <td class="second">User XYZ</td>
      <td class="third">xyz@example.com</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$87.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>

    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Kristin Watson</td>
      <td class="third">watson@example</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$1.2K</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Katrin Murphy</td>
      <td class="third">murphy@example.com</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$87.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Marvin McKinnie</td>
      <td class="third">mckinnie@example.com</td>
      <td class="fourth">(211) 432-2368</td>
      <td class="fifth">$987.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Kristin Watson</td>
      <td class="third">watson@example</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$1.2K</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Katrin Murphy</td>
      <td class="third">murphy@example.com</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$87.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Marvin McKinnie</td>
      <td class="third">mckinnie@example.com</td>
      <td class="fourth">(211) 432-2368</td>
      <td class="fifth">$987.54</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
    
    <tr>
      <td class="first"><input type="checkbox"></td>
      <td class="second">Kristin Watson</td>
      <td class="third">watson@example</td>
      <td class="fourth">(211) 321-7321</td>
      <td class="fifth">$1.2K</td>
      <td class="sixth"><span class="material-symbols-outlined">more_horiz</span></td>
    </tr>
  </tbody>

</table>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
