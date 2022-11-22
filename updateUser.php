<?php
require_once 'connection.php';

if ($con) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $phonenum = $_POST['phonenum'];

    $getData = "SELECT * FROM user WHERE id = '$id'";

    if ($id != "" && $username != "" && $email != "" && $date != ""  && $phonenum != "" ) {
        $result = mysqli_query($con, $getData);
        $rows = mysqli_num_rows($result);
        $response = array();

        if ($rows > 0) {
            $update = "UPDATE `user` SET `username`='$username',`email`='$email',`date`='$date',`phonenum`='$phonenum' WHERE `id`=$id";
            $exequery = mysqli_query($con, $update);

            if ($exequery) {
                array_push($response, array(
                    'status' => 'OK'
                ));
            } else {
                array_push($response, array(
                    'status' => 'FAILED'
                ));
            }
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }
} else {
    array_push($response, array(
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($con);
?>