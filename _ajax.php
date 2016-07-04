<?php
    require_once('common.php');

    try {
        $class = new \MyApp\Syouta();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    $smarty =& getSmartyObj();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $res = $class->post();
            header("Content-Type: application/json");
            echo json_encode($res);
            exit;
        } catch (Exception $e) {
            header($_SERVER["SERVER_PROTOCOL"]. "500 Internal Server Error", true, 500);
            echo $e->getMessage();
            exit;
        }

    }


 ?>
