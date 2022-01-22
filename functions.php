<?php

$conn = mysqli_connect("localhost", "root", "", "db_sys_monitoring_project");

function get_data($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function add_new_project($data){
    global $conn;

    $name = mysqli_real_escape_string($conn, $data['name']);
    $client = mysqli_real_escape_string($conn, $data['client_name']);
    $leader = $data['project_leader'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $progress = 0;

    $msg = '';
    $is_ok = false;

    $query = "INSERT INTO tb_project VALUES ('', '$name', '$client', '$start_date', '$end_date', '$progress', '$leader')";

    mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) < 1) {
        $msg = "Gagal menambahkan project baru";
        goto out;
    }

    $msg = "Berhasil menambahkan project baru";
    $is_ok = true;

    out:
        return [
            "is_ok" => $is_ok,
            "msg" => $msg
        ];
}

function edit_project($pid, $data) {
    global $conn;

    $name = mysqli_real_escape_string($conn, $data['name']);
    $client = mysqli_real_escape_string($conn, $data['client_name']);
    $leader = $data['project_leader'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $progress = mysqli_real_escape_string($conn, $data['progress']);

    $msg = '';
    $is_ok = false;

    $query = "UPDATE tb_project SET project_name = '$name', 
                                    client_name = '$client', 
                                    start_date = '$start_date', 
                                    end_date = '$end_date', 
                                    progress = '$progress', 
                                    id_leader = '$leader' WHERE id_project = '$pid'";

    mysqli_query($conn, $query);

    var_dump(mysqli_affected_rows($conn));
    var_dump($query);
    
    if(mysqli_affected_rows($conn) < 1) {
        $msg = "Gagal memperbarui project";
        goto out;
    }

    $msg = "Berhasil memperbarui project";
    $is_ok = true;

    out:
        return [
            "is_ok" => $is_ok,
            "msg" => $msg
        ];
    
}

function delete_project($data) {
    global $conn;
    $query = "DELETE FROM tb_project WHERE id_project = '$data'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
