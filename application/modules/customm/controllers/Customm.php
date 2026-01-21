<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customm extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pendinglist()
    {
        $this->layout->buffer('content', 'customm/pendinglist');
        $this->layout->render();
    }

    public function pendinglist_v2()
    {
        $this->layout->buffer('content', 'customm/pendinglist-v2');
        $this->layout->render();
    }

}
