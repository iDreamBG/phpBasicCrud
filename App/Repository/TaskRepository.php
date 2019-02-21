<?php

namespace App\Repository;


use App\Data\CategoryDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll(): \Generator
    {
       $lazyTaskResult = $this->db->query("
            SELECT 
              tasks.id AS task_id, 
              title, 
              price,
              description, 
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.location,
              users.phone,
              categories.id AS category_id,
              categories.name,
              image
            FROM tasks
            INNER JOIN users users ON tasks.user_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            ORDER BY  tasks.id ASC
        ")->execute()
            ->fetch();

        foreach ($lazyTaskResult as $row){

            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($row, TaskDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);
            /** @var CategoryDTO $category */
            $category = $this->dataBinder->bind($row, CategoryDTO::class);

            $task->setId($row['task_id']);
            $author->setId($row['author_id']);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $row = $this->db->query("
            SELECT 
              tasks.id AS task_id, 
              title, 
              price,
              description, 
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.location,
              categories.id AS category_id,
              categories.name,
              image
            FROM tasks
            INNER JOIN users users ON tasks.user_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            WHERE tasks.id = ?
            ORDER BY  tasks.id ASC
        ")->execute([$id])
            ->fetch()
            ->current();

        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

        $task->setId($row['task_id']);
        $author->setId($row['author_id']);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        $this->db->query("
                INSERT INTO tasks (title, price, description, user_id, category_id, image) 
                VALUES (?,?,?,?,?,?)
            ")->execute([
                $taskDTO->getTitle(),
                $taskDTO->getPrice(),
                $taskDTO->getDescription(),
                $taskDTO->getAuthor()->getId(),
                $taskDTO->getCategory()->getId(),
                $taskDTO->getImage()
        ]);

        return true;
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $this->db->query("
                UPDATE tasks
                SET 
                  title = ?,
                  price = ?,
                  description = ?,
                  user_id = ?,
                  category_id = ?,
                  image = ?
                WHERE id = ?  
            ")->execute([
                $taskDTO->getTitle(),
                $taskDTO->getPrice(),
                $taskDTO->getDescription(),
                $taskDTO->getAuthor()->getId(),
                $taskDTO->getCategory()->getId(),
                $taskDTO->getImage(),
                $id
        ]);

        return true;
    }

    public function remove(int $id): bool
    {
       $this->db->query("DELETE FROM tasks WHERE id = ?")->execute([$id]);
       return true;
    }


    public function myItems():TaskDTO
    {
        $row = $this->db->query("
            SELECT 
              tasks.id AS task_id, 
              title, 
              price,
              description, 
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.location,
              categories.id AS category_id,
              categories.name,
              image
            FROM tasks
            INNER JOIN users users ON tasks.user_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            WHERE users.id = ?
            ORDER BY  users.id ASC
        ")->execute([$id])
            ->fetch()
            ->current();

        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

        $task->setId($row['task_id']);
        $author->setId($row['author_id']);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }
}