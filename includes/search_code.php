<?php

//////////////
//Functions in this file:
//	isContainsString
//	printRow
//  printQuestionsHeader
//	printQuestionsFooter
//////////////
function isContainsString($string, $data)
{
	for($i = 0; $i < strlen($string)-strlen($data)+1; $i++)
	{
		$j = 0;
		while(($j < strlen($data)) && ($data[$j] == $string[$j+$i]))
		{
			$j++;
		}
		if($j >= strlen($data))
			return true;
	}
	return false;
}


// - Tags and people in database must be sepereated by a comma.
function printRow($row)
{
	if(!$row['question_name'])
		$row['question_name'] = "שאלה";
	echo "<tr>";
	if($row['question'])
		echo "<td><a href=\"{$row['question']}\">" . $row['question_name'] . "</a></td>";
	else
		echo "<td>" . $row['question_name'] ."</td>";
	echo "<td>{$row['people']}</td>";
	echo "<td>{$row['year']} - מועד {$row['moed']} - סמסטר {$row['semester']}</td>";
	echo "<td>{$row['tags']}</td>";
	if($row['answer'] != NULL)
		echo "<td><a href=\"{$row['answer']}\">" . "פיתרון" ."</a></td>";
	else
		echo "<td>אין פיתרון</td>";
	if($row['semester'] == "חורף")
		$row['semester'] = "winter";
	if($row['semester'] == "אביב")
		$row['semester'] = "spring";
	if($row['moed'] == "א")
		$row['moed'] = "a";
	if($row['moed'] == "ב")
		$row['moed'] = "b";
	if($row['moed'] == "ג")
		$row['moed'] = "c";
	if($row['question'])
		echo "<td><a href=\"questions/{$row['year']}/{$row['semester']}/{$row['moed']}.pdf\">המבחן כולו</a></td>";
	else
		echo "<td>אין</td>";
	if($row['answer'])
		echo "<td><a href=\"questions/{$row['year']}/{$row['semester']}/{$row['moed']}_sol.pdf\">הפתרון כולו</a></td>";
	else
		echo "<td>אין</td>";
	
	/*
	//<starRating>
	echo "<td>";
	echo rating_bar($row['id'],5);
	echo "</td>";
	//</starRating>
	*/
	
	echo "</tr>";
}



function printQuestionsTableHeader()
{
	$tableHeader = <<< TABLE_HEADER
	<center>
	<table id="questionsTable">
	<tr>
		<th>לינק לשאלה</th>
		<th>מרצים</th>
		<th>מועד</th>
		<th>סוג השאלה</th>
		<th>פיתרון</th>
		<th>המבחן כולו</th>
		<th>הפתרון כולו</th>
	</tr>
TABLE_HEADER;
	
	echo $tableHeader;
}



function printQuestionsTableFooter()
{
	echo "</table></center>";
}