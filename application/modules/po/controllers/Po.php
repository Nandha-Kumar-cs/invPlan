<!-- Feat Pagalaven -->

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
// use PhpOffice\PhpSpreadsheet\IOFactory;


class Po extends Admin_Controller
{
    /**
     * Projects constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_po');
       $upload_url = $this->config->item('upload_url');
    }

    /**
     * @param int $page
     */
        
     public function ats_data($poid,$atsid) {
        $notes = $this->input->post('notes');
        if($atsid != 0){
        
      
        $data = array(
            'notes'=> $notes
        );

        $this->db->where('po_id', $poid);
        $this->db->where('id', $atsid);
        $this->db->update('ip_ats', $data);
            
        }else{
        
            $inputDate = $_POST['temp_date'];
            $existingDataipats = $this->db->get_where('ip_ats', array('ats_date' => $inputDate));
            
            $dateTime = new DateTime($inputDate);
            $outputDate = $dateTime->format("dmy");
            
            if($existingDataipats){
                $numRows = $existingDataipats->num_rows();
            
            
                $data = array(
               
                    'po_id' => $poid,
                    'qty' => $_POST['ats_qty'],
                    'ats_no' => 'ATS_NO_'.$outputDate.'-'.($numRows + 1) ,
                    'notes' => 'nontes',
                    'ats_status' => 'To Apply',
                    'ats_date' => $inputDate,
                    'notes'=> $notes
                );
                
                $this->db->insert('ip_ats', $data);
                $atsid = $this->db->insert_id();
            
            }else{
            
                $data = array(
               
                    'po_id' => $poid,
               
                    'qty' => $_POST['ats_qty'],
                    'ats_no' =>'ATS_NO_'.$outputDate.'-1',
                    'notes' => 'nontes',
                    'ats_status' => 'To Apply',
                    'ats_date' => $inputDate,
                    'notes'=> $notes
                );
                
                $this->db->insert('ip_ats', $data);
                $atsid = $this->db->insert_id();
            }
        
        
        }
        
        // echo  json_encode($_POST);
        
        
        
        
        $existingData = $this->db->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid ))->row();
        
        
                if ($existingData) {
                    // If the record exists, update it
                    $data = json_encode($_POST);
                    $update_data = [
                        'parameter' => $data,
                    ];
                    
                    $this->db->where('poid', $poid);
                    $this->db->where('atsid', $atsid);
                    $this->db->update('ats_data', $update_data);
                } else {
                    // If the record doesn't exist, insert a new record
                    $data = json_encode($_POST);
                    $insert_data = [
                        'poid' => $poid,
                        'atsid' => $atsid,
                        'parameter' => $data,
                    ];
            
                    $this->db->insert('ats_data', $insert_data);
        
                }
        
        
                
          
                redirect('po/list_ats');
                  
        
        
        
        
        
        
        
                
        
             
            }
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

    public function list_po($page = 0)
    {
        $this->mdl_po->paginate(site_url('po/list_po'), $page);
        $this->layout->buffer('content', 'po/list_po');
        $this->layout->render();
    }
	public function list_ats($page = 0)
    {
        $this->mdl_po->paginate(site_url('po/list_ats'), $page);
        $this->layout->buffer('content', 'po/list_ats');
        $this->layout->render();
    }

 
    public function tempdata($poid,$pono,$pedingqty,$invqty,$atsid=0)
    {
        $data['poid'] = $poid;
        $data['pono'] = $pono;
     
        $data['pedingqty'] = $pedingqty;
        $data['invqty'] = $invqty;
        $data['atsid'] = $atsid;

        $this->mdl_po->paginate(site_url('po/tempdata/'). $poid);
        $this->layout->buffer('content', 'po/tempdata/',$data);
        $this->layout->render();
    }


    public function upload_atscert($poid,$ats_date,$lineno,$qty,$partno,$temp_path,$revno,$pending_ats_qty,$pono,$part_no,$rev_no,$atsid,$inv_qty){
        


        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 0; // Set to 0 for no file size limit
        $config['encrypt_name'] = TRUE; // Generates a unique name for uploaded files
        $certname = $this->input->post('certname');
        // echo $certname . 2  ;
        $this->load->library('upload', $config);
        
        $atsid = $this->input->post('atsid');
        $poid = $this->input->post('poid');
        
        // Get the number of files uploaded
        $file_count = count($_FILES['atscert']['name']);
        
        // Loop through each file
      
    
        for ($i = 0; $i < $file_count; $i++) {
            $_FILES['userfile']['name']     = $_FILES['atscert']['name'][$i];
            $_FILES['userfile']['type']     = $_FILES['atscert']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['atscert']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['atscert']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['atscert']['size'][$i];
        
            if ($this->upload->do_upload('userfile')) {
            
                $data = $this->upload->data();
                $file_path = $data['full_path']; 
                $file_name = $data['file_name'];
                $original_filename = $_FILES['userfile']['name'];
                $this->db->select('COUNT(*) as num_columns');
                $this->db->from('po_certs');
                $this->db->where('poid', $poid);
                $this->db->where('atsid', $atsid);
          
                $query = $this->db->get();
                
          
                $result = $query->row();
                
              
                $num_columns = $result->num_columns;


                $queryuom = $this->db->query("SELECT unit.unit_name , prd.product_name FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id = '$poid'");
                $fetch_email = $queryuom->row_array();
                $uom = $fetch_email['unit_name'];
                $productname = $fetch_email['product_name'];

                $this->db->select('ats_no');
                $this->db->from('ip_ats');
                $this->db->where('id', $atsid);
                $this->db->where('po_id', $poid);
                $query2 = $this->db->get();
                $result = $query2->row_array();
                $string = $result['ats_no'];
                 $pattern = "/ATS_NO_(\d+)/";
                 $certname = substr($string, 7);
                // preg_match($pattern, $string, $matches);
                // $number = $matches[1];
                $padded_lineno = str_pad($lineno, 4, "!", STR_PAD_LEFT);

                $certname = $certname. '-CERT-'.($num_columns + 1).'-'. $productname.'_'.$part_no.'-L'.$padded_lineno.' '.$inv_qty.''.$uom ;
                
                // $certname =  $certname.'-'.($num_columns + 1) ;
                $query = $this->db->get_where('po_certs', array(
                    'cert_entry_name' => $original_filename,
                    'poid' => $poid,
                    'atsid' => $atsid
                ));
    
                if ($query->num_rows() > 0) {
    
    
                    echo "<script> alert('Certificate Already Exists');";
                    echo "window.location.href = '" . site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid . "';</script>";
                    
                    return;
    
                }
   
                $insert_data = array(
                    'cert_name'=> $certname,
                    'cert_path' => $file_path,
                    'poid' => $poid,
                    'atsid' => $atsid,
                    'cert_entry_name'=> $original_filename
                );
        
                $this->db->insert('po_certs', $insert_data);
            } else {
             
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        }
        
 
    

        $url = site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;

  
        redirect($url);


    }


    public function upload_atscert_mail($poid,$ats_date,$lineno,$qty,$partno,$temp_path,$revno,$pending_ats_qty,$pono,$part_no,$rev_no,$atsid,$inv_qty,$model_id){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 0; 
        $config['encrypt_name'] = TRUE; 
        $certname = $this->input->post('certname');
       
        $this->load->library('upload', $config);
        
        $atsid = $this->input->post('atsid');
        $poid = $this->input->post('poid');
        
      
        $file_count = count($_FILES['atscert']['name']);
        
      
      
    
        for ($i = 0; $i < $file_count; $i++) {
            $_FILES['userfile']['name']     = $_FILES['atscert']['name'][$i];
            $_FILES['userfile']['type']     = $_FILES['atscert']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['atscert']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['atscert']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['atscert']['size'][$i];
        
            if ($this->upload->do_upload('userfile')) {
            
                $data = $this->upload->data();
                $file_path = $data['full_path']; 
                $file_name = $data['file_name'];
                $original_filename = $_FILES['userfile']['name'];
                $this->db->select('COUNT(*) as num_columns');
                $this->db->from('po_certs');
                $this->db->where('poid', $poid);
                $this->db->where('atsid', $atsid);
          
                $query = $this->db->get();
                
          
                $result = $query->row();
                
              
                $num_columns = $result->num_columns ;



                $queryuom = $this->db->query("SELECT unit.unit_name , prd.product_name FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id = '$poid'");
                $fetch_email = $queryuom->row_array();
                $uom = $fetch_email['unit_name'];
                $productname = $fetch_email['product_name'];
           

                $this->db->select('ats_no');
                $this->db->from('ip_ats');
                $this->db->where('id', $atsid);
                $this->db->where('po_id', $poid);
                $query2 = $this->db->get();
                $result = $query2->row_array();
                $string = $result['ats_no'];
                $pattern = "/ATS_NO_(\d+)/";
                $certname = substr($string, 7);
               // preg_match($pattern, $string, $matches);
               // $number = $matches[1];
               $padded_lineno = str_pad($lineno, 4, "!", STR_PAD_LEFT);
               $certname = $certname. '-CERT-'.($num_columns + 1) . '-'. $productname.'_'.$part_no.'-L'.$padded_lineno.' '.$inv_qty.''.$uom ;
            //    $certname =  $certname.'-'.($num_columns + 1) ;
                



            $query = $this->db->get_where('po_certs', array(
                'cert_entry_name' => $original_filename,
                'poid' => $poid,
                'atsid' => $atsid
            ));

            if ($query->num_rows() > 0) {


                echo "<script> alert('Certificate Already Exists');";
                echo "window.location.href = '" . site_url("po/sendmailframe/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid . '/' . $inv_qty . '/' . $model_id . "';</script>";
                
   return;
            }


            
   
                $insert_data = array(
                    'cert_name'=> $certname,
                    'cert_path' => $file_path,
                    'poid' => $poid,
                    'atsid' => $atsid,
                    'cert_entry_name' => $original_filename
                );
        
                $this->db->insert('po_certs', $insert_data);
            } else {
             
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        }
        
 

$url = site_url("po/sendmailframe/").$poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid.'/'.$inv_qty.'/'.$model_id;
    

        redirect($url);


    }






    


    public function upload_file_ajax() {


        
        



        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $atsid = $this->input->post('atsid');
        $poid = $this->input->post('poid');
        $ats_date = $this->input->post('ats_date');
        $lineno = $this->input->post('lineno');

        $padded_lineno = str_pad($lineno, 4, "!", STR_PAD_LEFT);


        $qty = $this->input->post('qty');
        $productname = $this->input->post('productname');
        $partno =   $this->input->post('partno');
        $part_no =   $this->input->post('part_no');
        $rev_no =   $this->input->post('rev_no');
        $temp_path = $this->input->post('temp_path');
        $pono = $this->input->post('pono');
        $pending_ats_qty = $this->input->post('pending_ats_qty');


        $accept_file = $this->db->select('accept_file')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->accept_file;

    
        $ats_date = $this->db->select('ats_date')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->ats_date;
        $current_date = date('Y-m-d');

        if($ats_date != $current_date ){
            echo  '<script>alert("Invalid ATS Date")</script>';
            
            echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';

            return;
        }


        $file_name = $_FILES['atsfile']['name'];


        if( $file_name != $accept_file){
            echo  '<script>alert("Please Select a Correct XLSM File")</script>';
            
                $urlToRedirect = site_url("po/atsfile/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;
    
                echo '<script>window.location.href = "' .   $urlToRedirect. '";</script>';

            return;


        }
        
        if ($this->upload->do_upload('atsfile')) {
         
            $data = $this->upload->data();
            $file_path = $data['full_path']; 
            // $file_name = $data['file_name'];
            $file_name = $_FILES['atsfile']['name'];
            // $original_filename = $_FILES['userfile']['name'];
            // $atsfilename =$file_name;
            // Full path to the uploaded file
 


            // $existing_filepath = $this->db->get_where('ats_data', array('poid' => $poid))->row()->filepath;

            // if (!empty($existing_filepath)) {
               
            //     unlink($existing_filepath);
            // }

            $queryuom = $this->db->query("SELECT unit.unit_name FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id = '$poid'");
            $fetch_email = $queryuom->row_array();
            $uom = $fetch_email['unit_name'];
            
            $query = $this->db->select('ats_no')
            ->from('ip_ats')
            ->where('id', $atsid)
            ->where('po_id', $poid)
            ->get();
            $row = $query->row();
            $scirno = $row->ats_no;
            
            $atsfilename = substr($scirno, 7) . '-ATS_'. $productname.'_'.$part_no.'-L'.$padded_lineno.' '.$qty.''.$uom .'.xlsm' ;
         
           
            
            $this->db->where('poid',  $poid); // Update the condition
            $this->db->where('atsid',  $atsid); 
            $this->db->update('ats_data', array('filepath' => $file_path,'ats_filename' =>$atsfilename ));

            $postData = array(
                'atsid' => $atsid,
                'poid' => $poid,
                'ats_date' => $ats_date,
                'lineno' => $lineno,
                'padded_lineno' => $padded_lineno,
                'qty' => $qty,
                'productname' => $productname,
                'partno' => $partno,
                'temp_path' => $temp_path,
                'part_no' => $part_no,
                'rev_no' => $rev_no,
               
            );
            
            $queryString = http_build_query($postData);
            
            $options = [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $queryString,
                ],
            ];
            
        
            $context = stream_context_create($options);
            
            // Build the URL
            $url = base_url("Custom/excel/savepdf.php");
            
            // Use file_get_contents with the stream context
            $response = file_get_contents($url, false, $context);
            
            // Check if the request was successful
            if ($response === FALSE) {
                die('Error occurred while fetching data from ' . $url);
            }
            
 
            // echo $response;
            if($response){
                echo  '<script>alert("Ready to send mail")</script>';
            
                echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';
                
            }else{
                echo  '<script>alert("Something went wrong ")</script>';
            
                echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';
            }
        
        } else {
          
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        

              
        }
        
    
    }



 
    public function sendmail(){
      
        $upload_url = $this->config->item('upload_url');
        $poid = $this->input->post('primaryid');
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');
        $body = str_replace(
            ['Part Name', 'Part Number', 'PO Number', 'Supply Qty'],
            ['<b>Part Name</b>', '<b>Part Number</b>', '<b>PO Number</b>', '<b>Supply Qty</b>'],
            $body
        );
    $partname  = $this->input->post('partname'); 
    $partno  = $this->input->post('partno'); 
    $atsid = $this->input->post('atsid');
    $ponodata  = $this->input->post('ponodate');
    $lineno  = $this->input->post('lineno');
    $model_id= $this->input->post('model_id');
    $qty= $this->input->post('qty');


    $ats_date = $this->db->select('ats_date')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->ats_date;
    $email_sent = $this->db->select('email_sent')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->email_sent;
    $current_date = date('Y-m-d');
    if($ats_date != $current_date ){

        $query = $this->db->select('filepath, pdffile_path ,ats_filename,pdffilename')
        ->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid));
    
    $result = $query->row();
    
    
    $ats_filename = trim($result->ats_filename);
    
    $atspath ='./uploads/'.basename($result->filepath);
    $pdffile = './uploads/'.basename($result->pdffile_path);
    unlink($pdffile);
    unlink($atspath);


    $this->db->set(array('filepath' => NULL, 'ats_filename' => NULL, 'pdffile_path' => NULL, 'pdffilename' => NULL, 'uploaded' => '0'))
    ->where('poid', $poid)
    ->where('atsid', $atsid)
    ->update('ats_data');

    
        echo  '<script>alert("Invalid ATS Date")</script>';
        echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';

        return;
    }


  
    if($email_sent !='1'){

        $quantity = file_get_contents('https://magdyn.in/inv3/Custom/get_pro_qty.php?inventory_model_id='.$model_id);

        if($quantity < $qty){
        echo '<script>';
        echo 'alert("Product Quantity Not Enough.!  ");';
        echo 'window.parent.location.href = "' . site_url('po/list_ats') . '";';
        echo '</script>';
        return;
        }


    }

    //     $quantity = file_get_contents('https://magdyn.in/inv3/Custom/get_pro_qty.php?inventory_model_id='.$model_id);



// if($quantity >= $qty){


        
    $query = $this->db->select('filepath, pdffile_path ,ats_filename,pdffilename')
    ->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid));

