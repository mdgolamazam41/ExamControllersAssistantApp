<!doctype html>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="css/new_css.css" />
<link type="text/css" rel="stylesheet" href="css/new_rec.css" />
<link type="text/css" rel="stylesheet" href="css/menu.css"  />
<title>RUET/CSE</title>

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

<?php 
$con=mysqli_connect("localhost","root","");
 if (!$con)
 { 
 die('Could not connect: ' . mysql_error()); 
 }

if(mysqli_query($con,"CREATE DATABASE teacher")) 
{ 
echo "Database created";
} 

mysqli_select_db($con,"teacher"); 
 $sq = "CREATE TABLE scrutinizers(SL_no int PRIMARY KEY auto_increment, Name_of_Teacher varchar(255), Total_no_of_Script varchar(20))"; 

 // Execute query 
 mysqli_query($con,$sq); 
 mysqli_select_db($con,"teacher" ); 
 
 $sql1 = "INSERT INTO scrutinizers (SL_no, Name_of_Teacher, Total_no_of_Script) 
 VALUES ('','$_POST[scrutinizer]','$_POST[T_Script_no]')";
 $cqry = mysqli_query($con, $sql1);
if (!$cqry)
 { 
 die('Error: ' . mysqli_error($con));
 } 
 
 mysqli_select_db($con, "teacher" ); 
  $result1 = mysqli_query($con,"SELECT * FROM scrutinizers");

  $result = mysqli_query($con,"SELECT * FROM scrutinizers");
echo "<br><h3 align='center'> List of Scrutinizers</h3>";
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<tr>
<th>SL. No</th>
<th>Name of Teacher</th>
<th>Total No. of Script</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['SL_no'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  
  echo "<td>" . $row['Total_no_of_Script'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con); 
?> 
</div><!--end mod_print -->