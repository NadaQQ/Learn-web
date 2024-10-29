<?php
function checkImage(array $file)
{
    $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
    $availableTypes = array('jpg', 'jpeg', 'png');
    if ($file['size'] < 1) return false;
    if ($file['size'] > 5000000) return false;
    if (!in_array($imageFileType, $availableTypes)) return false;
    return true;
}

function uploadImage(array $image)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $target_file)) return $target_file;
    else return false;
}