$result = $query->row();


$ats_filename = trim($result->ats_filename);


$atspath =$this->downloadFile($upload_url.basename($result->filepath));
$pdffile = $this->downloadFile($upload_url.basename($result->pdffile_path));
$pdffilename =  trim($result->pdffilename.'.pdf');


$query2 = $this->db->select('cert_path ,cert_name')->get_where('po_certs', array('poid' => $poid, 'atsid' => $atsid));
$filePaths = $query2->result_array();
$localCertPaths = array();


foreach ($filePaths as $x => $filePath) {
    $certURL = $upload_url . basename($filePath['cert_path']);
    $localCertPaths[$x] = $this->downloadFile($certURL);
    $localcertname[$x] =  $filePath['cert_name'];
}


        $from_address = "pagalavan@magdyn.in";
        $to_address = "heropagalavan@gmail.com";
        $subject = "$subject"; // Add a subject for the email
        
        $body = "
        <html>
            <body style='color:black'>
            ".nl2br($body)."
            </body>
        </html>";
        
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();    
        $mailer->Host = "smtp.hostinger.com";
        $mailer->SMTPAuth = true;
        $mailer->Username = "pagalavan@magdyn.in";
        $mailer->Password = "Pagalavan@12345";
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = 465;
        $mailer->setFrom($from_address);
        $mailer->addAddress($to_address);
        $mailer->Subject = $subject;
        $mailer->isHTML(true);
        $mailer->Body = $body;
        
        // Attach the file
       ini_set('memory_limit', '256M'); 

