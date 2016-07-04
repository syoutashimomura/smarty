<?php
require_once("common.php");
$smarty =& getSmartyObj();

// $stmt = $db->query("select * from mail");
// $mail = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $smarty->assign('mail',$mail);
$errors = null;
$smarty->assign('errors',$errors);

$smarty->assign('msg_tpl' , 'login.tpl');
$smarty->display('msg.tpl');

 ?>
