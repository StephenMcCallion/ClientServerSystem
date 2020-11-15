<?php

class Posts
{
    protected $post_id, $user_id, $post_subject, $post_text, $post_image, $post_date;

    /**
     * Posts constructor.
     * @param $post_id
     * @param $user_id
     * @param $post_subject
     * @param $post_text
     * @param $post_image
     * @param $likes
     * @param $views
     * @param $post_date
     */
    public function __construct($dbRow)
    {
        $this->post_id = $dbRow['post_id'];
        $this->user_id = $dbRow['user_id'];
        $this->post_subject = $dbRow['post_subject'];
        $this->post_text = $dbRow['post_text'];
        $this->post_image = $dbRow['post_image'];
        $this->post_date = $dbRow['post_date'];
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getPostSubject()
    {
        return $this->post_subject;
    }

    /**
     * @return mixed
     */
    public function getPostText()
    {
        return $this->post_text;
    }

    /**
     * @return mixed
     */
    public function getPostImage()
    {
        return $this->post_image;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_date;
    }


}