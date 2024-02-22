<?php

function createJobRequest($name, $age, $type_of_class, $start_date, $end_date, $start_time, $end_time, $parent_id, $db)
{
    $sql = "INSERT INTO job_requests (name, age, type_of_class, start_date, end_date, start_time,end_time, parent_id)  VALUES('" . $name . "', " . $age . ", '" . $type_of_class . "', '" . $start_date . "', '" . $end_date . "', '" . $start_time . "', '" . $end_time . "', $parent_id)";
    mysqli_query($db, $sql);
}

function getJobRequestByParentId($parent_id, $db)
{
    $sql = "SELECT * FROM job_requests WHERE parent_id = $parent_id";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getJobRequestByTutorId($tutor_id, $db)
{
    $sql = "SELECT DISTINCT j.* FROM job_requests j JOIN offers o ON (o.job_request_id = j.id) WHERE o.tutor_id = $tutor_id";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getCurrentJobRequestsByTutorId($tutor_id, $db)
{
    $sql = "SELECT j.*, o.price, p.first_name, p.last_name, p.image  FROM users p JOIN job_requests j ON(p.id = j.parent_id) JOIN offers o ON (o.job_request_id = j.id) WHERE o.tutor_id = $tutor_id AND j.status = 'accepted' AND DATE(j.end_date) >= '" . time() . "'";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getPreviousJobRequestsByTutorId($tutor_id, $db)
{
    $sql = "SELECT j.*, o.price, p.first_name, p.last_name, p.image  FROM users p JOIN job_requests j ON(p.id = j.parent_id) JOIN offers o ON (o.job_request_id = j.id) WHERE o.tutor_id = $tutor_id AND j.status = 'accepted' AND DATE(j.end_date) < '" . time() . "'";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getCurrentJobRequestsByParentId($parent_id, $db)
{
    $sql = "SELECT j.*, o.price, p.first_name, p.last_name, p.image, p.email, t.id tutor_id  FROM users p JOIN job_requests j ON(p.id = j.parent_id) JOIN offers o ON (o.job_request_id = j.id) JOIN tutors t ON(t.user_id = o.tutor_id) WHERE j.parent_id = $parent_id AND j.status = 'accepted' AND DATE(j.end_date) >= '" . time() . "'";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getPreviousJobRequestsByParentId($parent_id, $db)
{
    $sql = "SELECT j.*, o.price, p.first_name, p.last_name, p.image, p.email, t.id tutor_id  FROM users p JOIN job_requests j ON(p.id = j.parent_id) JOIN offers o ON (o.job_request_id = j.id) JOIN tutors t ON(t.user_id = o.tutor_id) WHERE j.parent_id = $parent_id AND j.status = 'accepted' AND DATE(j.end_date) < '" . time() . "'";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function getPendingJobRequest($db)
{
    $sql = "SELECT * FROM job_requests WHERE status = 'pending'";
    $result = mysqli_query($db, $sql);
    $job_requests = array();
    while ($row = mysqli_fetch_array($result)) {
        $job_requests[] = $row;
    }
    return $job_requests;
}

function acceptJobRequest($id, $db)
{
    $sql = "UPDATE job_requests SET status = 'accepted' WHERE id = $id";
    mysqli_query($db, $sql);
}

function deleteJobRequest($id, $db)
{
    $sql = "DELETE FROM job_requests WHERE id = $id";
    mysqli_query($db, $sql);
}
