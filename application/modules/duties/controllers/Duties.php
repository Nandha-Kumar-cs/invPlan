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

 use PHPMailer\PHPMailer\PHPMailer;
class Duties extends Admin_Controller
{
    /**
     * Projects constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function create_duties($page=0){
   
        $clients = $this->db->select('client_name')->from('ip_clients')->get();
        $data['clients'] = $clients->result();
        $this->layout->buffer('content', 'duties/index',$data);
        $this->layout->render();
    }

     public function create_duty() {
        $company_name =  $this->input->post('comp_name');
        $customer_name = $this->input->post('cust_name');
        $reporting_adress = $this->input->post('report_address');
        $trip_date = $this->input->post('trip_date');
        $booked_by = $this->input->post('booked_by');
        $vehicle_no = $this->input->post('vehicle_no');
        $vehicle_type = $this->input->post('vehicle_type');
        $driver_name = $this->input->post('driver_name');
        $mobile_no = $this->input->post('mobile_no');
        $staring_km = $this->input->post('staring_km');
        $closing_km = $this->input->post('closing_km');
        $staring_time = $this->input->post('staring_time');
        $closing_time = $this->input->post('closing_time');
        $total_km = $this->input->post('total_km');
        $total_time = $this->input->post('total_time');
        $salutination = $this->input->post('salutination');

        if ($customer_name != '' && $salutination == '') {
            // Set flashdata for the alert message
            $this->session->set_flashdata('alert', 'Salutination cannot be empty');
            

            // Redirect back to the form page
            redirect(site_url('duties/create_duties'));
        }

        $this->db->select('COUNT(*) as date_count');
        $this->db->from('ip_duties');
        $this->db->where('DATE(trip_date)', $trip_date);
        $query = $this->db->get();
        $dateexists = $query->row_array();
        $count = $dateexists['date_count'] + 1;
      
$newFormat = date("dmY", strtotime($trip_date));
$date = 'MTT-'.$newFormat.'-'.$count;

     
 $insert_data = [
    'comp_name' => $company_name,
    'salutination' => $salutination,
    'cust_name'=>$customer_name,
    'reporting_address'=> $reporting_adress,
    'trip_date'=> $trip_date,
    'booked_by'=> $booked_by,
    'vehicle_no'=> $vehicle_no,
    'vehicle_type'=>$vehicle_type ,
    'driver_name'=>$driver_name ,
    'mobile_number'=>$mobile_no ,
    'starting_km'=>$staring_km ,
    'closing_km'=> $closing_km,
    'starting_time'=> $staring_time,
    'closing_time'=>$closing_time ,
    'total_km'=> $total_km,
    'total_time'=> $total_time,
    'duty_no'=> $date,
    
 ];
 $insert = $this->db->insert('ip_duties', $insert_data);
 $duties_id = $this->db->insert_id();

 if ($insert) {
    $url = site_url("duties/pdfgen/") . $duties_id;
    echo '<script>window.open("' . $url . '", "_blank");</script>';
    echo '<script>window.location.href = "' . site_url('duties/viewduties') . '";</script>';
} else {
    echo "<script>alert('something went wrong');</script>";
    redirect('duties/viewduties');
}
}


public function pdfgen($duties_id){


    $query =  $this->db->select('*')->where('id',$duties_id)->from('ip_duties')->get();
    $data['duties'] = $query->row(); 
       $this->load->view('duties/pdfgen', $data);
    

}


public function viewduties(){
    
    $query =  $this->db->select('*')->from('ip_duties')->get();
    $data['duties'] = $query->result();
    $this->layout->buffer('content', 'duties/viewduties',$data);
    $this->layout->render(); 
  
}


public function edit_duty($id){

    $query =  $this->db->select('*')->where('id',$id)->from('ip_duties')->get();
    $data['duties'] = $query->row(); 
    //    $this->load->view('duties/edit_duty', $data);
    $clients = $this->db->select('client_name')->from('ip_clients')->get();
    $data['clients'] = $clients->result();
       $this->layout->buffer('content', 'duties/edit_duty',$data);
       $this->layout->render();

}

public function edit_save_duty($id){
    $company_name =  $this->input->post('comp_name');
    $customer_name = $this->input->post('cust_name');
    $reporting_adress = $this->input->post('report_address');
    $trip_date = $this->input->post('trip_date');
    $booked_by = $this->input->post('booked_by');
    $vehicle_no = $this->input->post('vehicle_no');
    $vehicle_type = $this->input->post('vehicle_type');
    $driver_name = $this->input->post('driver_name');
    $mobile_no = $this->input->post('mobile_no');
    $staring_km = $this->input->post('staring_km');
    $closing_km = $this->input->post('closing_km');
    $staring_time = $this->input->post('staring_time');
    $closing_time = $this->input->post('closing_time');
    $total_km = $this->input->post('total_km');
    $total_time = $this->input->post('total_time');
    $salutination = $this->input->post('salutination');

    if ($customer_name != '' && $salutination == '') {
        // Set flashdata for the alert message
        $this->session->set_flashdata('alert', 'Salutination cannot be empty');
        

        // Redirect back to the form page
        redirect(site_url('duties/create_duties'));
    }


  


 
$insert_data = [
'comp_name' => $company_name,
'salutination' => $salutination,
'cust_name'=>$customer_name,
'reporting_address'=> $reporting_adress,
'trip_date'=> $trip_date,
'booked_by'=> $booked_by,
'vehicle_no'=> $vehicle_no,
'vehicle_type'=>$vehicle_type ,
'driver_name'=>$driver_name ,
'mobile_number'=>$mobile_no ,
'starting_km'=>$staring_km ,
'closing_km'=> $closing_km,
'starting_time'=> $staring_time,
'closing_time'=>$closing_time ,
'total_km'=> $total_km,
'total_time'=> $total_time,


];
$this->db->where('id', $id);
$update = $this->db->update('ip_duties', $insert_data);

// $duties_id = $this->db->insert_id();

if ($update) {
$url = site_url("duties/pdfgen/") . $id;
echo '<script>window.open("' . $url . '", "_blank");</script>';
echo '<script>window.location.href = "' . site_url('duties/viewduties') . '";</script>';
} else {
echo "<script>alert('something went wrong');</script>";
redirect('duties/viewduties');
}
}



public function delt_duty($id){

    $this->db->where('id', $id);
    $delete = $this->db->delete('ip_duties');


    if($delete){
        echo "<script>alert('Record Deleted Sucessfully');</script>";
        echo '<script>window.location.href = "' . site_url('duties/viewduties') . '";</script>';
        // redirect('duties/viewduties');
    }else{
        echo "<script>alert('something went wrong');</script>";
        echo '<script>window.location.href = "' . site_url('duties/viewduties') . '";</script>';
    }


}

}