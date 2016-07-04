<?php
require_once("common.php");

    try {
        $class = new \MyApp\Syouta();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

$smarty =& getSmartyObj();


//エラー処理
$errors = $class->validate2();
if(!empty($errors)){
    $smarty->assign('msg_tpl' , 'login.tpl');

    $smarty->assign('errors','$errors');

}else{
    $smarty->assign('msg_tpl' , 'kanrigamen.tpl');
    $user = $class->user;
    $smarty->assign('user',$user);

    $params = $class->select();
    $i = $params["i"];
    // $delete = $class->_delete($id);
    $smarty->assign('i',$i-1);
    $smarty->assign('params',$params);
}

$smarty->display('msg.tpl');
 ?>
