<?php

namespace Models;

class UsersModel extends Model
{
    protected string $table = 'users';

    protected int $id;
    protected string $email;
    protected string $password;



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UsersModel
     */
    public function setId(int $id): UsersModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UsersModel
     */
    public function setEmail(string $email): UsersModel
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UsersModel
     */
    public function setPassword(string $password): UsersModel
    {
        $this->password = $password;
        return $this;
    }

}