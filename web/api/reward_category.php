<?php
  include 'connect.php';
  $sql = "SELECT * FROM reward_category";
  $queryResult = $connect->query($sql);
  $result = array();
  $position = 1;
  while($fetchData = $queryResult->fetch_assoc()){

      $obj = array();

      $categoryid = $fetchData['id'];
      $newSql = "SELECT * FROM reward_item WHERE reward_cat = '$categoryid'";
      $queryResult1 = $connect->query($newSql);
      // echo $newSql;
      if ($queryResult1) {
          $minPoint = 999999;
          while($fetchData1 = $queryResult1->fetch_assoc()){
              if ($minPoint > $fetchData1['point']) {
                  $minPoint = $fetchData1['point'];
              }
          }
      }else {
          $minPoint = 0;
      }

      $obj = $fetchData;
      $obj['point'] = $minPoint;
      $result[] = $obj;
      $position++;
  }
  echo json_encode($result);
  // echo json_encode($result);
 ?>
