<?php

$html = '
		<h3>Users List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>ID</th>
					<th>Username</th>
					<th>Name</th>
					<th>CNIC</th>
					<th>Mobile<br />Email</th>
					<th>Subject</th>
					<th>Desig.<br />Place of Posting</th>
					<th>Deptt..<br />School Type</th>
					<th>Approved/.<br />Status</th>
				</tr>
			</thead>
			<tbody>';

			foreach($all_itemwriters as $row):
				$approved ='';
				$status='';
				if($row['is_login']=='1'){$approved ='Approved';}else{$approved ='Not Approved';}
				if($row['is_active']=='1'){$status ='Active';}else{$status ='Inactive';}
				$html .= '		
				<tr class="oddrow">
					<td>'.$row['admin_id'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['firstname'].' '.$row['lastname'].'</td>
					<td>'.$row['ci_iw_cnic'].'</td>
					<td>'.$row['ci_iw_mobile'].'<br />'.$row['ci_iw_email'].'</td>
					<td>'.$row['ci_iw_subject'].'</td>
					<td>'.$row['ci_iw_designation'].'<br />'.$row['ci_iw_posting'].'</td>
					<td>'.$row['ci_iw_deptttype'].'<br />'.$row['ci_iw_publictype'].'</td>
					<td>'.$approved.'<br />'.$status.'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
				
		 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		 $fontDirs = $defaultConfig['fontDir'];
		 
		 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		 $fontData = $defaultFontConfig['fontdata'];
		 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
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
		$mpdf->SetTitle("SS IW List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'SS_IW_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();

?>