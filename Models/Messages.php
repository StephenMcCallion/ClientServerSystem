<?php


class Messages
{
    protected $messageID, $message, $sentBy, $sentTo, $messageDate;

    /**
     * Messages constructor.
     * @param $messageID
     * @param $message
     * @param $sentBy
     * @param $sentTo
     * @param $messageDate
     */
    public function __construct($dbRow)
    {
        $this->messageID = $dbRow['message_id'];
        $this->message = $dbRow['message'];
        $this->sentBy = $dbRow['sent_by'];
        $this->sentTo = $dbRow['sent_to'];
        $this->messageDate = $dbRow['message_date'];
    }

    /**
     * @return mixed
     */
    public function getMessageID()
    {
        return $this->messageID;
    }

    /**
     * @param mixed $messageID
     */
    public function setMessageID($messageID): void
    {
        $this->messageID = $messageID;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getSentBy()
    {
        return $this->sentBy;
    }

    /**
     * @param mixed $sentBy
     */
    public function setSentBy($sentBy): void
    {
        $this->sentBy = $sentBy;
    }

    /**
     * @return mixed
     */
    public function getSentTo()
    {
        return $this->sentTo;
    }

    /**
     * @param mixed $sentTo
     */
    public function setSentTo($sentTo): void
    {
        $this->sentTo = $sentTo;
    }

    /**
     * @return mixed
     */
    public function getMessageDate()
    {
        return $this->messageDate;
    }

    /**
     * @param mixed $messageDate
     */
    public function setMessageDate($messageDate): void
    {
        $this->messageDate = $messageDate;
    }

}