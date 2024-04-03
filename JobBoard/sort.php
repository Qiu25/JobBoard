<?php
if($_GET){
  $order = $_GET["order"];
  $sort = $_GET["sort"];
  $sql = "SELECT * from jobs ORDER BY $order $sort";
}else{
  $sql = "SELECT * from jobs";
}
?>