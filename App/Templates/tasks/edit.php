<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Edit Item "<?= $data->getTask()->getTitle(); ?>"</h1>
<a href="profile.php">My Profile</a>
<form method="post">
    Title: <input value="<?= $data->getTask()->getTitle(); ?>" type="text" name="title" minlength="3"
                  maxlength="50"/><br/>
    Price: <input value="<?= $data->getTask()->getPrice()?>" type="number" name="price"><br>
    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if ($data->getTask()->getCategory()->getId() === $category->getId()) : ?>
                <option selected="selected" value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>

    Description: <input value="<?= $data->getTask()->getDescription(); ?>" type="text" name="description" minlength="3"
                        maxlength="50"/><br/>
    Image URL: <input value="<?= $data->getTask()->getImage()?>" type="text" name="image">
    <input type="submit" name="save" value="Save"/><br/>
</form>
<img src="<?= $data->getTask()->getImage();?>" width="250" height="150">
<br>