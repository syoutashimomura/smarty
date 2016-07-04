<?php
    //共通の設定を読み込む
    require_once('common.php');

        try {
            $class = new \MyApp\Syouta();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $smarty =& getSmartyObj();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
                $params = $class->Params();

                $params['city_str'] = $_POST['city'];
                $params['sex_str'] = $_POST['sex'];
                $params['am'] = $_POST['am'];
                $params['pm'] = $_POST['pm'];

                $smarty->assign('params',$params);
        }

            $smarty->assign('city',$city);
            $smarty->assign('sex',$sex);
            $smarty->assign('am',$am);
            $smarty->assign('pm',$pm);

    //form.tplを表示
        $smarty->assign('content_tpl' , 'form.tpl');
        /*$smarty->assign('mgs','<a href = "mgs.php" id="mgs" class="btn btn-primary" data-toggle="modal">管理画面</a>');*/
        $smarty->display('mail_form.tpl');

?>
