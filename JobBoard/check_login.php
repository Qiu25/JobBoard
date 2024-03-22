<?php

  $uri = $_SERVER['REQUEST_URI'];

  if(!isset($_COOKIE["user_email"])){
    echo "<a href='./signup.html'>Sign Up</a>
          <a href='./login.html'>Log In</a>";
  }elseif($uri == "/JobBoard/index.php"){
    echo "<p>Welcome, " . $_COOKIE["user_name"] . "</p>";
    echo "<a href='./logout.php'>Log Out</a>";
    echo "<a href='./admin.php'>Admin</a>";
  }elseif($uri == "/JobBoard/admin.php"){
    echo "<p>Welcome, " . $_COOKIE["user_name"] . "</p>";
    echo "<a href='./logout.php'>Log Out</a>";
    echo "<a href='./index.php'>Index</a>";
  }elseif($uri == "/JobBoard/add.php"){
    echo "<p>Welcome, " . $_COOKIE["user_name"] . "</p>";
    echo "<a href='./logout.php'>Log Out</a>";
    echo "<a href='./admin.php'>Admin</a>";
    echo "<a href='./index.php'>Index</a>";
  }
?>