$mailer->addAttachment($atspath, $ats_filename);
$mailer->addAttachment($pdffile,$pdffilename);
foreach ($localCertPaths as $x => $localCertPath) {
    $filename = $localcertname[$x];
    $mailer->addAttachment($localCertPath, $filename);
}
        
        if ($mailer->send()) {

            $this->db->trans_start(); 
            if($email_sent !='1'){

            }

            $data = array(
                'ats_status' => 'Applied'
            );
            
            $this->db->where('po_id', $poid);
            $this->db->where('id', $atsid);
            $this->db->update('ip_ats', $data);



            $this->db->where('poid',  $poid); 
            $this->db->where('atsid',  $atsid);
            $this->db->update('ats_data', array('uploaded' => '2','email_sent'=>'1'));
         
            
        $this->db->trans_complete();


        if ($this->db->trans_status()) {
            echo '<script>';
            echo 'alert("Email sent successfully!");';
            echo 'window.parent.location.href = "' . site_url('po/list_ats') . '";';
            echo '</script>';
            
            } else {
            
                echo  '<script>alert("Something Went Wrong")</script>';
                        
                echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';
            
            }


        

           

        } else {
            echo "Error: " . $mailer->ErrorInfo;
        }





    }



    function downloadFile($url)
{
    $ch = curl_init($url);
    $localFilePath = sys_get_temp_dir() . '/' . basename($url); // Use a temporary directory
    $fp = fopen($localFilePath, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    return $localFilePath;
}

public function removefile($url){
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Send a DELETE request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
        // Log or handle the error
        echo "cURL Error: " . $error;
    }

    // Close cURL session
    curl_close($ch);

    // Check if the response indicates successful deletion
    if ($response !== false) {
        return true; // File removed successfully
    } else {
        return false; // Failed to remove the file
    }
}


 function getPoCertsData($atsid, $poid) {
    // Fetch data from po_certs table
    $this->db->select('*');
    $this->db->from('po_certs');
    $this->db->where('atsid', $atsid);
    $this->db->where('poid', $poid);
    $query = $this->db->get();

    // Check if there is any result
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if no result
    }
}


