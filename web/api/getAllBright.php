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
    if ($fetchData['type'] == 1) {
        $image = "http://localhost/papward/web/image/bright_store_marker.png";
    }else if ($fetchData['type'] == 2) {
        $image = "http://localhost/papward/web/image/bright_caffe_marker.png";
    }else {
        $image = "http://localhost/papward/web/image/bright_wash_marker.png";
    }
    $result[] = [
        "marker" => $marker,
        "dialog" => $dialog,
        "icon" => $image,
        "status" => $fetchData['type'],        //order
    ];
  }
  echo json_encode($result);
  // echo json_encode($result);
 ?>
