<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class PO
 */
class Po extends Admin_Controller
{
    /**
     * Projects constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_po');
    }

    /**
     * @param int $page
     */
    public function add_po($page = 0)
    {
        $this->mdl_po->paginate(site_url('po/add_po'), $page);
        $this->layout->buffer('content', 'po/add_po');
        $this->layout->render();
    }

    public function view_po($page = 0)
    {
        $this->mdl_po->paginate(site_url('po/view_po'), $page);
        $this->layout->buffer('content', 'po/view_po');
        $this->layout->render();
    }

    /**
     * @param null $id
     */
}
