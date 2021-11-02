<?php

$html = '
		<h3>Subjects List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>SubContnet Number</th>
					<th>SubContnet Sort</th>
					<th>Topic (Eng)</th>
					<th>Topic (Urdu)</th>
					<th>Grade</th>
					<th>Subject</th>
					<th>ContentStand</th>
					<th>Created Date</th>
					<th>Created By</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>';
			echo '<PRE>';
			//print_r($all_Subjects);
			//die();
			foreach($all_subcontentstand as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['subcs_number'].'</td>
					<td>'.$row['subcs_sort'].'</td>
					<td>'.$row['subcs_topic_en'].'</td>
					<td>'.$row['subcs_topic_ur'].'</td>
					<td>'.$row['grade_code'].'</td>
					<td>'.$row['subject_code'].'</td>
					<td>'.$row['cs_statement_en'].'</td>
					<td>'.$row['subcs_created'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.(($row['cs_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
		 /*
		$mpdf = new mPDF('c');
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("SubContnet Stand List");
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->watermark_font = 'PEC-IT-TEAM';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		$mpdf->WriteHTML($html);
		$filename = 'SubContentStand_list1';
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
		$mpdf->SetTitle("SubContentStand List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'SubContentStand_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>