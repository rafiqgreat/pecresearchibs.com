<?php

$html = '
		<h3>School List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr>
				  <th>#ID</th>
				  <th>UserName</th>
				  <th>School Deptt.</th>
				  <th>Type</th>
				  <th>Name</th>
				  <th>Address</th>
				  <th>District</th>
				  <th>Tehsil</th>
				  <th>Level</th>
				  <th>Gender</th>
				  <th>Email</th>
				  <th>Phone</th>
				  <th>Location</th>
				  <th>Status</th>
			 	</tr>
			  </thead>
			<tbody>';
			//echo '<PRE>';
			//print_r($all_school);
			//die();
			foreach($all_school as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['school_id'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['school_department'].'</td>
					<td>'.$row['school_type'].'</td>
					<td>'.$row['school_name'].'</td>
					<td>'.$row['school_address'].'</td>
					<td>'.$row['district_name_en'].'</td>
					<td>'.$row['tehsil_name_en'].'</td>
					<td>'.$row['school_level'].'</td>
					<td>'.$row['school_gender'].'</td>
					<td>'.$row['school_email'].'</td>
					<td>'.$row['school_phone'].'</td>
					<td>'.$row['school_location'].'</td>
					<td>'.(($row['school_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
		/*
		$mpdf = new mPDF('c');
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("School List");
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->watermark_font = 'PEC-IT-TEAM';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		$mpdf->WriteHTML($html);
		$filename = 'School_list1';
		ob_clean();
		$mpdf->Output($filename . '.pdf', 'D');
		exit();
		*/
		 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		 $fontDirs = $defaultConfig['fontDir'];
		 
		 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		 $fontData = $defaultFontConfig['fontdata'];
		 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		'fontDir' => array_merge($fontDirs, [ 'D:\xampp\htdocs\www\itembanksystem.com\assets\fonts',]),
		'fontdata' => $fontData + [
			'urdufont' => [
				'R' => 'NotoNastaliqUrdu-Regular.ttf',
				'I' => 'NotoNastaliqUrdu-Regular.ttf',
			]
		],
		'default_font' => 'verdana']);
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->SetTitle("School List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'School_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>