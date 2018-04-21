<?php
    include 'connect.php';
    // include 'send_Verification_code.php';

    $response = array();

    if (isset($_POST['id_user'])) {

        //do something when right
        $userid = $_POST['id_user'];

        $query = "SELECT reward.*, history.*, history.id as id_history, history.status as status_his FROM reward_history as history, reward_item as reward WHERE reward.id = history.id_reward and history.id_user = '$userid' ORDER BY history.date_expired ASC";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {

            $data = array();

            while ($row = $result->fetch_assoc()){
                $obj = array();
                $obj['id'] = $row['id_history'];
                $obj['nama'] = $row['name'];
                $obj['image'] = $row['image'];
                $obj['date_expired'] = $row['date_expired'];
                $obj['code'] = $row['code'];
                $obj['point'] = $row['point'];

                $status = (int)$row['status_his'];
                if ($status == 0) {
                    $obj['status_text'] = "Belum Ditukar";
                }else if ($status == 1) {
                    $obj['status_text'] = "Sudah Ditukar";
                }else {
                    $obj['status_text'] = "Expired";
                }

                $obj['status'] = $row['status_his'];
                $data[] = $obj;
            }

            $response['response'] = 200;
            $response['status'] = true;
            $response['data'] = $data;
        }else {
            $response['response'] = 200;
            $response['status'] = false;
            $response['message'] = "Ambil history gagal";
        }

    }else {

        //do something when false
        $response['response'] = 400;
        $response['status'] = false;
        $response['message'] = "Pastikan parameter anda terisi";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

?>
