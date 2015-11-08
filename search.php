<!--Includes_______________________________________________________________-->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/search_code.php'); ?>	
<!--_______________________________________________________________________-->



<!--/Body__________________________________________________________________-->
<div id="searchPageBody">
	<?php
		if($_POST['data_input'] != null ||				//If there's anything to search for,
			$_POST['search_type'] == "RECOMMENDED" ||		//or if picked recommended questions
			$_POST['searchMethod'] == "dropDownList")		
		{    
			$databaseQuery = "SELECT * FROM intro";
		    $searchType = trim($_POST['search_type']);			//lecturer, question type etc..   
			$queryResult = mysql_query($databaseQuery);			
		    $isFoundSearchResults = false;						
			
			
			//<getData info="search method">
			if($_POST['searchMethod'] == "dropDownList")
			{
				$searchQuery = trim($_POST['selectList']);
			}
			else
			{
				$searchQuery = trim($_POST['data_input']);			
			}
			//</getData>

			
			//<printQuestions info="print rows of the questions that are found">
			printQuestionsTableHeader();
			while($row = mysql_fetch_array($queryResult))
		    {
		        $isPrintRow = false;	//usage: if the current row in the sql result should be printed 
				
		        switch($searchType)
		        {
		            case 'QUESTION_TYPE':
		                if(isContainsString($row[tags], $searchQuery))	//tags is the question types (comma seperated values)
		                {
		                    $isPrintRow = true;
						}
		                break;
		            case 'LECTURER':
		                if(isContainsString($row[people], $searchQuery))
		                {
		                    $isPrintRow = true;
						}
		                break;
		            case 'YEAR':
		                if($row[year] == $searchQuery)
		                {
		                    $isPrintRow = true;
						}
		                break;
		            case 'QUESTION_NAME':
		            	if(isContainsString($row[question_name], $searchQuery))
		            	{
		            	    $isPrintRow = true;
						}
		            	break;
		            case 'RECOMMENDED':
		                if($row[recommend])	//if in recommened there is true then it is recommended
		                {
		                    $isPrintRow = true;
						}
		                break;
		            default:
		                break;
		        }
		        if($isPrintRow)
		        {
		            printRow($row);
		            $isFoundSearchResults = true;
		        }
		    }
			printQuestionsTableFooter();
			//</printQuestions>		
			
			if(!$isFoundSearchResults)
			{
	    		echo MESSAGE_NO_SEARCH_RESULTS;
			}
		}
		else	//If there's nothing to search for
		{
			echo MESSAGE_NO_DATA_SUBMITTED;
		}			
	?>	
<p><a href="index.php"><?php echo MESSAGE_RETURN_TO_HOMEPAGE ?></a></p>	
</div> <!-- <div id="searchPageBody"> -->
<!--_______________________________________________________________________-->



<!--Footer_________________________________________________________________-->
<?php require_once("includes/footer.php"); ?>
<!--_______________________________________________________________________-->