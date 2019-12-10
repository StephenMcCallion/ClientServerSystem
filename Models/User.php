<?php


class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $password
     */


    public function __construct($firstName, $lastName, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }


}