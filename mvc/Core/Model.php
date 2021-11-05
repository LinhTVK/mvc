<?php
namespace MVC\Core;
	/**
    * Class Model
    */
    class Model
    {
    	/**
	    * Get Properties
	    *
	    * @param \Core\ResourcekModel
	    * @return Boolean
	    */
        public function getProperties() {
            return get_object_vars($this);
        }
    }
?>
