<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="css/new_css.css" />
<link type="text/css" rel="stylesheet" href="css/menu.css"  />
<title> confirmation box and submition confirmation</title>

</head>

<body>

<table width="800" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/CSE_BAMMER.jpg" alt="NOT FOund" width="800" height="108" id="CSE_BANNER" /></td>
  </tr>
</table>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td bgcolor="#E2E2DC" class="style11"><div align="center" class="style14">2nd year 4th Semester Examination, 2013 </div></td>
  </tr>
    <tr>
    <td ><div class="style17" id="topnav-inner" align="center">
      <nav>
         <ul class="nav">
              <li> <a href="ruetcse.html">home</a></li>
              <li id="fourthsem"><a href="4thsemister.php">4th semester</a></li>
              <li><a href="new_record.php">New record</a>
                    <ul>
                         <li><a href="#">all</a></li>
                         <li><a href="#">moderators</a></li>
                         <li><a href="#">Scrutinizers</a></li>
                          <li><a href="#">Teachers engaged in typing, drawing and printing figure</a></li>
                           <li><a href="#">Teachers involved in board viva</a></li>
                            <li><a href="#">Student Advisor</a></li>
                             <li><a href="#">Teachers who take sessional class</a></li>
                              <li><a href="#">Teachers involved in Data entry</a></li>
                               <li><a href="#">Teachers Who take CTs</a></li>
                               <li><a href="#">Paper Setter and Script Examiners</a></li>
                    </ul>
              </li>
              <li><a href="edit.php">Edit record</a></li>
              <li><a href="search.php">Search record</a>
                    <ul>
                         <li><a href="#">all</a></li>
                         <li><a href="#">moderators</a></li>
                         <li><a href="#">Scrutinizers</a></li>
                          <li><a href="#">Teachers engaged in typing, drawing and printing figure</a></li>
                           <li><a href="#">Teachers involved in board viva</a></li>
                            <li><a href="#">Student Advisor</a></li>
                             <li><a href="#">Teachers who take sessional class</a></li>
                              <li><a href="#">Teachers involved in Data entry</a></li>
                               <li><a href="#">Teachers Who take CTs</a></li>
                               <li><a href="#">Paper Setter and Script Examiners</a></li>
                    </ul>
              </li>     
              <li><a href="export.php">export record</a>
                   <ul>
                            <li><a href="exporting_into_word.php">Export into word</a></li> 
                            <li><a href="exporting_into_word.php">Export into excel</a></li> 
                </ul>
              </li> 
          </ul><!-- end of ul nav -->
        </nav>
       </div><!-- end topnav-inner -->
      </td>
  </tr>
</table>

<p style="color: #900; padding-left:200px; font-weight: bold;">All data being submitted successfully....</p>
<?php 
 //phpinfo();
 $con=mysqli_connect("localhost","root","");
 if(!$con)
 { 
 die('Could not connect: ' . mysql_error()); 
 }
$sq = "CREATE DATABASE teacher";
$sq1 = mysqli_query($con,$sq);
if ($sq1) 
{ 
echo "Database created";
} 
 /*else 
 {
 echo "Error creating database: " . mysqli_error(); 
 } */
 
 //create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE moderator (SL_no int , Moderator varchar(255), Rank varchar(20), paper_no int)"; 

 // Execute query 
 mysqli_query($con, $sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO moderator (SL_no, Moderator, Rank, paper_no) 
 VALUES ('','$_POST[Moderator]','$_POST[Rank]','$_POST[paper_no]')";
 
$sql3=mysqli_query($con,$sql);
if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysqli_error());
 } 
 
 mysqli_select_db($con,"teacher"); 
 $sql2 = "CREATE TABLE scrutinizers (SL_no int auto_increment, Name_of_Teacher varchar(255), Total_no_of_Script varchar(20))"; 

 // Execute query 
 mysqli_query($con,$sql2); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO scrutinizers (SL_no, Name_of_Teacher, Total_no_of_Script) 
 VALUES ('','$_POST[scrutinizer]','$_POST[T_Script_no]')";
 
if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysql_error());
 } 
 
  //create table tpd
mysqli_select_db($con,"teacher" ); 
 $sql = "CREATE TABLE tpd (SL_no int, Name_of_Teacher varchar(255), Total_no_of_Script int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO tpd (SL_no, Name_of_Teacher, Total_no_of_Script) 
 VALUES ('','$_POST[tpd]','$_POST[T_Script_no2]')";
 
$sq5 = mysqli_query($con,$sql);
if (!$sq5)
 { 
 die('Error: ' . mysql_error());
 } 
  //create table board viva
mysqli_select_db($con,"teacher"); 
 $s = "CREATE TABLE board_viva(SL_no int PRIMARY KEY auto_increment, Name_of_Teacher varchar(255), No_of_Students int)"; 

 // Execute query 
 mysqli_query($con, $s); 
 mysqli_select_db($con,"teacher"); 
 
 $sql5= "INSERT INTO board_viva(SL_no, Name_of_Teacher, No_of_Students) 
 VALUES ('','$_POST[name_of_teacher4]','$_POST[no_of_student]')";
 
$sq4 = mysqli_query($con,$sql5);
if (!$sq4)
 { 
 die('Error: ' . mysqli_error($con));
 } 
 
  //create table advisor
mysqli_select_db($con,"teacher"); 
$sql = "CREATE TABLE adviser(SL_no int PRIMARY KEY auto_increment, Name_of_Teacher varchar(255), No_of_Students int)"; 
 // Execute queryuery, 
 mysqlI_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO adviser (SL_no, Name_of_Teacher) 
 VALUES ('','$_POST[s_adviser]')";
 
$CK = mysqli_query($con,$sql);
if (!$CK)
 { 
 die('Error: ' . mysqli_error($con));
 } 
 
 //create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE sessional (Course_No_Title varchar(20), Name_of_Teacher varchar(255), Credit float, No_of_Students int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO sessional (Course_No_Title, Name_of_Teacher, Credit, No_of_Students) 
 VALUES ('$_POST[course_no_title]','$_POST[name_of_teacher6]','$_POST[credit]','$_POST[no_of_student1]')";
 

if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysql_error());
 } 
 
 
//create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE data_entry (Name_of_Teacher varchar(255), No_of_Theory_Sub int, No_of_Sessional int, No_of_Students int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO data_entry (Name_of_Teacher, No_of_Theory_Sub, No_of_Sessional, No_of_Students) 
 VALUES ('$_POST[name_of_teacher7]','$_POST[no_of_theorysub]','$_POST[no_of_sessional]','$_POST[no_of_students7]')";
 

if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysql_error());
 } 
 
  //create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE ct_s(Course_no_Title2 varchar(25), Name_of_Teachers varchar(255), No_of_Students int, No_of_Test int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO ct_s(Course_no_Title2, Name_of_Teachers, No_of_Students, No_of_Test) 
 VALUES ('$_POST[course_no_title2]','$_POST[name_of_teacher8]','$_POST[no_of_students8]','$_POST[no_of_test]')";
 
if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysql_error());
 } 
 
  //create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE paper_setter (Course_No_Title varchar(200), Name_of_Teacher varchar(255),No_of_Students int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher"); 
 
 $sql= "INSERT INTO paper_setter (Course_No_Title, Name_of_Teacher,No_of_Students) 
 VALUES ('$_POST[course_no_title3]','$_POST[name_of_teacher9]','$_POST[no_of_students9]')";
 

if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysql_error());
 } 
 
 

mysqli_close($con); 
?> 
</body>
</html>