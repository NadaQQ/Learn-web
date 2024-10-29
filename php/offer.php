<?php

function createOffer($price, $job_request_id, $tutor_id, $db)
{
    $sql = "INSERT INTO offers (price, job_request_id,  tutor_id) VALUES($price, $job_request_id,  $tutor_id)";
    mysqli_query($db, $sql);
}

function rejectOffer($id, $db)
{
    $sql = "UPDATE offers SET status = 'rejected' WHERE id = $id";
    mysqli_query($db, $sql);
}

function acceptOffer($id, $db)
{
    $sql = "UPDATE offers SET status = 'accepted' WHERE id = $id";
    mysqli_query($db, $sql);
}

function getOffersByTutorId($tutor_id, $db)
{
    $sql = "SELECT j.*, o.price, o.status, p.first_name, p.last_name, p.image  FROM users p JOIN job_requests j ON(p.id = j.parent_id) JOIN offers o ON (o.job_request_id = j.id) WHERE o.tutor_id = $tutor_id";
    $result = mysqli_query($db, $sql);
    $offers = array();
    while ($row = mysqli_fetch_array($result)) {
        $offers[] = $row;
    }
    return $offers;
}

function getOffersByJobRequestId($job_request_id, $db)
{
    $sql = "SELECT o.*, u.image, u.first_name, u.last_name  FROM  offers o JOIN tutors t ON (o.tutor_id = t.user_id) JOIN users u ON (t.user_id = u.id) WHERE o.job_request_id = $job_request_id AND o.status = 'pending'";
    $result = mysqli_query($db, $sql);
    $offers = array();
    while ($row = mysqli_fetch_array($result)) {
        $offers[] = $row;
    }
    return $offers;
}
