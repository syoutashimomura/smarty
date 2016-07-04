<?php
    require_once('common.php');


        $smarty =& getSmartyObj();
            try {
                $class = new \MyApp\Syouta();
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }

        $params = $class->Params();

    // メール送信処理 db登録処理
        $error = $class->mail_db();
        $params["error"] = $error;

    $smarty->assign('top','<a href="index.php">TOP</a>');
    $smarty->assign('content_tpl','transmit.tpl');
    $smarty->assign('params',$params);

    $smarty->display('mail_form.tpl');

 ?>
