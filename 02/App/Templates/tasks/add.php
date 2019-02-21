<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Add new item</h1>
<a href="profile.php">My Profile</a>

<form method="post">
    Title: <input type="text" name="title" minlength="3" maxlength="50"/><br />
    Price: <input type="number"  name="price"><br>
    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category): ?>
        <option value="<?=$category->getId(); ?>"><?= $category->getName(); ?></option>
        <?php endforeach; ?>
    </select><br />

    Description: <input type="text" name="description" minlength="10" maxlength="10000"/><br />
    Image URL: <input type="text" name="image"><br>
    <input type="submit" name="save" value="Add"/><br />
</form>