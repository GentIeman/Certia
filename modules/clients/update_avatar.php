<?php
$avatar = $_FILES["avatar"];

if ($avatar["type"] === "image/jpeg") {
    loadAvatar($avatar, $_SESSION["user"]);
} else {
    header("Location:profile.php?errorAvatarUpdate");
}

function loadAvatar($file)
{
    $type = $file["type"];
    $upload_dir = "../static/avatars/";
    $new_name = md5(microtime()) . "." . substr($type, strlen("image/"));
    $upload_file = $upload_dir . $new_name;
    if (move_uploaded_file($file["tmp_name"], $upload_file)) {
        setAvatar($new_name);
    } else {
        return false;
    }
}

function setAvatar($file)
{
    $client = R::load("clients", $_GET["user_id"]);
    $client->avatar = $file;
    R::store($client);
    header("Location:profile.php");
}