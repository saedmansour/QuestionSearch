<?php
//IMPROTANT: header.php must be included before this file

function printRecommendedQuestions()
{
	//print recommended questions from the current database connection
	$rec_questions = mysql_query("SELECT question,question_name,answer FROM intro WHERE recommend = 1");
	while($row = mysql_fetch_array($rec_questions))
	{
		if(!$row['question_name'])
		{
			$row['question_name'] = "שאלה";
		}
		if($row['question'])
		{
			echo "<a href=\"{$row['question']}\">{$row['question_name']}</a> - <a href=\"{$row['answer']}\">פתרון</a><br />";
		}
		else
		{
			echo "<a href=\"{$row['answer']}\">{$row['question_name']} - השאלה והפתרון</a><br />";
		}
	}
}


///////////////////////
// Function name: db_to_arr
//
// Description: take a column from table "intro" (specific to this implemntation), and create 
//				from it a string of comma seperated values. The values are the fields in the 
//				column. This is used to make an array in javasScript.
//
// Paramerters: column name
//
// Return value: none
///////////////////////
function db_to_arr($column_name)
{
	$i = 0;	//count lines
	$db_handle = mysql_query("SELECT {$column_name} FROM intro ");
	
	while($row = mysql_fetch_array($db_handle))
	{
		if($row[$column_name] && $row[$column_name] != "0000")	//if not null, 0000 is default for year
		{
			
			if(strrpos($row[$column_name], ","))    //if field is seperated by commas
			{
				$data_csv = explode("," , $row[$column_name]);
				for($s = 0; $s < sizeof($data_csv)-1; $s++)
				{
					echo "\"" . addslashes(trim($data_csv[$s])) . "\", ";
				}
				echo "\"" . addslashes(trim($data_csv[$s])) . "\"";
			}
			else
			{
				echo "\"" . addslashes(trim($row[$column_name])) . "\"";
			}
			$i++;
			if($i < mysql_num_rows($db_handle))	//if not last field
			{				
				echo ",";
			}
		}
	}
}


function printRadioButtons()
{	
	$additonalText = "checked=\"checked\"";
	
	//for more information about search cirterions refer to constants.php
	for($i = 0; $i < SEARCH_CRITERIONS_NUMBER; $i++)
	{
		global $searchCritirion;	//make the variable global, you can find it in constants.php
		$criterionEnglish =  $searchCritirion[$i][ENGLISH];
		$criterionHebrew = $searchCritirion[$i][HEBREW];
		
		if($i != 0)
		{
			$additonalText = "";
		}
		echo "<input type=\"radio\" name=\"search_type\" value=\"{$criterionEnglish}\" 
			onclick=\"GetSelectedItem()\" {$additonalText} />{$criterionHebrew}<br />";
	}
}