<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="js/jquery.js">
</script>
<link type="text/css" rel="stylesheet" href="css/new_css.css" />
<link type="text/css" rel="stylesheet" href="css/new_rec.css" />
<link type="text/css" rel="stylesheet" href="css/menu.css"  />
<title>RUET/CSE</title>
<script type="text/javascript">
$(document).ready(function(e) {
   $("#imran0").click(function(){
  $.ajax({url:"moderator.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});

$(document).ready(function(e) {
   $("#imran1").click(function(){
  $.ajax({url:"scrutinizers.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});

$(document).ready(function(e) {
   $("#imran2").click(function(){
  $.ajax({url:"drawing_printing.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});

$(document).ready(function(e) {
   $("#imran3").click(function(){
  $.ajax({url:"boardviva.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});

$(document).ready(function(e) {
   $("#imran4").click(function(){
  $.ajax({url:"studadvisor.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});
</script>
</head>

<body>
<table width="800" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/CSE_BAMMER.JPG" alt="NOT FOund" width="800" height="108" id="CSE_BANNER" /></td>
  </tr>
</table>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td bgcolor="#E2E2DC" class="style11"><div align="center" class="style14">2nd year 4th Semester Examination, 2013 </div></td>
  </tr>
    <tr>
    <td nowrap="nowrap" bgcolor="#FFFFFF" ><div id="topnav-inner" class="style17" align="center">
    <nav>
    <ul  class="nav">
       <li> <a href="ruetcse.html">home</a></li>
        <li><a href="4thsemister.php">4th semester</a></li>
        <li id="new_r"><a href="new_record.php">New record</a>
             
         </li>
         <li><a href="edit.php">Edit record</a></li>
         <li><a href="#">Search record</a>
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
             </ul><!-- end of ul -->
             </nav>
     </div></td>
  </tr>
</table>
<div id="new_data">
 <OL class="imran">
                 <li><a href="4thsemister.php">All</a></li>
                  <!-- <li id="mod1"><a>Moderators</a></li>
                   <li><a href="scrutinizers.php">Scrutinizers</a></li>
                    <li><a href="drawing_printing.php">Typing, Drawing, Printing figure etc.</a></li>
                     <li><a href="boardviva.php">Viva Board</a></li>
                      <li><a href="studadvisor.php">Student Advisor</a></li>
                       <li><a href="sessional.php">Sessional Class</a></li>
                        <li><a href="dataentry.php">Data Entry</a></li>
                         <li><a href="ct.php">Class test</a></li>
                          <li><a href="pappersetter.php">Papper Setter and Script Examiners</a></li>-->
                          <?php
						  $link=array("moderators","scrutinizers","Typing, Drawing, Printing figure etc.","Viva Board","Student Advisor","Sessional Class","Data Entry","Class test","Papper Setter and Script Examiners");
						  for($i=0;$i<9;$i++){
							  echo"<li id='imran".$i."' <a>".$link[$i]."</a></li>";
						  }
						  ?>
              </OL>
  </div>
 </body>
 </html>