function atscert($poid,$ats_date,$lineno,$qty,$partno,$temp_path,$revno,$pending_ats_qty,$pono,$part_no,$rev_no,$atsid){
    $upload_url = $this->config->item('upload_url');
    $data['upload_url']= $upload_url;
    $data['poid'] = $poid;
    $data['ats_date'] = $ats_date;
    $data['lineno'] = $lineno;
  
    $data['partno'] = $partno;
    $data['temp_path'] = $temp_path;
    $data['qty'] = $qty;
    $data['revno'] = $revno;
    $data['pending_ats_qty'] = $pending_ats_qty;
    $data['pono'] = $pono;
    $data['part_no'] = $part_no;
    $data['rev_no'] = $rev_no;
    $data['atsid']= $atsid;
    // $poCertsData = $this->mdl_po->getPoCertsData($atsid, $poid);

    $this->db->select('*');
    $this->db->from('po_certs');
    $this->db->where('atsid', $atsid);
    $this->db->where('poid', $poid);
    $query = $this->db->get();
     $query->result();

    // Pass the fetched data to the view
    $data['poCertsData'] = $query->result_object;

    // echo json_encode($data);
    $ats_date = $this->db->select('ats_date')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->ats_date;
    $current_date = date('Y-m-d');

    if($ats_date != $current_date ){

    $data['atsdownloaded'] = '0';
    }else{
        $data['atsdownloaded'] = '1';
    }

    $this->mdl_po->paginate(site_url('po/atscert/'). $poid);
    $this->layout->buffer('content', 'po/atscert/',$data);
    $this->layout->render();

}




