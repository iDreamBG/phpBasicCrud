<?php
require_once "common.php";

$taskService = new \App\Service\TaskService(new \App\Repository\TaskRepository($db, new \Core\DataBinder()));
$userService = new \App\Service\UserService(new \App\Repository\UserRepository($db));
$taskHttpHandler = new \App\Http\TaskHttpHandler($template, new \Core\DataBinder());
$taskHttpHandler->view($taskService, $userService, $_GET);