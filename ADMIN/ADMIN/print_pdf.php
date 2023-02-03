<?php
	function generateRow(){
	    $user_id = $_GET['user_id'];
		$contents = '';
		include_once('../dbcon.php');
		$sql = "SELECT * FROM pay WHERE id = '".$user_id."'";

		//use for MySQLi OOP
		$query = $con->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
			                     	<td>".$row['id']."</td>
									<td>".$row['name']."</td>
									<td>".$row['request']."</td>
									<td>".$row['status']."</td>
			</tr>
			";
		}
		////////////////

		//use for MySQLi Procedural
		// $query = mysqli_query($conn, $sql);
		// while($row = mysqli_fetch_assoc($query)){
		// 	$contents .= "
		// 	<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['firstname']."</td>
		// 		<td>".$row['lastname']."</td>
		// 		<td>".$row['address']."</td>
		// 	</tr>
		// 	";
		// }
		////////////////
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
 

    $content = '';  
      
    $content .= '
          

         
          
          

    
      	<h1 align="center">BARANGAY PINALAGDAN</h1>
      	<h4 align="center" style="margin-top:-50px;">SANGUNIANG BARANGAY NG PINALAGDAN, PAOMBONG BULACAN</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">ID</th>
				<th width="20%">NAME</th>
				<th width="20%">REQUEST</th>
				<th width="55%">STATUS</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('members.pdf', 'I');
	

?>