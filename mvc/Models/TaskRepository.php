<?php
namespace MVC\Models;
use MVC\Core\Model;
use MVC\Config\Database;
use MVC\Models\TaskResourceModel;
use MVC\Models\TaskModel;
	/**
	* Class TaskRepository
	*/
    class TaskRepository {
    	private $taskresource;
    	public function __construct()
	    {
	        $this->taskresource = new TaskResourceModel();
	    }

	    /**
	    * Save Block data
	    *
	    * @param \MVC\Models\TaskModel $model
	    * @return Boolean
	    */
	    public function add(TaskModel $model)
	    {
	    	// die("anf");
	        return $this->taskresource->save($model);
	    }

	    /**
	    * Save Block data
	    *
	    * @param \MVC\Models\TaskModel $id
	    * @return Boolean
	    */
	    public function get(int $id): TaskModel
	    {
	        return $this->taskresource->get($id);
	    }

	    /**
	    * Save Block data
	    *
	    * @param \MVC\Models\TaskModel[]
	    * @return Boolean
	    */
	    public function getAll(): array
	    {
	        return $this->taskresource->getAll();
	    }

	    /**
	    * Save Block data
	    *
	    * @param \MVC\Models\TaskModel $id
	    * @return Boolean
	    */
	    public function delete($id): TaskModel
	    {
	        return $this->taskresource->delete($id);
	    }
	}
?>
