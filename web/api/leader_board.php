<?php
  include 'connect.php';
  $sql = "SELECT * FROM user_pengguna ORDER BY `point` DESC LIMIT 10";
  $queryResult = $connect->query($sql);
  $result = array();
  $position = 1;
  while($fetchData = $queryResult->fetch_assoc()){
      $obj = array();
      $obj = $fetchData;
      $obj['position'] = $position;
      $result[] = $obj;
      $position++;
  }
  echo json_encode($result);
  // echo json_encode($result);
 ?>
