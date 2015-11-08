<!--Includes_______________________________________________________________-->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/index_code.php'); ?>
<!--_______________________________________________________________________-->




<!--Body___________________________________________________________________-->
<div id="pageBody">
	<form name="searchForm" method="post" action="search.php">
		<table id="indexQuestionsTable">
			<tr>
				<td style="border-left:solid 5px #DDEEFF;border-right:solid 5px #DDEEFF;border-bottom:dashed 5px #DDEEFF;"> 
					<?php echo TEXT_SEARCH ?><br /><br />
					<?php printRadioButtons(); ?>
				</td>
				<td style="border-left:solid 5px #DDEEFF;border-top:dashed 5px #DDEEFF;">
					<?php echo SEARCH_METHOD_TEXT ?><br /><br />
					<div id="pickSearchingMethod">
						<input name="searchMethod" value="dropDownList" type="radio" onClick="choseSearchMethod()" checked="checked"/><?php echo CHOOSE_DROP_DOWN_LIST?><br />
						<input name="searchMethod" value="typedSearch" type="radio" onClick="choseSearchMethod()" /><?php echo CHOOSE_TEXT_BOX_SEARCH?><br />
					</div>
				</td>
				<td>
					<br /><br />
					<select name="selectList" id="selectList"></select><br />
					<input name="data_input" id="statesinput" style="width:200px;" "type="text" class="searchTextBox" /><br /><br />
					<input name="submit" type="submit" value="<?php echo SUBMISSION_TEXT ?>" />
				</td>
			</tr>
		</table>
		<br /><br />
	</form>
	
	

	<table class="subjectsTable">
		<tr>
			<td>
				<div id="subSubject"><?php echo RECOMMENEDED_QUESTIONS_TEXT ?></div><br />
				<?php  printRecommendedQuestions(); ?>
				<a href="http://webcourse.cs.technion.ac.il/234114/Winter2007-2008/ho/WCFiles/ArraysComplementaryTutorial.ppt">מערכים - מקבץ שאלות</a><br />
				<a href="http://webcourse.cs.technion.ac.il/234114/Winter2007-2008/ho/WCFiles/Valentin_Strings_ComplementaryTutorial.ppt">מחרוזות - מקבץ שאלות</a><br />
			</td>
			<td>
				<div id="subSubject">כלים לקורס את"מ</div><br />
				<a href="pdp11.php">הדגשת סינטקס</a> <br/>
				<a href="pdp11_compiler.php">קומפילציה ישר מNotepad++</a><br />	
			</td>
			<td>			
				<div id="subSubject"><?php echo CONTACT_TITLE_TEXT?></div><br />
				<a href="/about/"><?php echo ADMIN_NAME ?><br /></a>
			</td>
		</tr>
	</table>
</div>	<!-- /pageBody -->
<!--/Body__________________________________________________________________-->







<!--Scripts________________________________________________________________-->
<script type="text/javascript">
	//<initialize info="from database">	
	YAHOO.example.statesArray = [<?php db_to_arr('tags'); ?>];	 // if it's done =question there are errors... no idea why yet
	question = [<?php db_to_arr('tags'); ?>];
	lecturer = [<?php db_to_arr('people'); ?>];
	title = [<?php db_to_arr('question_name'); ?>];
	year = [<?php db_to_arr('year'); ?>];
	//</initilaize>
</script>
<script type="text/javascript" src="javascript/index.js"></script>
<!--_______________________________________________________________________-->




<!--Footer_________________________________________________________________-->
<?php require_once('includes/footer.php'); ?>
<!--_______________________________________________________________________-->