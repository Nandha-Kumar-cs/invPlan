<!-- Feat Pagalaven -->


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Duty Slip</title>
      <style>
        *{
            margin: 0%;
            padding: 0%;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 5px;
        }

        th, td {
            border: 2px solid #000;
            text-align: LEFT;
            padding: 10px;
            font-family: Sans-serif;
            letter-spacing: 0.5px;
            color: #000;
        }

        td {
            font-size: 15px;
        }

        th {
            font-size: 15px;
            width: 190px;
        }

        .reporting-address th,
        .reporting-address td {
            border-left: 2px solid #000; 
            border-right: 2px solid #000; 
        }

        .reporting-address .center-line {
           border: none;
            vertical-align: top;
            text-align: left;
            padding: 11;
            font-size: 15PX;
            font-family: Sans-serif;
        }

        .reporting-address .center {
            border-left: 2px solid black; 
            border-right: 0px solid black;
            border-top: 0px solid black; 
            border-bottom: 0px solid black; 
            vertical-align: top;
            text-align: left;
            font-size: 15PX;
            font-family: Sans-serif;

        }

        .table1 {
            margin-top: -10px;
            margin-bottom: -10px;
        }
         .table {
            margin-top: -19px;
            
        }
        

        tr:nth-child(5) td,
        tr:nth-child(6) th {
            padding: 10px;
        }
        .insideth{
        font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
    }    </style>     
    </head>
    <body>

        <table id="dutyTable" style="width: 100%;">
     
            <tr style="height: 26px;">
                
                <th colspan="5" style="text-align: center; font-size:20px;height:26px">  
                
                <table style="border: none; border-collapse: collapse;padding:0;margin:0;" >
                    <tr style="border: none; border-collapse: collapse;padding:0;margin:0;">
                        <td colspan="1" style="border: none; border-collapse: collapse;padding:0;margin:0;width:50%">
                        <img src="<?php echo base_url('assets/mttlogo.png'); ?>" alt="mttt-logo" style="margin: 10px;height:36px">
                        </td>
                        <td colspan="4" style="border: none; border-collapse: collapse;padding:0;margin:0;justify-content:center;font-size:20px;height:35px" >
                       <b > DUTY SLIP</b>
                        </td>
                    </tr>
                    
                </table>
               </th>
                 <th  style="font-size:15PX ; text-align:left;padding-top: 15px;width:32%" ><span style="font-size:13px">BOOKING<br> NO:</span> <table>
                    <tr>
                        <td style="border: none; text-align:right  ; vertical-align:middle; padding-top: -35px;padding-bottom: -1px; padding-right:5px; width: 120px; font-size: 15px;margin-top:13px"><b ><?php echo $duties->duty_no;?></b></td></tr></table>
            </tr>
            <tr>
                <th>COMPANY NAME</th>
                <td colspan="4"><?= $duties->comp_name ?></td>
                 <th style="text-align: left;font-size:15PX;height:45px; " colspan="1">DATE  <span class="insideth"><?= $duties->trip_date ?></span></th>
            </tr>
            <tr>
                <th>CUSTOMER NAME</th>
                <td colspan="4"><?= $duties->salutination .''. $duties->cust_name ?> </td>
                <th style="height:55px;vertical-align: top; text-align: left; padding: 3PX; padding-left: 10px; font-size: 14PX;" colspan="1">BOOKED BY <span class="insideth"> <?= $duties->booked_by ?></span></th>
            </tr>
               <tr class="reporting-address">
                <th style="font-size: 16PX; padding-top: -145px;"> REPORTING ADDRESS  </th>
                <TH  colspan="5">
                    <table class="table1">
                        <tr>        
                    <td style="width:2px; padding: 4PX; padding-top: 12PX;padding-left: 2PX;font-size: 15PX;" class="center-line"><span ><B>PICKUP PLACE</B><br></span> <span class="insideth"> <?php   $address_parts = explode(',', $duties->reporting_address);


foreach ($address_parts as $part) {
    // Trim the part to remove extra spaces
    $part = trim($part);
    
    // Output the part with a line break
    echo $part . '<br>';
} ?>&nbsp;</span></td>
    <table>
                    <tr>
                        <td style="font-size:18PX; border-left: 0px solid black;
          border: none; text-align:left  ; vertical-align: center; padding-top: 1px;padding-bottom: -1px; padding-left:-1px; width: 120px; font-size: 18px;"> </td></tr></table>
            </tr> </td>
                        
                    <table>
                        <tr><TD style="width: 2PX; border:none; padding-top: 120PX;text-align: left;  padding-bottom: 2PX;"><B>PICKUP TIME</B></TD></tr></table></tr>
                       
                                <td style="width:210px;height:10px; padding-left: 9PX;overflow: hidden; "class="center"><B>DROP PLACE</B><br>
                                <span style="font-size:18 ;padding-top: 120PX;"></span></tr></table></TH> 

          

            <tr>
                <th>VEHICLE NO.</th>
                <td style="width:170PX" colspan="3"><?= $duties->vehicle_no ?></td>
                <th style="text-align: LEFT;">VEHICLE TYPE</th>
                <td><?= $duties->vehicle_type ?></td>
            </tr>
            <tr>
                <th>DRIVER NAME</th>
                <td style="width:45%" colspan="3"><?= $duties->driver_name ?> </td>
                <th style="text-align: LEFT;">MOBILE NUMBER</th>
                <td><?= $duties->mobile_number ?></td>
            </tr>
            <tr>
                <th>CLOSING KM</th>
                <td style="width:45%" colspan="3"><?=($duties->closing_km === '0') ? '' : $duties->closing_km ?></td>
                <th style="text-align: LEFT;">CLOSING TIME</th>
                <td><?= ($duties->closing_time === '00:00:00') ? '' : $duties->closing_time  ?></td>
            </tr>
            <tr>
                <th>STARTING KM</th>
                <td style="width:45%" colspan="3"><?= ($duties->starting_km  === '0') ? '' : $duties->starting_km  ?></td>
                <th style="text-align: LEFT;">STARTING TIME</th>
                <td><?= ($duties->starting_time === '00:00:00') ? '' : $duties->starting_time  ?></td>
            </tr>
            <tr>
                <th>TOTAL KMS</th>
                <td style="width:45%" colspan="3"><?= ($duties->total_km === '0') ? '' : $duties->total_km  ?></td>
                <th style="text-align: LEFT;">TOTAL TIME</th>
                <td><?= ($duties->total_time=== '00:00:00') ? '' : $duties->total_time  ?></td>
            </tr>
            <tr>
                <th colspan="5" style="width:25px; height:100px; vertical-align: top; text-align: left;">REMARKS    </th>
                <th style="vertical-align: bottom; font-size: 13px; text-align: center;">CUSTOMER SIGNATURE</th>
            </tr>

        </table>

    </body>
    </html>















