<?php

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;

    public function findOneByUsername(string $username) : ?UserDTO;

    public function findOne(int $id): ?UserDTO;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll() : \Generator;

}