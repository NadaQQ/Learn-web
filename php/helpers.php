<?php

function redirect(String $page)
{
    echo "<script>window.location.href='" . $page . "'</script>";
}

function alertMessage($message)
{
    echo "<script>alert('" . $message . "')</script>";
}

function isLoggedIn()
{
    return isset($_COOKIE['user_id']);
}

function isUserParent()
{
    if ($_COOKIE['user_type'] === 'tutor') {
        return false;
    }

    return true;
}

function isUserTutor()
{
    if ($_COOKIE['user_type'] === 'parent') {
        return false;
    }

    return true;
}

function currentUserId()
{
    return $_COOKIE['user_id'];
}

function logout()
{
    setcookie('user_id', null, time() - 3600, "/");
    setcookie('user_type', null, time() - 3600, "/");
    unset($_COOKIE['user_id']);
    unset($_COOKIE['user_type']);
}