function atsfile($poid,$ats_date,$lineno,$qty,$partno,$temp_path,$revno,$pending_ats_qty,$pono,$part_no,$rev_no,$atsid){

        $data['poid'] = $poid;
        $data['ats_date'] = $ats_date;
        $data['lineno'] = $lineno;
      
        $data['partno'] = $partno;
        $data['temp_path'] = $temp_path;
        $data['qty'] = $qty;
        $data['revno'] = $revno;
        $data['pending_ats_qty'] = $pending_ats_qty;
        $data['pono'] = $pono;
        $data['part_no'] = $part_no;
        $data['rev_no'] = $rev_no;
        $data['atsid']= $atsid;

      
 
        $this->mdl_po->paginate(site_url('po/atsfile/'). $poid);
        $this->layout->buffer('content', 'po/atsfile/',$data);
        $this->layout->render();
  
}


function sendmailframe($poid,$ats_date,$lineno,$qty,$partno,$temp_path,$revno,$pending_ats_qty,$pono,$part_no,$rev_no,$atsid,$inv_qty,$model_id){
    $upload_url = $this->config->item('upload_url');
    $data['poid'] = $poid;
    $data['ats_date'] = $ats_date;
    $data['lineno'] = $lineno;
  $data['upload_url']= $upload_url;
    $data['partno'] = $partno;
    $data['temp_path'] = $temp_path;
    $data['qty'] = $qty;
    $data['revno'] = $revno;
    $data['pending_ats_qty'] = $pending_ats_qty;
    $data['pono'] = $pono;
    $data['part_no'] = $part_no;
    $data['rev_no'] = $rev_no;
    $data['atsid'] = $atsid;
    $data['inv_qty']= $inv_qty;
    $data['model_id'] = $model_id;


    $ats_date = $this->db->select('ats_date')->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid))->row()->ats_date;
    $current_date = date('Y-m-d');
    if($ats_date != $current_date ){

        $query = $this->db->select('filepath, pdffile_path ,ats_filename,pdffilename')
        ->get_where('ats_data', array('poid' => $poid, 'atsid' => $atsid));
    
    $result = $query->row();
    
    
    $ats_filename = trim($result->ats_filename);
    
    $atspath ='./uploads/'.basename($result->filepath);
    $pdffile = './uploads/'.basename($result->pdffile_path);
    unlink($pdffile);
    unlink($atspath);


    $this->db->set(array('filepath' => NULL, 'ats_filename' => NULL, 'pdffile_path' => NULL, 'pdffilename' => NULL, 'uploaded' => '0'))
    ->where('poid', $poid)
    ->where('atsid', $atsid)
    ->update('ats_data');

    
        echo  '<script>alert("Invalid ATS Date.")</script>';
        echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';

        return;
    }


    // echo json_encode($data);
    $this->db->select('*');
    $this->db->from('po_certs');
    $this->db->where('atsid', $atsid);
    $this->db->where('poid', $poid);
    $query = $this->db->get();
     $query->result();

    // Pass the fetched data to the view
    $data['poCertsData'] = $query->result_object;

    $this->mdl_po->paginate(site_url('po/sendmailframe/'). $poid);
    $this->layout->buffer('content', 'po/sendmailframe/',$data);
    $this->layout->render();
}

