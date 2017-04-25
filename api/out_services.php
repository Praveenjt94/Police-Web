<?php

// get post data
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if (isset($request->action) && $request->action == "login") {
    // do login process
    include_once('../backend/dbConnect.php');
    if ($request->type == "driver") {
        // driver login
        $sql = "SELECT u.*,d.points_count FROM users u, driver d WHERE d.driver_id = '" . $request->username . "' AND u.password = '" . $request->password . "' GROUP BY u.id";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            $res['data'] = $results->fetch_assoc();
            $res['status'] = 'SUCCESS';
        } else {
            $res['status'] = 'FAILED';
        }
    } else {
        // police officer login
        $sql = "SELECT u.*,p.type FROM users u, police_officer p WHERE p.officer_id = '" . $request->username . "' AND u.password = '" . $request->password . "' GROUP BY u.id";
        $results = $conn->query($sql);
        if ($results->num_rows > 0) {
            $res['data'] = $results->fetch_assoc();
            $res['status'] = 'SUCCESS';
        } else {
            $res['status'] = 'FAILED';
        }
    }
    header('Content-Type: application/json');
    $conn->close();
    echo json_encode($res);
}

?>