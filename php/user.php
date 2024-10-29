<?php

function login($email, $password, $db)
{
    $sql = "SELECT id, type FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        setcookie('user_id', $row['id'], time() + (86400 * 30), "/");
        setcookie('user_type', $row['type'], time() + (86400 * 30), "/");
        return true;
    }

    return false;
}

function createUser($first_name, $last_name, $email, $password, $type, $image = null, $city, $db)
{
    if ($image) {
        $sql = "INSERT INTO users VALUES (null, '" . $email . "', '" . $password . "' , '" . $type . "', '" . $first_name . "', '" . $last_name . "', '" . $image . "', '" . $city . "')";
    } else {
        $sql = "INSERT INTO users VALUES (null, '" . $email . "', '" . $password . "' , '" . $type . "', '" . $first_name . "', '" . $last_name . "', null, '" . $city . "')";
    }
    mysqli_query($db, $sql);
    $user_id = mysqli_insert_id($db);
    setcookie('user_id', $user_id, time() + (86400 * 30), "/");
    setcookie('user_type', $type, time() + (86400 * 30), "/");

    return $user_id;
}

function getUser($id, $db)
{
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) === 1) {
        return mysqli_fetch_array($result);
    }
    return null;
}

function deleteUser($id, $db)
{
    $sql = "DELETE FROM users WHERE id = $id";
    mysqli_query($db, $sql);
}
