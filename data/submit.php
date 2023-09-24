<?php

require_once '../getDB.php';

if(isset($_POST['title'])){
    $stmt = $conn->prepare("INSERT INTO $db_name.list (id, done, Title) VALUES (:id, :done, :title)");

    $done = 0;
    $title = $_POST['title'];
    $id = uuid_to_bin(guidv4());


    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':done', $done);
    $stmt->bindParam(':title', $title);

    
    $res = $stmt->execute();

    header("Location: ./data.php");

    $conn = null;
    exit();
}

function guidv4($data = null)
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function uuid_to_bin($uuid)
{
    return pack("H*", str_replace('-', '', $uuid));
}
