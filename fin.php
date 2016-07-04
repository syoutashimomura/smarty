<?php
mb_language("japanese");
mb_internal_encoding("UTF-8");

require_once('common.php');
$smarty =& getSmartyObj();


    $completion = "送信完了";
    $smarty->assign('com',$completion);
    $smarty->assign('top','<a href="index.php">TOP</a>');

    $smarty->display('fin.tpl');

 ?>
