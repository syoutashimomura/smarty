<?php
require_once("common.php");
$smarty =& getSmartyObj();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $user["id"] = $_POST["id"];
    $user["name"] = $_POST["name"];
    $user["kana"] = $_POST["kana"];
    $user["sex"] = $_POST["sex"];
    $user["city"] = $_POST["city"];
    $user["email"] = $_POST["email"];
    $user["tel"] = $_POST["tel"];
    $user["am"] = $_POST["am"];
    $user["pm"] = $_POST["pm"];
    $user["naiyou"] = $_POST["naiyou"];
    $smarty->assign("user",$user);

}



    $smarty->assign('msg_tpl' , 'detail.tpl');
    $smarty->display('msg.tpl');
 ?>
