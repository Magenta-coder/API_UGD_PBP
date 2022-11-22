<?php
require_once 'connection.php';

    if($con) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $phonenum = $_POST['phonenum'];
        $password = $_POST['password'];

        $insert = "INSERT INTO `user`(`username`, `email`, `date`, `phonenum`, `password`) VALUES ('$username','$email','$date','$phonenum','$password')";

        if($username != "" && $email != "" && $date != "" && $phonenum != "" && $password != "" ){
            $result = mysqli_query($con, $insert);
            $response = array();

            if($result){
                array_push($response, array(
                    'status' => 'OK'
                ));
            }else{
                array_push($response, array(
                    'status' => 'FAILED'
                ));
            }
        }else{
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    }

    echo json_encode(array("server_response" => $response));
    mysqli_close($con);
?>