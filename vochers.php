<?php

require_once './conn.php';

$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');

switch ($method) {
    case 'GET':
        $vocherss = $connect->query('SELECT * FROM voucher')->fetch_all(MYSQLI_ASSOC);
        echo json_encode($vocherss);
        break;
    }