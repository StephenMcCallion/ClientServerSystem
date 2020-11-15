<?php

class Friends
{
    protected $friendID, $user1, $user2, $userDate;

    /**
     * Friends constructor.
     * @param $friendID
     * @param $user1
     * @param $user2
     * @param $userDate
     */
    public function __construct($dbRow)
    {
        $this->friendID = $dbRow['friend_id'];
        $this->user1 = $dbRow['friend1'];
        $this->user2 = $dbRow['friend2'];
        $this->userDate = $dbRow['friendship_date'];
    }

    /**
     * @return mixed
     */
    public function getFriendID()
    {
        return $this->friendID;
    }

    /**
     * @return mixed
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * @return mixed
     */
    public function getUser2()
    {
        return $this->user2;
    }

    /**
     * @return mixed
     */
    public function getUserDate()
    {
        return $this->userDate;
    }



}