<?PHP
 
//EDIT YOUR MySQL Connection Info:
$DB_Server = "localhost";        //your MySQL Server
$DB_Username = "root";                 //your MySQL User Name
$DB_Password = "";                //your MySQL Password
$DB_DBName = "teacher";                //your MySQL Database Name
$DB_TBLName1 = "moderator"; 
$DB_TBLName2 = "scrutinizers";
$DB_TBLName3 = "tpd";         
$DB_TBLName4 = "board_viva";      //your MySQL Table Name
$DB_TBLName5 = "adviser";
$DB_TBLName6 = "sessional";
$DB_TBLName7 = "data_entry";
$DB_TBLName8 = "ct_s";
$DB_TBLName9 = "paper_setter";
//$DB_TBLName2 = "scrutinizers";
//$DB_TBLName,  $DB_DBName, may also be commented out & passed to the browser
//as parameters in a query string, so that this code may be easily reused for
//any MySQL table or any MySQL database on your server
 
//DEFINE SQL QUERY:
//edit this to suit your needs
//$sql = "USE my_db";
$sql1 = "Select * from $DB_TBLName1";
$sql2 = "Select * from $DB_TBLName2";
$sql3 = "Select * from $DB_TBLName3";
$sql4 = "Select * from $DB_TBLName4";
$sql5 = "Select * from $DB_TBLName5";
$sql6 = "Select * from $DB_TBLName6";
$sql7 = "Select * from $DB_TBLName7";
$sql8 = "Select * from $DB_TBLName8";
$sql9 = "Select * from $DB_TBLName9";

//Optional: print out title to top of Excel or Word file with Timestamp
//for when file was generated:
//set $Use_Titel = 1 to generate title, 0 not to use title
$Use_Title = 1;
//define date for title: EDIT this to create the time-format you need
$now_date = DATE('d-m-Y H:i');
//define title for .doc or .xls file: EDIT this if you want
$title0 = "Date/* $now_date */";
$title1 = "LIST OF MODERATOR";
$title2 = "LIST OF SCRUTINIZERS";
$title3 = "LIST OF TEACHERS ENGAGED IN TYPING, PRINTING AND DRAWING ETC.:";
$title4 = "LIST OF TEACHERS WHO TOOK PART IN BOARD VIVA:";
$title5 = "LIST OF STUDENT ADVISER:";
$title6 = "LIST OF TEACHERS OF TAKE SESSIONAL CLASS:";
$title7 = "LIST OF TEACHERS FOR DATA ENTRY:";
$title8 = "LIST OF TEACHERS WHO TAKE CLASS TEST:";
$title9 = "LIST OF PAPER SETTER AND SCRIPT EXAMINERS:";
/*
 
Leave the connection info below as it is:
just edit the above.
 
(Editing of code past this point recommended only for advanced users.)
*/
//create MySQL connection
$Connect = @MYSQL_CONNECT($DB_Server, $DB_Username, $DB_Password)
     or DIE("Couldn't connect to MySQL:<br>" . MYSQL_ERROR() . "<br>" . MYSQL_ERRNO());
//select database
$Db = @MYSQL_SELECT_DB($DB_DBName, $Connect)
     or DIE("Couldn't select database:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());
//execute query
$result1 = @MYSQL_QUERY($sql1,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());
$result2 = @MYSQL_QUERY($sql2,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	 
$result3 = @MYSQL_QUERY($sql3,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	 
$result4 = @MYSQL_QUERY($sql4,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	
$result5 = @MYSQL_QUERY($sql5,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());
$result6 = @MYSQL_QUERY($sql6,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	
$result7 = @MYSQL_QUERY($sql7,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	
$result8 = @MYSQL_QUERY($sql8,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	
$result9 = @MYSQL_QUERY($sql9,$Connect)
     or DIE("Couldn't execute query:<br>" . MYSQL_ERROR(). "<br>" . MYSQL_ERRNO());	
	
//if this parameter is included ($w=1), file returned will be in word format ('.doc')
//if parameter is not included, file returned will be in excel format ('.xls')
IF (ISSET($w) && ($w==1))
{
       $file_type = "vnd.ms-excel";
     $file_ending = "xls";

}ELSE {
     $file_type = "msword";
     $file_ending = "doc";
}
//header info for browser: determines file type ('.doc' or '.xls')
HEADER("Content-Type: application/$file_type");
HEADER("Content-Disposition: attachment; filename=database_dump.$file_ending");
HEADER("Pragma: no-cache");
HEADER("Expires: 0");
 
/*    Start of Formatting for Word or Excel    */
 IF ($Use_Title == 1)
     {
         ECHO("$title0\n\n");
     }
 
IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n $title1\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result1))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result1);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result1,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n$title1\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result1); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result1,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result1))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result1);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

