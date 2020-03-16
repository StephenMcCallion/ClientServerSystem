<?php


class User
{
    protected $userId, $fName, $lName, $email;

    /**
     * User constructor.
     * @param $userId
     * @param $fName
     * @param $lName
     * @param $email
     */
    public function __construct($dbRow)
    {
        $this->userId = $dbRow['user_id'];
        $this->fName = $dbRow['first_name'];
        $this->lName = $dbRow['last_name'];
        $this->email = $dbRow['email'];
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getProfilePic()
    {
        return $this->profilePic;
    }

}