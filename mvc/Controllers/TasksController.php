<?php
namespace MVC\Controllers;
use MVC\Core\Controller;
use MVC\Models\TaskRepository;
use MVC\Models\TaskModel;
class TasksController extends Controller
{
    function index()
    {

        $tasks = new TaskRepository();

        $data['tasks'] = $tasks->getAll();
        // echo "<pre>";
        // var_dump($data['tasks']);
        $this->set($data);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $model = new TaskModel();
            $model->setTitle($_POST["title"]);
            $model->setDescription($_POST["description"]);
            $task= new TaskRepository();

            if ($task->add($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");

        
    }

    function edit($id)
    {
        $taskModel = new TaskModel();
        $taskRepository = new TaskRepository();

        $data["task"] = $taskRepository->get($id);
        // var_dump($data);
        // die();
        if (isset($_POST["title"]))
        {
            // var_dump($_POST);
            $taskModel->setId($_POST["id"]);
            $taskModel->setTitle($_POST["title"]);
            $taskModel->setDescription($_POST["description"]);
            if ($taskRepository->add($taskModel))
            {
                // die("fnskf");
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($data);
        $this->render("edit");
    }

    function delete($id)
    {

        $task = new TaskRepository();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>