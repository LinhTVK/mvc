<?php
namespace MVC\Core;
use MVC\Config\Database;
use PDO;
use MVC\Core\Model;
    /**
    * Class ResourceModel
    * Task CRUD
    */
    class ResourceModel implements ResourceModelInterface{
        private $table;
        private $id;
        private $model;

        /**
        * Standard resource model initialization
        *
        * @param string $table
        * @param string $id
        * @param object $model
        * @return void
        */
        public function _init($table, $id, $model) {
            $this->table = $table;
            $this->id = $id;
            $this->model = $model;
        }

        /**
        * Standard resource model get all data
        *
        * @return void
        */
        public function getAll() {
            $class = get_class($this->model);
            // var_dump($this->model);
            $sql = "SELECT * FROM $this->table";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return ($req->fetchAll(PDO::FETCH_CLASS, $class));
        }

        /**
        * Standard resource model get by id
        *
        * @param int $id
        * @return void
        */
        public function get($id) {
            $class = get_class($this->model);
            $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return ($req->fetchObject($class));
        }

        /**
        * Standard resource model save by object
        *
        * @param object $model
        * @return void
        */
        public function save($model) {
            $arrModel = $model->getProperties();
            $id = $arrModel[$this->id];
            unset($arrModel[$this->id]);
            // echo"<pre>";
            // var_dump($arrModel);
            $arrKey = array_keys($arrModel);
            // echo"<pre>";
            // var_dump($arrKey);
            $strModel = "";
            foreach ($arrKey as $key => $value) {
                $strModel .= $value;
                $strModel .= " = :".$value;
                $strModel .= ", ";
            }
            $strModel = rtrim($strModel, ", ");

            if($id == null){
                // die("and");
                // var_dump($arrModel);
                $sql = "INSERT INTO $this->table SET $strModel";
            }
            else {
                // die("amd");
                
                $sql = "UPDATE $this->table SET $strModel WHERE $this->id = $id";
                // echo $sql;
                // die();
            }
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($arrModel);
        }

        public function delete($id) {
            $class = get_class($this->model);
            $sql = "DELETE FROM $this->table WHERE $this->id = $id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute();
        }
    }
?>
