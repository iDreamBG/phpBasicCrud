<?php

namespace App\Data;

class UserDTO
{
    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 4;
    const PASSWORD_MIN_LENGTH = 6;
    const FIRST_NAME_MIN_LENGTH = 3;
    const LAST_NAME_MIN_LENGTH = 3;

    private $id;
    private $username;
    private $password;
    private $firstName;
    private $location;
    private $phone;


    public static function create($username,
                                  $password,
                                  $firstName,
                                  $lastName,
                                  $bornOn,
                                  $id = null)
    {

        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLocation($lastName)
            ->setPhone($bornOn)
            ->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return UserDTO
     * @throws \Exception
     */
    public function setUsername($username): UserDTO
    {
        PDOValidator::validate(
            self::USERNAME_MIN_LENGTH,
                self::MAX_FIELD_LENGTH,
                $username,
                "Username out of range"
            );

        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return UserDTO
     * @throws \Exception
     */
    public function setFirstName($firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return UserDTO
     * @throws \Exception
     */
    public function setLocation($location): UserDTO
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): UserDTO
    {
        $this->phone = $phone;
        return $this;
    }


}