<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>Welcome, <?= $data->getUsername() ?></h1>


<a href="add_task.php">Add new item</a> |
<a href="all.php">All users</a>     |
<a href="logout.php">logout</a> <br /><br />
<a href="all_tasks.php">All item</a>