//Formatting FOR WORD DOC TABLE SCRUTINIZER
IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title2\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result2))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result2);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result2,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title2\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result2); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result2,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result2))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result2);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

//FORMATING WORD DOC FOR TABLE tpd
IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n $title3\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result3))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result3);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result3,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title3\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result3); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result3,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result3))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result3);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}



// code for board viva

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title4\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result4))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result4);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result4,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title4\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result4); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result4,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result4))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result4);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}


//code for adviser

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title5\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result5))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result5);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result5,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title5\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result5); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result5,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result5))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result5);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

//code for sessional class

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title6\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result6))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result6);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result6,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title6\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result6); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result6,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result6))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result6);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

//code for data entry 

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title7\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result7))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result7);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result7,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title7\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result7); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result7,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result7))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result7);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}


//code for class test

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title8\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result8))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result8);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result8,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title8\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result8); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result8,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result8))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result8);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

// code for paper setter

IF (ISSET($w) && ($w==1)) //check for $w again
{
     /*    FORMATTING FOR WORD DOCUMENTS ('.doc')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title9\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\n"; //new line character
 
     WHILE($row = MYSQL_FETCH_ROW($result9))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result9);$j++)
         {
         //define field names
         $field_name = MYSQL_FIELD_NAME($result9,$j);
         //will show name of fields
         $schema_insert .= "$field_name:\t\t";
             IF(!ISSET($row[$j])) {
                 $schema_insert .= "NULL".$sep;
                 }
             ELSEIF ($row[$j] != "") {
                 $schema_insert .= "$row[$j]".$sep;
                 }
             ELSE {
                 $schema_insert .= "".$sep;
                 }
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         $schema_insert .= "\t\t";
         PRINT(TRIM($schema_insert));
         //end of each mysql row
         //creates line to separate data from each MySQL table row
         PRINT "\n----------------------------------------------------\n";
     }
	 
	 
}ELSE{
     /*    FORMATTING FOR EXCEL DOCUMENTS ('.xls')   */
     //create title with timestamp:
     IF ($Use_Title == 1)
     {
         ECHO("\n\n\n$title9\n\n");
     }
     //define separator (defines columns in excel & tabs in word)
     $sep = "\t\t"; //tabbed character
 
     //start of printing column names as names of MySQL fields
     FOR ($i = 0; $i < MYSQL_NUM_FIELDS($result9); $i++)
     {
         ECHO MYSQL_FIELD_NAME($result9,$i) . "\t\t\t";
     }
     PRINT("\n");
     //end of printing column names
 
     //start while loop to get data
     WHILE($row = MYSQL_FETCH_ROW($result9))
     {
         //set_time_limit(60); // HaRa
         $schema_insert = "";
         FOR($j=0; $j<mysql_num_fields($result9);$j++)
         {
             IF(!ISSET($row[$j]))
                 $schema_insert .= "NULL".$sep;
             ELSEIF ($row[$j] != "")
                 $schema_insert .= "$row[$j]".$sep;
             ELSE
                 $schema_insert .= "".$sep;
         }
         $schema_insert = STR_REPLACE($sep."$", "", $schema_insert);
         //following fix suggested by Josue (thanks, Josue!)
         //this corrects output in excel when table fields contain \n or \r
         //these two characters are now replaced with a space
         $schema_insert = PREG_REPLACE("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
         $schema_insert .= "\t";
         PRINT(TRIM($schema_insert));
         PRINT "\n";
     }
}

?>