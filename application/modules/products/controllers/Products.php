<?php

// $db_username="u225552550_inv";
// $db_host="u225552550_inv";
// $db_password="Inv@12345";
// $conn=new mysqli("localhost", "$db_host", "$db_password", "$db_username"); 
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }


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
 * Class Products
 */
class Products extends Admin_Controller
{
    /**
     * Products constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_products');
    }

    /**
     * @param int $page
     */
    public function index($page = 0)
    {
        $this->mdl_products->paginate(site_url('products/index'), $page);
        $products = $this->mdl_products->result();

        $this->layout->set('products', $products);
        $this->layout->buffer('content', 'products/index');
        $this->layout->render();
    }

    /**
     * @param null $id
     */
    
    public function form($id = null)
    {
        if ($this->input->post('btn_cancel')) {
            redirect('products/index');
        }

        if ($this->mdl_products->run_validation()) {
            // Get the db array
        include('./config.php');
          
            $price_val = $this->input->post('price_val');
            $product_price_input = $this->input->post('product_price');
            $EURO2_input = $this->input->post('EURO');
            $USD2_input = $this->input->post('USD');
            $othersone_input = $this->input->post('others');
            $otherstwo_input = $this->input->post('others2');

            $india = str_replace(',', '', $product_price_input);
            
            
            $german = str_replace(',', '', $EURO2_input);
            
            $america = str_replace(',', '', $USD2_input);
            
            $another = str_replace(',', '', $othersone_input);
            
            $another2 = str_replace(',', '', $otherstwo_input);
            
          

            if($id==null){
                    
                $db_array = $this->mdl_products->db_array();
                unset($db_array['price_val']);
                $pid = $this->mdl_products->save($id, $db_array);
                       
                      
                   
                        
                       $insertQuery = "INSERT INTO `price_changes`(`price_name`,`price_value`,`product_id`,`price_time`) VALUES (?,?,?,NOW())";
                       $insertStatement = $conn->prepare($insertQuery);
                      
                      
                      
                      
                           $priceName = 'INR';
                           $priceValue = $india;
                           $productID = $pid;
                           $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                           $run2 = $insertStatement->execute();
                    
                           $priceName = 'EURO';
                           $priceValue = $german;
                           $productID = $pid;
                           $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                           $run3 = $insertStatement->execute();
                   
                           $priceName = 'USD';
                           $priceValue = $america;
                           $productID = $pid;
                           $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                           $run4 = $insertStatement->execute();
               
                          $priceName = 'others1';
                          $priceValue = $another;
                          $productID = $pid;
                          $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                          $run5 = $insertStatement->execute();
                    
                          $priceName = 'others2';
                          $priceValue = $another2;
                          $productID = $pid;
                          $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                          $run6 = $insertStatement->execute();
                       
                       
                       // Close the prepared statement and database connection
                       $insertStatement->close();
                       $conn->close();
                      



            }elseif( $price_val=='1' ){

           

            $check_query ="SELECT `product_price`,`EURO`,`USD`,`others`,`others2` FROM ip_products where product_id = ?";
            $prepare_check = $conn->prepare($check_query);
            $prepare_check->bind_param('i',$id);
            $prepare_check->execute();

            $prepare_check->bind_result($product_price, $euro, $usd, $others, $others2);
            $prepare_check->fetch();
            $prepare_check->reset();
             
            $insertQuery = "INSERT INTO `price_changes`(`price_name`,`price_value`,`product_id`,`price_time`) VALUES (?,?,?,NOW())";
            $insertStatement = $conn->prepare($insertQuery);


  
            if($product_price!=$product_price_input){
                $priceName = 'INR';
                $priceValue = $india;
                $productID = $id;
                $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                $run2 = $insertStatement->execute();
            }
            
            if($euro!=$EURO2_input){
                $priceName = 'EURO';
                $priceValue = $german;
                $productID = $id;
                $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                $run3 = $insertStatement->execute();

            }

            if($usd!=$USD2_input){ 
                $priceName = 'USD';
                $priceValue = $america;
                $productID = $id;
                $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
                $run4 = $insertStatement->execute();
            }
            
            if($others!=$othersone_input){
               $priceName = 'others1';
               $priceValue = $another;
               $productID = $id;
               $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
               $run5 = $insertStatement->execute();
            }

            if($others2!=$otherstwo_input){
               $priceName = 'others2';
               $priceValue = $another2;
               $productID = $id;
               $insertStatement->bind_param("sdi", $priceName, $priceValue, $productID);
               $run6 = $insertStatement->execute();
            }
            
            // Close the prepared statement and database connection
            $insertStatement->close();
            $conn->close();
            
           $db_array = $this->mdl_products->db_array();
           unset($db_array['price_val']);
            $this->mdl_products->save($id, $db_array);
   
           }else{

            $db_array = $this->mdl_products->db_array();
            unset($db_array['price_val']);
             $this->mdl_products->save($id, $db_array);
           }



           redirect('products/index');
          
        }

        if ($id and !$this->input->post('btn_submit')) {
            if (!$this->mdl_products->prep_form($id)) {
                show_404();
            }
        }

        $this->load->model('families/mdl_families');
        $this->load->model('units/mdl_units');
        $this->load->model('tax_rates/mdl_tax_rates');

        $this->layout->set(
            array(
                'families' => $this->mdl_families->get()->result(),
                'units' => $this->mdl_units->get()->result(),
                'tax_rates' => $this->mdl_tax_rates->get()->result(),
            )
        );

        $this->layout->buffer('content', 'products/form');
        $this->layout->render();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->mdl_products->delete($id);
        redirect('products/index');
    }

}
