<!doctype html>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="css/new_css.css" />
<script type="text/javascript" src="js/jquery.js">
</script>
<title>RUET/CSE</title>
<script type="text/javascript">
$(document).ready(function(e) {
   $("mod1").click(function(){
  $.ajax({url:"moderator1.php", success:function(result){
    $("#new_data").html(result);
  }});
});
});
</script>
</head>

<body>

<div id="mod">
<h4>List of the members who took part in moderation</h4>
<form action="moderator1.php" name="addmod" method="post" target="_top">
 <pre>  
Name o Teacher: <select name="Moderator">
        <option >Select A Teacher</option>
         <option value="Prof. Dr. Md. Shahid Uz Zaman, Head of CSE Dept.,RUET">Prof. Dr. Md. Shahid Uz Zaman, Head of CSE Dept.,RUET</option>
         <option value="Syed Tauhid Zuhori, Asst Prof, CSE, RUET, Rajshahi">Syed Tauhid Zuhori, Asst Prof, CSE, RUET, Rajshahi</option>
          <option value="Dr.Md. Bellal Hossain, Prof, Math, RUET">Dr.Md. Bellal Hossain, Prof, Math, RUET</option>
           <option value="Boshir Ahmed, Asst Prof, CSE, RUET, Rajshahi.">Boshir Ahmed, Asst Prof, CSE, RUET, Rajshahi.</option>
          <option value="Prof. Dr. Md. Rafiqul Islam, Head of EEE Dept, RUET">Prof. Dr. Md. Rafiqul Islam, Head of EEE Dept, RUET</option>
          <option value="Dr. Md. Al Mamun, Asst Prof, CSE, RUET">Dr. Md. Al Mamun, Asst Prof, CSE, RUET</option>
          <option value="Rizoan Toufiq, Lecturer of CSE, RUET">Rizoan Toufiq, Lecturer of CSE, RUET</option>
          <option value="Md. Arafat Hossain, Asst Prof, CSE, RUET">Md. Arafat Hossain, Asst Prof, CSE, RUET.</option>
        <option value="Julia Rahman, Lecturer, CSE, RUET, Rajshahi">Julia Rahman, Lecturer, CSE, RUET, Rajshahi.</option>
        <option value="Shyla Afroz, Lecturer, CSE, RUET, Rajshahi">Shyla Afroz, Lecturer, CSE, RUET, Rajshahi.</option>
          <option value="Dr. Kazi Khairul Islam, Prof, EEE Dept, IUT, Gazipur">Dr. Kazi Khairul Islam, Prof, EEE Dept, IUT, Gazipur</option>
          </select>
	      
Rank          : <select type="text" name="Rank">
           <option value="Chairman">Chairman</option>
           <option value="Member">Member</option> </select>          No of papers  :  <input type="number" name="paper_no"/>      </pre>
           <input type="submit" name="sub" value="submit data" onClick="alert('new data added to moderator')" />
           </form>
</div><!-- end mod-->

</body>
</html>