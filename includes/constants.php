<?php
//<hebrew>
	//<index.php>
define("WEBSITE_TITLE", "טכניון - מבוא למדעי המחשב 234114/7 - חיפוש שאלות במבחנים קודמים");
define("TEXT_SEARCH", "בחר לפי מה אתה רוצה לחפש:");
define("SEARCH_METHOD_TEXT", "בחר שיטת חיפוש:");
define("SUBMISSION_TEXT", "חפש");
define("CONTACT_TITLE_TEXT", "צור קשר");
define("ADMIN_NAME", "SaEd Mansour");
define("ADMIN_EMAIL", "saed.mn@gmail.com");
define("RECOMMENEDED_QUESTIONS_TEXT", "שאלות טריקיות/קשות");
define("CHOOSE_DROP_DOWN_LIST", "רשימה");
define("CHOOSE_TEXT_BOX_SEARCH", "חיפוש ידני");
	//</index.php>

	//<search.php>
define("MESSAGE_NO_DATA_SUBMITTED", "לא צוין מה צריך  לחפש.");
define("MESSAGE_NO_SEARCH_RESULTS", "לא נמצאו שאלות התואמות את מה שחיפשת. נא להיצמד למה שהאתר מציע לחפש.");
define("MESSAGE_RETURN_TO_HOMEPAGE", "לחץ כאן כדי לחזור לדף החיפוש");
	//</search.php>

//</hebrew>

define("WEBSITE_URL", "http://www.saedm.com");


//<searchCriterions>
define("ENGLISH", 0);
define("HEBREW", 1);
define("SEARCH_CRITERIONS_NUMBER", 5);
$searchCritirion[0][ENGLISH] = "QUESTION_TYPE";
$searchCritirion[0][HEBREW] = "סוג השאלה";

$searchCritirion[1][ENGLISH] = "LECTURER";
$searchCritirion[1][HEBREW] = "מרצה";

$searchCritirion[2][ENGLISH] = "QUESTION_NAME";
$searchCritirion[2][HEBREW] = "כותרת השאלה";

$searchCritirion[3][ENGLISH] = "YEAR";
$searchCritirion[3][HEBREW] = "שנה";

$searchCritirion[SEARCH_CRITERIONS_NUMBER - 1][ENGLISH] = "RECOMMENDED";
$searchCritirion[SEARCH_CRITERIONS_NUMBER - 1][HEBREW] = "שאלה מומלצת";
//</searchCriterions>



//-------------------------
//These constants below appear in name both below and both in searchCritirion. Below they
//are they are treated as numbers and in searchCritirion they are treated as strings.
//-------------------------
//<questionsType>
define("QUESTION_TYPE", 0);
define("LECTURER", 1);
define("QUESTION_NAME", 2);
define("YEAR", 3);
define("RECOMMENDED", 4);
//</questionsType>