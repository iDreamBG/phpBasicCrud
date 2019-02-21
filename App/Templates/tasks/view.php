<?php /** @var \App\Data\TaskDTO[] $data */ ?>
<h1>VIEW ITEM</h1>
<a href="profile.php">My Profile</a>

Title: <input value="<?= $data ?>" type="text" name="title" minlength="3"
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