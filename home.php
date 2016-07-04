<?php
require_once('common.php');

$smarty =& getSmartyObj();

$smarty->assign('content_tpl' , 'home.tpl');
$smarty->display('mail_form.tpl');

 ?>