public function mailstatus($atsid,$poid){


    $this->db->trans_start(); 



$this->db->set('ats_status', 'To Apply');
$this->db->where('id', $atsid);
$this->db->where('po_id', $poid);
$this->db->update('ip_ats');




$this->db->set(array('uploaded' => '1'))
->where('poid', $poid)
->where('atsid', $atsid)
->update('ats_data');




$this->db->trans_complete();

if ($this->db->trans_status()) {
echo  '<script>alert("Status Changed")</script>';
            
echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';

} else {

    echo  '<script>alert("Something Went Wrong")</script>';
            
    echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';

}

}

public function certdownloadcsv($poid,$atsid,$pending_ats_qty,$part_no,$rev_no){
    $xlgen_url = $this->config->item('xlgen_url');
    $query = $this->db->select('lineno, PoNo, partid')->from('ip_po')->where('id', $poid)->get();
    $result = $query->row(); 
    $lineno = $result->lineno;
    $pono = $result->PoNo;
    $partid = $result->partid;

$temp_path_query = $this->db->select('temp_path')->from('ip_products')->where('product_id', $partid)->get();
$temp_path_result = $temp_path_query->row();
$temp_path = $temp_path_result->temp_path;
$query = $this->db->query('SELECT parameter FROM `ats_data` WHERE poid = ? AND atsid = ?', array($poid, $atsid));
if ($query->num_rows() > 0) {
    $row = $query->row_array();
    $fetch_data = json_decode($row['parameter'], true);
    $ats_date = $fetch_data['temp_date'];
    $qty = $fetch_data['ats_qty'];
    $partno = $fetch_data['partno'];

    $url = $xlgen_url.'xlgen.php?pid=' . $poid . '&atsid=' . $atsid . '&lineno=' . $lineno;

    // Echo the download link to trigger the download
    echo "<a id='downloadLink' href='$url' style='display: none;' download>Download ATS.csv File</a>";

    $url2 = $xlgen_url.'xlsmgen.php?pid=' . $poid . '&atsid=' . $atsid . '&lineno=' . $lineno;
    echo "<a id='downloadLink2' href='$url2' style='display: none;' download>Download ATS.csv File</a>";
    
    // After the download is initiated, redirect to another URL
    $urlToRedirect = site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;
    
    echo "<script>

    setTimeout(function() {
        var downloadLink = document.getElementById('downloadLink');
        downloadLink.click();
    
        // Simulate click on the second download link after 1 more second
        setTimeout(function() {
            var downloadLink2 = document.getElementById('downloadLink2');
            downloadLink2.click();
            
            // Redirect to the desired URL after 1 more second
            setTimeout(function() {
                window.location.href = '$urlToRedirect';
            }, 0); // 1000 milliseconds = 1 second
        }, 1000); // 1000 milliseconds = 1 second
    }, 1200);




    </script>";
  


   
  

} else {
    echo  '<script>alert("Something Went Wrong!")</script>';
            
    echo '<script>window.parent.parent.location.href = "' . site_url('po/list_ats') . '";</script>';
   
}


      
  
}


