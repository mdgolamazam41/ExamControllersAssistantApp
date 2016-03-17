<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RUET CSE EXAM CONTROLLER</title>
<style type="text/css" media="print">
.printbutton {
visibility: hidden;
display: none;
}
#border{
	border: 5px #000;
	border-color: #000;
	height: 1500px;
	width: 1000px;
	margin: 1px 1px 1px 2px;
	background-color: #FFFFFF;
}
</style>

    <p align="left">

<script>
document.write("<input type='button' " +
"onClick='window.print()' " +
"class='printbutton' " +
"value='Print This Page'/>");
</script></p>
</head>
<body>

<?php $con=mysql_connect("localhost","root","");
 if (!$con)
 { 
 die('Could not connect: ' . mysql_error()); 
 }

 // Execute query 
 mysql_query($sql,$con); 
 mysql_select_db("teacher", $con); 
 
/* $sql= "INSERT INTO moderator (SL_no, Moderator, Rank, paper_no) 
 VALUES ('$_POST[SL_no]','$_POST[Moderator]','$_POST[Rank]','$_POST[paper_no]')";
 

if (!mysql_query($sql,$con))
 { 
 die('Error: ' . mysql_error());
 } 
 echo "1 new record added <br>";*/
 
 $result1 = mysql_query("SELECT * FROM moderator");
 $result2 = mysql_query("SELECT * FROM scrutinizers");
 $result3 = mysql_query("SELECT * FROM tpd");
 ?>
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
while($row = mysql_fetch_array($result1))
 {
	 
echo "<tr>";
  echo "<td align='center'> ". $row['SL_no']." </td>";
  echo "<td> ". $row['Moderator'] ."</td>";
  echo "<td>". $row['Rank'] ."</td>";
  echo "<td align='center'>". $row['paper_no'] ."</td>";
echo "</tr>";
 }
echo "</table>";

 
echo "<br> <p align='center'>List of the Scrutinizers:</p>";
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<tr>
<th>SL_no</th>
<th width='65%'>Name of Teacher</th>
<th>Total No. of Scripts:</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td align='center'>" . $row['SL_no'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  echo "<td align='center'>" . $row['Total_no_of_Script'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

//TABLE tpd
 
echo "<br> <p align='center'>List of Teacher Engaged in Typing, Pringting and Drawing Figure :</p>";
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<tr>
<th>SL_no</th>
<th width='65%'>Name of Teacher</th>
<th>Total No. of Scripts:</th>
</tr>";

while($row = mysql_fetch_array($result3))
  {
  echo "<tr>";
  echo "<td align='center'>" . $row['SL_no'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  echo "<td align='center'>" . $row['Total_no_of_Script'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

 
 $result1 = mysql_query("SELECT * FROM board_viva");
 $result2 = mysql_query("SELECT * FROM adviser");
 //$result3 = mysql_query("SELECT * FROM tpd");

 
 //TABLE board_viva
//echo "<br><p align='center'> List of Teachers who are engaged with Board viva for 5th semester:</p>";
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<caption align='top'> <br>List of Teachers who are engaged with Board viva for 5th semester:</caption>
<tr>
<th>SL_no</th>
<th width='65%'>Name of Teacher</th>
<th>No of Students</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td align='center'>" . $row['SL_no'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  
  echo "<td align='center'>" . $row['No_of_Students'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

//TABLE advisor 
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<caption align='top'><br><br>List of Student Advisers:</caption>
<tr>
<th>SL. No</th>
<th>Name of Teacher</th>

</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['SL_no'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

$result1 = mysql_query("SELECT * FROM sessional");
 $result2 = mysql_query("SELECT * FROM data_entry");
 //$result3 = mysql_query("SELECT * FROM tpd");


echo "<br> <p align='center'>List of Teacher for Sessional Class:</p>";
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<tr>
<th>Course No<br> & Title</th>
<th>Name of Teachers</th>
<th>Credit</th>
<th>No of Students</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['Course_No_Title'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  
  echo "<td>" . $row['Credit'] . "</td>";
  echo "<td>" . $row['No_of_Students'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


//TABLE data entry
echo "<h4 align='center'>List of Teacher for data entry</h4>";
 echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<tr>
<th>Name of Teachers<br> & Title</th>
<th>No of theory Subject</th>
<th>No of Sessional subject</th>
<th>No of Students</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
 
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
   echo "<td align='center'>" . $row['No_of_Theory_Sub'] . "</td>";
  echo "<td align='center'>" . $row['No_of_Sessional'] . "</td>";
  echo "<td align='center'>" . $row['No_of_Students'] . "</td>";
  echo "</tr>";
  }
  
echo "</table>";

 $result1 = mysql_query("SELECT * FROM ct_s");
 $result2 = mysql_query("SELECT * FROM paper_setter");
 //$result3 = mysql_query("SELECT * FROM tpd");

 
echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<caption align='top'><br><br>List of Teacher for Class Test<br></caption>
<tr>
<th>Course No</th>
<th>Name of Teachers</th>
<th align='center'>Credit</th>
<th align='center'>No of Students</th>
</tr>";

while($row = mysql_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['Course_no_Title2'] . "</td>";
  echo "<td>" . $row['Name_of_Teachers'] . "</td>";
  echo "<td align='center'>" . $row['No_of_Students'] . "</td>";
  echo "<td align='center'>" . $row['No_of_Test'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo "<table border='1' bordercolor='#000000' align='center' cellpadding='0' cellspacing='0' width='800px'>
<caption align='top'><br><br>List of Paper Setter and Script Examiners:</caption>
<tr>
<th>Course No<br> & Title</th>
<th>Name of Teachers</th>
<th>No of Students</th>
</tr>";

while($row = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $row['Course_No_Title'] . "</td>";
  echo "<td>" . $row['Name_of_Teacher'] . "</td>";
  echo "<td>" . $row['No_of_Students'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con); 
?> 
</table>
<blockquote><pre>
<a href="4thsemister.html" class="style17 style18">&lt;&lt;BACK</a>
   </pre> </blockquote>
</div>

</body>
</html>