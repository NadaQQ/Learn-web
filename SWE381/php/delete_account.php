<?php

require_once 'helpers.php';
require_once 'user.php';
require_once 'tutor.php';

if (isset($_POST['delete_parent'])) {
    $user_id = currentUserId();
    logout();
    require_once 'db_connection.php';
    deleteUser($user_id, $db);
} else if (isset($_POST['delete_tutor'])) {
    $user_id = currentUserId();
    logout();
    require_once 'db_connection.php';
    deleteUser($user_id, $db);
    deleteTutor($user_id, $db);
}
redirect('index.php');
