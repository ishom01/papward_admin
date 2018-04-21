<?php
  include 'connect.php';
  $sql = "SELECT * FROM bright";
  $queryResult = $connect->query($sql);
  $result = array();
  while($fetchData = $queryResult->fetch_assoc()){
    $marker = array();
    $marker[] = floatval($fetchData['lat']);
    $marker[] = floatval($fetchData['lng']);
    $dialog = array();
    $dialog[] = $fetchData['name'];
    $dialog[] = $fetchData['address'];
    $image = "http://localhost/papward/web/image/gas_station_marker.png";
    $result[] = [
        "marker" => $marker,
        "dialog" => $dialog,
        "icon" => $image,
        "status" => 0,        //order
    ];
  }
  echo json_encode($result);
  // echo json_encode($result);
 ?>
