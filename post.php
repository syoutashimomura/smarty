<?php
    require_once('common.php');

        try {
            $class = new \MyApp\Syouta();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    $smarty =& getSmartyObj();
    //POSTが渡ってきたら
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $params = $class->Params();
        }

    //エラーチェック
        $errors = $class->validate();
        if (!empty($errors)) {
        //エラーだったらフォーム画面に戻す
            $smarty->assign('content_tpl','form.tpl');

            $params['errors'] = $errors;
            $params['city_str'] = $_POST['city'];

            $smarty->assign('city',$city);
            $smarty->assign('sex',$sex);
            $smarty->assign('am',$am);
            $smarty->assign('pm',$pm);
            $smarty->assign('mgs','<a href = "mgs.php" id="mgs">管理画面</a>');

        }else{
          //エラーがなかったら確認画面にうつる
          $smarty->assign('content_tpl','post.tpl');

        $a = $_POST["am"][0];
        $p = $_POST["pm"][0];

          $params['city'] = $city[$_POST['city']];
          $params['city_str'] = $_POST['city'];
          $params['sex_str'] = $sex[$_POST['sex']];
          $params['am_str'] = $a;
          $params['pm_str'] = $p;
        }

    $smarty->assign('params',$params);
    $smarty->display('mail_form.tpl');

?>
