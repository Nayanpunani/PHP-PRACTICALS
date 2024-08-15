<?php 
include "db.php";
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login-ui.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      .containers {
        display: flex;
          height: 100%;
      }

      .sidebar {
        background: #333;
        color: #fff;
        width: 200px;
        padding: 20px;
        margin-top: : 100px;

      }

      .sidebar ul {
        list-style: none;
        padding: 0;
      }

      .sidebar li {
        margin-bottom: 10px;
      }

      .sidebar a {
        color: #fff;
        text-decoration: none;
      }

      .content {
        flex: 1;
        padding: 20px;
      }

      h1 {
        margin-top: 0;
      }

    </style>
  <body>
     <div class="containers">
    <div class="sidebar">
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
    <div class="content">
      <h1>Welcome to the Admin Area!</h1>
      <p>This is the main content of the admin area.</p>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>