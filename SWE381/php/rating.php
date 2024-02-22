<?php

function createRating($rate = 0, $review, $user_id, $tutor_id, $title, $db)
{
    $sql = "INSERT INTO ratings VALUES (null, $rate, '" . $review . "', $user_id, $tutor_id, '" . $title . "')";
    mysqli_query($db, $sql);
}

function getRatingsByTutorId($tutor_id, $db)
{
    $sql = "SELECT * FROM ratings WHERE tutor_id = $tutor_id";
    $result = mysqli_query($db, $sql);
    $ratings = array();
    while ($row = mysqli_fetch_array($result)) {
        $ratings[] = $row;
    }
    return $ratings;
}
