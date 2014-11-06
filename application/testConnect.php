<?php
$link = mysql_connect('','','');
if($link)
{
echo "server Connected"."<br>";
$database = mysql_select_db('',$link);
	if($database)
	{
		echo "database Connected"."<br>";
		$result = mysql_query($kueri);
		if($result)
		{
			
			
		}
		else
		{
			echo "Query Failed";
		}

	}
	else
	{
		echo "Unable to connect to database ";
	}
}
else
{
echo "Unable to connect to server";
}
?>