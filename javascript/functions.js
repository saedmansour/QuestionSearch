function addOptionsToSelect(dropDownList, arrayOfValues)
{
    var j = 0;
    
    //<clearlist>
    dropDownList.options.length = 0;
    //</clearlist>


    //<addValues>
	for(i = 0; i < arrayOfValues.length; i++)
	{
	    if(arrayOfValues[i] != null)
	    {
	        optionValue = arrayOfValues[i];
	        optionText = arrayOfValues[i];
		    dropDownList.options[j] = new Option(optionValue, optionText);
		    j++
		}
	}
	//</addValues>
}



function del_rep(array)	//array must be sorted before del_rep is called
{
	for(i = 1; i < array.length; i++)
	{
		if(array[i] == array[i-1])
			delete array[i-1];
	}
}



function fill_array(out_array ,in_array) //change output array(used by yahoo AJAX)
{
	for(i = 0; i < in_array.length; i++)
		out_array[i] = in_array[i];
	for(i = in_array.length; i < out_array.length; i++ )
		delete out_array[i];	
}

