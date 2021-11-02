<?php

$html = '
		<h3>Items List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
				<th>Item ID</th>
					<th>Item Code</th>
					<th>Item Stem (Eng)</th>
					<th>Grade</th>
					<th>Created By</th>
					<th>Item Status</th>
				</tr>
			</thead>
			<tbody>';			
			foreach($all_items as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['item_id'].'</td>
					<td>'.$row['item_code'].'</td>
					<td>'.substr($row['item_stem_en'],100).'<br />'.$row['item_stem_ur'].'</td>
					<td>'.$row['grade_code'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.(($row['item_status']==4)?'Accepted':'Pending').'</td>
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
		//'fontDir' => array_merge($fontDirs, [ 'D:\xampp\htdocs\www\itembanksystem.com\assets\fonts',]),
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
		$mpdf->SetTitle("Items List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'Accepted Items_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>