<?php

require_once 'helpers.php';

if (isset($_POST['logout'])) {
    logout();
}
redirect('index.php');
