//initialize
YAHOO.example.statesArray.sort();
question.sort();
lecturer.sort();
title.sort();
year.sort(function(a,b){return a-b});   //sort depending on number



del_rep(YAHOO.example.statesArray);     //delete all repetitions from arrays, this needs sorting before it
del_rep(question);
del_rep(lecturer);
del_rep(title);
del_rep(year);


//<initialize data="initialize select to be question type">
addOptionsToSelect(document.searchForm.selectList, YAHOO.example.statesArray);
choseSearchMethod();
GetSelectedItem();
//</initialize>





//--------------- Yahoo AJAX AutoComplete -------------
YAHOO.example.ACJSArray = new function()
{
	// Instantiate first JS Array DataSource
	this.oACDS = new YAHOO.widget.DS_JSArray(YAHOO.example.statesArray);

	// Instantiate first AutoComplete
	this.oAutoComp = new YAHOO.widget.AutoComplete('statesinput','statescontainer', this.oACDS);
	this.oAutoComp.prehighlightClassName = "yui-ac-prehighlight";
	this.oAutoComp.typeAhead = true;
	this.oAutoComp.useShadow = true;
	this.oAutoComp.minQueryLength = 0;
	this.oAutoComp.forceSelection = false;
	//this.oAutoComp.alwaysShowContainer = false; 
	this.oAutoComp.textboxFocusEvent.subscribe
	(function(){
		var sInputValue = YAHOO.util.Dom.get('statesinput').value;
		if(sInputValue.length === 0) 
		{
			var oSelf = this;
			setTimeout(function(){oSelf.sendQuery(sInputValue);},0);
		}
	});
};
//--------------- Yahoo AJAX AutoComplete END -------


function getSearchType()
{
    len = document.searchForm.search_type.length;	//how many radio buttons there are
	
	for (i = 0; i <len; i++) 
	{
		if (document.searchForm.search_type[i].checked) 
		{
			chosen = document.searchForm.search_type[i].value;
		}
	}
	
	return chosen;
}


function GetSelectedItem() //Get what type of search to fill the autocomplete array with the right data
{
    chosen = getSearchType();
	
	switch(chosen)
	{
		case "QUESTION_TYPE":
			fill_array(YAHOO.example.statesArray ,question);
			break;
		case "LECTURER":
			fill_array(YAHOO.example.statesArray ,lecturer);
			break;
		case "QUESTION_NAME":
			fill_array(YAHOO.example.statesArray ,title);
			break;
		case "YEAR":
			fill_array(YAHOO.example.statesArray ,year);
			break;
		default:
			break;
	}
	
	addOptionsToSelect(document.searchForm.selectList, YAHOO.example.statesArray);
	
	if(chosen == "RECOMMENDED")
	{
		document.getElementById('statesinput').style.visibility='hidden';
		document.getElementById('selectList').style.visibility='hidden';
	}
	else
	{   
	     choseSearchMethod();
	}
}




function choseSearchMethod()
{
    searchType = getSearchType();
    
    if(searchType != "RECOMMENDED" )
    {
        searchMethodsRadioButtons = document.searchForm.searchMethod;
        for(i = 0; i < searchMethodsRadioButtons.length; i++)
        {
            if(searchMethodsRadioButtons[i].checked)
            {
                searchMethod = searchMethodsRadioButtons[i].value;
                break;
            }
        }
        
        switch(searchMethod) 
        {
        case "dropDownList":
            document.getElementById('statesinput').style.visibility = 'hidden';
            document.getElementById('selectList').style.visibility = 'visible';
    	    break;
        case "typedSearch":
            document.getElementById('selectList').style.visibility = 'hidden';
            document.getElementById('statesinput').style.visibility = 'visible';
    	    break;
        default:
            alert("Sorry: error in method");
            break;
        }
    }
}