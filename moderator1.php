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

<?php $con=mysqli_connect("localhost","root","");
 if (!$con)
 { 
 die('Could not connect: ' . mysql_error()); 
 }
$q1="CREATE DATABASE teacher";
if(mysqli_query($con, $q1)) 
{ 
echo "Database created";
} 
 /*else 
 {
 echo "Error creating database: " . mysql_error(); 
 } */
 
 //create table
mysqli_select_db($con,"teacher"); 
 $sql = "CREATE TABLE moderator(SL_no int NOT NULL PRIMARY KEY AUTO_INCREMENT, Moderator varchar(255), Rank varchar(20), paper_no int)"; 

 // Execute query 
 mysqli_query($con,$sql); 
 mysqli_select_db($con,"teacher" ); 
 
 $sql= "INSERT INTO moderator (SL_no, Moderator, Rank, paper_no) 
 VALUES ('','$_POST[Moderator]','$_POST[Rank]','$_POST[paper_no]')";
 

if (!mysqli_query($con,$sql))
 { 
 die('Error: ' . mysqli_error());
 } 
 
 mysqli_select_db($con, "teacher"); 
  $result1 = mysqli_query($con, "SELECT * FROM moderator");
 ?>
 
<div id="mod1">
  <h3 align="center" valign="top">Rajshahi University of Engineering and Technology, Rajshahi-6204, Bangladesh<br>
 B.Sc. Engineering 2nd year 4th semester Examination,2013</h3>
 <h2 align="center">DEPARTMENT OF COMPUTER SCIENCE & ENGINEERING</h2>
 <p align='center'> List of the members who took part in moderation:</p>

<table border="1" bordercolor="#000000" align="center" cellpadding="0" cellspacing="0" width="800px">
<tr>
<th>SL_no</th>
<th>Moderator</th>
<th>Rank</th>
<th>paper_no</th>
</tr>
<?php
while($row = mysqli_fetch_array($result1))
 {
	 
echo "<tr>";
  echo "<td align='center'> ". $row['SL_no']." </td>";
  echo "<td> ". $row['Moderator'] ."</td>";
  echo "<td>". $row['Rank'] ."</td>";
  echo "<td align='center'>". $row['paper_no'] ."</td>";
echo "</tr>";
 }
echo "</table>";
?>
</div><!--end mod_print -->
</body>
</html>