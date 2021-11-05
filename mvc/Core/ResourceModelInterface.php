<?php
namespace MVC\Core;
	/**
	* Task CRUD Interface
	*/
    interface ResourceModelInterface
    {
    	/**
        * Standard resource model initialization
        *
        * @param string $table
        * @param string $id
        * @param object $model
        * @return void
        */
        public function _init($table,$id,$model);

        /**
        * Standard resource model save
        *
        * @param object $model
        * @return void
        */
        public function save($model);

        /**
        * Standard resource model delete
        *
        * @param object $model
        * @return void
        */
        public function delete($model);
    }
?>
