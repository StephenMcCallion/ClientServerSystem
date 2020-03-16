<?php

class Pagination extends PostsDataSet
{
    public $currentPage;
    public $per_page;
    public $total_count;

    /**
     * Pagination constructor.
     * @param $currentPage
     * @param $per_page
     * @param $total_count
     */
    public function __construct($page=1, $per_page=20, $total_count=0)
    {
        $this->currentPage = (int) $page;
        $this->per_page = (int) $per_page;
        $this->total_count = (int) $total_count;
    }

    public function offset(){
        return $this->per_page * ($this->currentPage - 1);
    }

    public function totalPages(){
        return ceil($this->total_count / $this->per_page);
    }

    public function nextPage(){
        $next = $this->currentPage +1;
        return ($next <= $this->totalPages()) ? $next : false;
    }

    public function prevPage(){
        $prev = $this->currentPage -1;
        return ($prev > 0) ? $prev : false;
    }

}