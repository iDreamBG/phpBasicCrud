<?php

namespace App\Http;


use App\Data\TaskDTO;
use App\Service\TaskServiceInterface;
use App\Service\UserServiceInterface;

class HomeHttpHandler extends UserHttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if($userService->isLogged()){
            $currentUser = $userService->currentUser();
            $this->render("users/profile", $currentUser);
        }else{
            $this->render("home/index");
        }
    }

    public function dashboard(UserServiceInterface $userService){
        if(!isset($_SESSION['id'])){
            $this->redirect("login.php");
        }

        $currentUser = $userService->currentUser();

        $this->render("users/profile", $currentUser);

    }

    public function all_task(TaskServiceInterface $taskService)
    {
        if(!isset($_SESSION['id'])){
            $this->redirect("login.php");
        }

        $allTasks = $taskService->getAll();

        $this->render("tasks/all", $allTasks);
    }


}