public function certdel($certid,$poid,$atsid,$pending_ats_qty,$part_no,$rev_no){

    $this->db->trans_start(); 

    $querycerts = $this->db->select('cert_path')
    ->get_where('po_certs', array('po_certs_id' => $certid));

     $result = $querycerts->row();


     $certpath = './uploads/'.basename($result->cert_path);
     unlink($certpath);
  
     $this->db->where('po_certs_id', $certid)->delete('po_certs');



    $query = $this->db->select('lineno, PoNo, partid')->from('ip_po')->where('id', $poid)->get();
    $result = $query->row(); 
    $lineno = $result->lineno;
    $pono = $result->PoNo;
    $partid = $result->partid;

$temp_path_query = $this->db->select('temp_path')->from('ip_products')->where('product_id', $partid)->get();
$temp_path_result = $temp_path_query->row();
$temp_path = $temp_path_result->temp_path;
$query = $this->db->query('SELECT parameter FROM `ats_data` WHERE poid = ? AND atsid = ?', array($poid, $atsid));
if ($query->num_rows() > 0) {
    $row = $query->row_array();
    $fetch_data = json_decode($row['parameter'], true);
    $ats_date = $fetch_data['temp_date'];
    $qty = $fetch_data['ats_qty'];
    $partno = $fetch_data['partno'];

   // After the download is initiated, redirect to another URL




   
  $querypocertname = $this->db->get_where('po_certs', array(
    'poid' => $poid,
    'atsid' => $atsid
));

if ($querypocertname->num_rows() > 0) {

   
    $x=1;
     foreach ($querypocertname->result() as $row) {
        $certname = $row->cert_name;
        $po_certs_id = $row->po_certs_id;
        $replace_char = $certname[14];
        
   
        if($certname[14] == '1' && $certname[15] == '0' ) {
     
            $certname = substr($certname, 0, 15) . substr($certname, 15 + 1);
            $certname[14] = $x; 

        }elseif($certname[15] != '-'){
           $y= str_split($x);
            $certname[14] = $y[0]; 
            $certname[15] = $y[1]; 
        }else{
            $certname[14] = $x; 
        }

        
        $this->db->where(array('po_certs_id' => $po_certs_id))->update('po_certs', array('cert_name' => $certname));
       
        $x++;
     
    }


}



   
$this->db->trans_complete();

if ($this->db->trans_status()) {
    // echo $certpath;
   $urlToRedirect = site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;
 
   redirect($urlToRedirect);

}else{
    echo "<script>alert('Something went wrong') </script>";
    $urlToRedirect = site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;
 
    redirect($urlToRedirect);
}

}



}
public function certdelmail($certid,$poid,$atsid,$pending_ats_qty,$part_no,$rev_no,$inv_qty,$model_id){
    $this->db->trans_start(); 

    $querycerts = $this->db->select('cert_path')
    ->get_where('po_certs', array('po_certs_id' => $certid));

     $result = $querycerts->row();


     $certpath = './uploads/'.basename($result->cert_path);
     unlink($certpath);
  
     $this->db->where('po_certs_id', $certid)->delete('po_certs');



    $query = $this->db->select('lineno, PoNo, partid')->from('ip_po')->where('id', $poid)->get();
    $result = $query->row(); 
    $lineno = $result->lineno;
    $pono = $result->PoNo;
    $partid = $result->partid;

$temp_path_query = $this->db->select('temp_path')->from('ip_products')->where('product_id', $partid)->get();
$temp_path_result = $temp_path_query->row();
$temp_path = $temp_path_result->temp_path;
$query = $this->db->query('SELECT parameter FROM `ats_data` WHERE poid = ? AND atsid = ?', array($poid, $atsid));
if ($query->num_rows() > 0) {
    $row = $query->row_array();
    $fetch_data = json_decode($row['parameter'], true);
    $ats_date = $fetch_data['temp_date'];
    $qty = $fetch_data['ats_qty'];
    $partno = $fetch_data['partno'];

  


  
   $querypocertname = $this->db->get_where('po_certs', array(
    'poid' => $poid,
    'atsid' => $atsid
));

if ($querypocertname->num_rows() > 0) {

   
    $x=1;
     foreach ($querypocertname->result() as $row) {
       
        $certname = $row->cert_name;
        $po_certs_id = $row->po_certs_id;
        $replace_char = $certname[14];
      
        if($certname[14] == '1' && $certname[15] == '0' ) {
     
            $certname = substr($certname, 0, 15) . substr($certname, 15 + 1);
            $certname[14] = $x; 

        }elseif($certname[15] != '-'){
           $y= str_split($x);
            $certname[14] = $y[0]; 
            $certname[15] = $y[1]; 
        }else{
            $certname[14] = $x; 
        }
       

        $this->db->where(array('po_certs_id' => $po_certs_id))->update('po_certs', array('cert_name' => $certname));
       
        $x++;
    }


}




   
$this->db->trans_complete();

if ($this->db->trans_status()) {
 

         $url = site_url("po/sendmailframe/").$poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid.'/'.$inv_qty.'/'.$model_id;
    

        redirect($url);

}else{
    echo "<script>alert('Something went wrong') </script>";
    $urlToRedirect = site_url("po/atscert/") . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid;
 
    redirect($urlToRedirect);

}
}
}


public function data(){
   
}

}
