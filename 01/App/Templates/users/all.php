<?php /** @var \App\Data\UserDTO[] $data */ ?>

<table border="1">
    <thead>
    <tr>
        <td>Id</td>
        <td>Username</td>
        <td>FullName</td>
    </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $user): ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getFirstName() . " " . $user->getLastName() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<a href="dashboard.php">Back</a>