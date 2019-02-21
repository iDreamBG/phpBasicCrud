<?php /** @var \App\Data\UserDTO[] $data */ ?>
<h1>All Users</h1>
<a href="profile.php">My Profile</a>
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
            <td><?= $user->getFirstName() . " " . $user->getLocation() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
