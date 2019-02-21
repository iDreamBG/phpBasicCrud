<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>USER PROFILE</h1>

<form method="POST">
    <div>
        <label>
            Username: <input type="text" value="<?= $data->getUsername() ?>" name="username">
        </label>
    </div>

    <div>
        <label>
            Password: <input type="text" name="password">
        </label>
    </div>

    <div>
        <label>
            First Name: <input type="text" value="<?= $data->getFirstName() ?>" name="firstName">
        </label>
    </div>

    <div>
        <label>
            Last Name: <input type="text" value="<?= $data->getLastName() ?>" name="lastName">
        </label>
    </div>
</form>


You can <a href="logout.php">Logout</a> or go <a href="dashboard.php">Back</a>
