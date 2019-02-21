<?php /** @var \App\Data\TaskDTO[] $data */ ?>

<h1>All Items</h1>

<a href="add_task.php">Add new task</a> |
    <a href="profile.php">Profile</a>   |
    <a href="logout.php">logout</a> <br /><br />

<table border="1">
    <thead>
        <tr>
            <td>Title</td>
            <td>Category</td>
            <td>Price</td>
            <td>Username</td>
            <td>Location</td>
            <td>Phone</td>
            <td>Edit</td>
            <td>Delete</td>
            <td>View</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $task): ?>
        <tr>
            <td><?= $task->getTitle() ?></td>
            <td><?= $task->getCategory()->getName(); ?></td>
            <td><?= $task->getPrice()?></td>
            <td><?= $task->getAuthor()->getUsername(); ?></td>
            <td><?= $task->getAuthor()->getLocation()?></td>
            <td><?= $task->getAuthor()->getPhone()?></td>
            <td><a href="edit_task.php?id=<?= $task->getId(); ?>">Edit item</a></td>
            <td><a href="delete_task.php?id=<?= $task->getId(); ?>">Delete item</a></td>
            <td><a href="view_task.php?id=<?= $task->getId()?>">Details</a> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>