<?php


class User
{
    protected $userId, $fName, $lName, $email, $profilePic, $userName;

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
        $this->profilePic = $dbRow['profile_pic'];
        $this->userName = $dbRow['userName'];
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

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

}