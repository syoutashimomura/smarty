<?php

    namespace MyApp;

    class Syouta{
        private $_db;
        public $user;
        public $ps;

        public function __construct(){
            $this->_connectDB();
        }

    //paramsにPOSTデータ代入
        public function Params(){
            $params = array(
                'name'   => $_POST['name'],
                'kana'   => $_POST['kana'],
                'sex'    => $_POST['sex'],
                'city'   => $_POST['city'],
                'email'  => $_POST['email'],
                'tel'    => $_POST['tel'],
                'am'     => $_POST['am'],
                'pm'     => $_POST['pm'],
                'naiyou' => $_POST['naiyou']
                );
                return $params;
        }

    //db selectメソッド
        public function select(){
            $p = $this->_db->query("select * from users");
            $i = 0;
                while ($r = $p->fetch()){
                    $params['id'][] = $r['id'];
                    $params['name'][] = $r['name'];
                    $params['kana'][] = $r['kana'];
                    $params['sex'][] = $r['sex'];
                    $params['city'][] = $r['city'];
                    $params['email'][] = $r['email'];
                    $params['tel'][] = $r['tel'];
                    $params['am'][] = $r['am'];
                    $params['pm'][] = $r['pm'];
                    $params['naiyou'][] = $r['naiyou'];
                    $i++;
                }
                $params["i"]=$i;
                return $params;
        }


    //validate2
        public function validate2(){
            $this->user = htmlspecialchars($_POST['user']);
            $this->ps = htmlspecialchars($_POST['ps']);
            $errors = array();

                if (empty($_POST['user']) || DB_USERNAME !== $this->user) {
                  $errors['user'] = true;
                }
                if (empty($_POST['ps']) || DB_PASSWORD !== $this->ps) {
                  $errors['ps'] = true;
                }
                return $errors;
        }//validate2 end

    //問い合わせ処理
        public function mail_db(){
            try {
                //POST確認
                    $this->_post();
                //mail送信処理
                    $this->_mail();
                //dbに情報を格納
                    $this->_save();
                //redirect to fin.php
                    $params['mail'] = "送信成功";
                    header("Location: /syouta/db_syouta/fin.php");
            } catch (\Exception $e) {
                //set error
                $error = $e->getMessage();
            }
            return $error;
        }

    //_postメソッド
        private function _post(){
            if (!isset($_POST)) {
                throw new \Exception("POST NULL!!");
            }
        }

        public function post(){
            if (!isset($_POST["mode"])) {
                throw new \Exception("mode not set!");
            }
            switch($_POST["mode"]){
                case "delete":
                    return $this->_delete();
            }
        }

    //_mailメソッド
        private function _mail(){
            $params = $this->Params();
            if(!mb_send_mail($params['email'],"件名",$params['name'].$params['kana'].$params['sex'].
            $params['city'].$params['email'].$params['tel'].$params['am'].$params['pm'].$params['naiyou']) &&
            !mb_send_mail($_POST['kanri'],"件名",$params['name'].$params['kana'].$params['sex'].
            $params['city'].$params['email'].$params['tel'].$params['am'].$params['pm'].$params['naiyou'])){
                throw new \Exception("Sending failed!!");
            }
        }

    //問い合わせ情報挿入
        private function _save(){
            $params = $this->Params();
            $sql = "insert into users (name,kana,sex,city,email,tel,am,pm,naiyou)
                values (:name, :kana, :sex, :city, :email, :tel, :am, :pm, :naiyou)";

            $stmt = $this->_db->prepare($sql);
            $stmt->bindValue(":name", $params['name'],\PDO::PARAM_STR);
            $stmt->bindValue(":kana", $params['kana'],\PDO::PARAM_STR);
            $stmt->bindValue(":sex", $params['sex'],\PDO::PARAM_STR);
            $stmt->bindValue(":city", $params['city'],\PDO::PARAM_STR);
            $stmt->bindValue(":email", $params['email'],\PDO::PARAM_STR);
            $stmt->bindValue(":tel", $params['tel'],\PDO::PARAM_STR);
            $stmt->bindValue(":am", $params['am'],\PDO::PARAM_STR);
            $stmt->bindValue(":pm", $params['pm'],\PDO::PARAM_STR);
            $stmt->bindValue(":naiyou", $params['naiyou'],\PDO::PARAM_STR);

            try {
                $stmt->execute();
            } catch (\PDOException $e) {
                throw new \Exception("No more vote for today!");
            }

        }

    //db接続
        private function _connectDB(){
            try{
                $this->_db = new \PDO(DSN,DB_USERNAME,DB_PASSWORD);
                $this->_db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            }catch(\PDOException $e){
                throw new \Exception("Failed to connect DB");
            }
        }

    //validate
        public function validate(){
          $errors = array();

          if (empty($_POST['name']) || $_POST["name"] === " ") {
            $errors['name'] = true;
          }
          if (empty($_POST['kana'])) {
            $errors['kana'] = true;
          }


          $kana = "/^[ァ-ヶー゛゜ 　]+$/u";
            if(!preg_match($kana, $_POST['kana'])){
                $errors["katakana"] = true;
            }

          $regex = '/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i';
              if(!preg_match($regex,$_POST['email'])){
                $errors['email'] = true;
              }

          if (empty($_POST['tel'])) {
            $errors['tel'] = true;
          }else{
            $tel = mb_convert_kana($_POST['tel'], "n", "UTF-8");
              if(strpos($tel,"-")===false){//ハイフンなし
                  if (!preg_match("/(^(?<!090|080|070)\d{10}$)|(^(090|080|070)\d{8}$)|(^0120\d{6}$)|(^0080\d{7}$)/", $tel)) {
                      $errors['tel'] = true;
                  }
                  //ハイフンあり
                }elseif(!preg_match("/(^(?<!090|080|070)(^\d{2,5}?\-\d{1,4}?\-\d{4}$|^&#91;\d\-&#93;{12}$))|(^(090|080|070)(\-\d{4}\-\d{4}|&#91;\\d-&#93;{13})$)|(^0120(\-\d{2,3}\-\d{3,4}|&#91;\d\-&#93;{12})$)|(^0080\-\d{3}\-\d{4})/", $tel)){
                      $errors['tel'] = true;
                  }
          }
            return $errors;
        }//validate.end

        private function _delete(){
            if (!isset($_POST["id"])) {
                throw new \Exception("[delete] id not set!");
            }


            $sql = sprintf("delete from users where id = %d",$_POST["id"]);
            $stmt = $this->_db->prepare($sql);
            $stmt->execute();

            return [];

        }


    }

 ?>
