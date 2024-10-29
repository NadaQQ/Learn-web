<?php

function createTutor($id, $age, $gender, $phone, $bio, $user_id, $db)
{
    $sql = "INSERT INTO tutors VALUES ($id, $age, '" . $gender . "', $phone, '" . $bio . "', $user_id)";
    mysqli_query($db, $sql);
}

function getTutor($user_id, $db)
{
    $sql = "SELECT * FROM tutors WHERE user_id = $user_id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) === 1) {
        return mysqli_fetch_array($result);
    }
    return null;
}

function deleteTutor($user_id, $db)
{
    $sql = "DELETE FROM tutors WHERE user_id = $user_id";
    mysqli_query($db, $sql);
}
