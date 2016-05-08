<?php
include('lang.php');  
include('ManageLang.php');

?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>&reg; Rox &amp; Cakes</title>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="../_scripts/respond.min.js"></script>
<![endif]-->
<link href="css/main.css" rel="stylesheet" media="screen, projection">
<link href="css/transitions.css" rel="stylesheet" media="screen, projection">
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/site.js"></script>
<script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/custom_survey.js"></script>
<script type="text/javascript" src="js/jquery.columnizer.min.js"></script>
<script type="text/javascript" src="js/html5slider.js"></script>
<script>
 $(document).ready(function() {
   $('.column').columnize({ columns: 2 });
 	$("#review").click(function () { 
		interestsChecked = $('.interests:checked').map(function() {
			return $(this).val();
		}).get();
				if(location.search.split('lang=')[1]=='en'){
				$("#interestsResult").html('<strong>Interest(s): </strong>');   //location.search.split('lang=')[1] test ternaire
				$("#interestsResult").append(interestsChecked.join(', '));
				}else{
				 $("#interestsResult").html('<strong>Interet(s): </strong>');   //location.search.split('lang=')[1] test ternaire
				$("#interestsResult").append(interestsChecked.join(', '));
				}
		sharedChecked = $('.shared:checked').map(function() {
			return $(this).val();
		}).get();
		if(location.search.split('lang=')[1]=='en'){
		$("#sharedResult").html('<strong>Shared: </strong>');
		$("#sharedResult").append(sharedChecked.join(', '));	
		}else{
		 $("#sharedResult").html('<strong>Vu par: </strong>');
		$("#sharedResult").append(sharedChecked.join(', '));
		}
				var theDesiredCourse = localStorage.getItem('desiredCourse');
				if(location.search.split('lang=')[1]=='en'){
				theDesiredCourse = "<strong>Desired:</strong> " + theDesiredCourse;
				$("#desiredCourseResult").html(theDesiredCourse);
				}else{
				 theDesiredCourse = "<strong>Souhait(s):</strong> " + theDesiredCourse;
				$("#desiredCourseResult").html(theDesiredCourse);
				}
		var Length = localStorage.getItem('Length');
		if(location.search.split('lang=')[1]=='en'){
		theLength = "<strong>Practice:</strong> " + Length;
		$("#lengthResult").html(theLength);
		}else{
		theLength = "<strong>Pratique:</strong> " + Length;
		$("#lengthResult").html(theLength);
		}
		
				var theHoursPractice = localStorage.getItem('hoursPractice');
				if(location.search.split('lang=')[1]=='en'){
				theHoursPractice = "<strong>Hour(s):</strong> " + theHoursPractice;
				$("#hoursPracticeResult").html(theHoursPractice);
				}else{
				 theHoursPractice = "<strong>Heure(s):</strong> " + theHoursPractice;
				$("#hoursPracticeResult").html(theHoursPractice);
				}
			var theName = localStorage.getItem('name');
			$("#name").html(theName);
	});
});
   	// Update text field for slider
	function printValue(sliderID, textbox) {
		var x = document.getElementById(textbox);
		var y = document.getElementById(sliderID);
		x.value = y.value;
	}
	window.onload = function() { 
		printValue('hoursPractice', 'hoursPracticeValue');
	}
</script>
<style>
    p{
	   font-family:arial;
	}
	.endInfos{width:30%;height:10px;}
</style>

</head>
<body>
        <div id="flags">
        <a href="course2.php?lang=fr"> <img src="layouts/fr.JPG"/> </a>
        <a href="course2.php?lang=en"><img src="layouts/en.JPG"/></a>
		</div>
        <div id="logo" style="margin-top:50px;float:left;"></div>
<article id="mainContent">
  <h1><?php echo $lang[$_SESSION['lang']]['survey']; ?></h1>
  <p><?php echo $lang[$_SESSION['lang']]['lessonPro']; ?></p>
  <div id="theArt">
    <div id="cube" class="show-front">
      <form  id="theForm" method="get" action="finalize.php">
        <div class="front panel">
          <div class="innerContainer">
            <h2>Q 1/5</h2>
            <p><?php echo $lang[$_SESSION['lang']]['interest']; ?> <br>
                <?php echo $lang[$_SESSION['lang']]['choose']; ?></p>
            <div class="column">
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_0" value="Croissant" />
                  Croissant</label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_1" value="<?php echo $lang[$_SESSION['lang']]['painchoco']; ?>" />
                  <?php echo $lang[$_SESSION['lang']]['painchoco']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_2" value="Cupcakes" />
                  Cupcakes</label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_3" value="Macarons"  />
                  Macarons</label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_4" value="Muffins"  />
                  Muffins</label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_5" value="<?php echo $lang[$_SESSION['lang']]['pie']; ?>"  />
                  <?php echo $lang[$_SESSION['lang']]['pie']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_6" value="<?php echo $lang[$_SESSION['lang']]['cakes']; ?>"  />
                  <?php echo $lang[$_SESSION['lang']]['cakes']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_7" value="<?php echo $lang[$_SESSION['lang']]['design']; ?>"  />
                  <?php echo $lang[$_SESSION['lang']]['design']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_8" value="<?php echo $lang[$_SESSION['lang']]['choco']; ?>"   />
                  <?php echo $lang[$_SESSION['lang']]['choco']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_9" value="<?php echo $lang[$_SESSION['lang']]['sweet']; ?>"   />
                  <?php echo $lang[$_SESSION['lang']]['sweet']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_10" value="<?php echo $lang[$_SESSION['lang']]['french']; ?>"   />
                  <?php echo $lang[$_SESSION['lang']]['french']; ?></label>
              </p>
              <p>
                <label>
                  <input name="interests_" type="checkbox" class="interests" id="interests_11" value="<?php echo $lang[$_SESSION['lang']]['inter']; ?>"  />
                  <?php echo $lang[$_SESSION['lang']]['inter']; ?></label>
              </p>
            </div>
            <p class="show-buttons">
              <input type="button" class="show-back alignRight" value="<?php echo $lang[$_SESSION['lang']]['next']; ?>" />
            </p>
          </div>
        </div>
        <div class="back cf panel">
          <div class="innerContainer">
            <h2>Q 2/5</h2>
            <p><?php echo $lang[$_SESSION['lang']]['choice']; ?></p>
            <p>
              <input id="desiredCourse" type="text" placeholder="<?php echo $lang[$_SESSION['lang']]['desire']; ?>" /></p>
            <p class="show-buttons">
              <input type="button" class="show-front alignLeft" value="<?php echo $lang[$_SESSION['lang']]['previous']; ?>" />
              <input type="button" class="show-right alignRight" value="<?php echo $lang[$_SESSION['lang']]['next']; ?>" />
            </p>
          </div>
        </div>
        <div class="right cf panel">
          <div class="innerContainer">
            <h2>Q 3/5</h2>
            <p><?php echo $lang[$_SESSION['lang']]['you']; ?></p>
           <p>
              <input type="radio" id="Length1" name="Length" value='<?php echo $lang[$_SESSION['lang']]['kid']; ?>' />
              <label><?php echo $lang[$_SESSION['lang']]['kid']; ?></label>
            </p>
            <p>
              <input type="radio" id="Length2" name="Length" value="<?php echo $lang[$_SESSION['lang']]['ago']; ?>" />
              <label><?php echo $lang[$_SESSION['lang']]['ago']; ?></label>
            </p>
            <p>
              <input type="radio" id="Length3" name="Length" value="<?php echo $lang[$_SESSION['lang']]['year']; ?>" />
              <label><?php echo $lang[$_SESSION['lang']]['year']; ?></label>
            </p>
            <p>
              <input type="radio" id="Length4" name="Length" value="<?php echo $lang[$_SESSION['lang']]['life']; ?>" />
              <label><?php echo $lang[$_SESSION['lang']]['life']; ?></label>
            </p>
            <p>
              <input type="radio" id="Length5" name="Length" value="<?php echo $lang[$_SESSION['lang']]['never']; ?>" />
              <label><?php echo $lang[$_SESSION['lang']]['never']; ?></label>
            </p>
            <p class="show-buttons">
              <input type="button" class="show-back alignLeft" value="<?php echo $lang[$_SESSION['lang']]['previous']; ?>" />
              <input type="button" class="show-left alignRight" value="<?php echo $lang[$_SESSION['lang']]['next']; ?>" />
            </p>
          </div>
        </div>
        <div class="left cf panel">
          <div class="innerContainer">
            <h2>Q 4/5</h2>
            <p><?php echo $lang[$_SESSION['lang']]['practice']; ?></p>
            <p>
              <input type="range" min="0" max="10" value="0" id="hoursPractice" onchange="printValue('hoursPractice','hoursPracticeValue')" />
            </p>
            <p>
              <input type="text" id="hoursPracticeValue" placeholder="<?php echo $lang[$_SESSION['lang']]['move']; ?>" />
            </p>
            <p class="show-buttons">
              <input type="button" class="show-right alignLeft" value="<?php echo $lang[$_SESSION['lang']]['previous']; ?>" />
              <input type="button" class="show-top alignRight" value="<?php echo $lang[$_SESSION['lang']]['next']; ?>" />
            </p>
          </div>
        </div>
        <div class="top cf panel">
          <div class="innerContainer">
            <h2>Q 5/5</h2>
            <p><?php echo $lang[$_SESSION['lang']]['share']; ?><br>
               <?php echo $lang[$_SESSION['lang']]['check']; ?></p>
			 <p>
              <label>
                <input class="shared" type="checkbox" name="viewers_" value="<?php echo $lang[$_SESSION['lang']]['family']; ?>" id="viewers_0" />
                <?php echo $lang[$_SESSION['lang']]['family']; ?></label>
            </p>
            <p>
              <label>
                <input class="shared" type="checkbox" name="viewers_" value=" <?php echo $lang[$_SESSION['lang']]['friend']; ?>" id="viewers_0" />
                  <?php echo $lang[$_SESSION['lang']]['friend']; ?></label>
            </p>
            <p>
              <label>
                <input class="shared" type="checkbox" name="viewers_" value="<?php echo $lang[$_SESSION['lang']]['teacher']; ?>" id="viewers_0" />
                 <?php echo $lang[$_SESSION['lang']]['teacher']; ?></label>
            </p>
            <p>
              <label>
                <input class="shared" type="checkbox" name="viewers_" value="<?php echo $lang[$_SESSION['lang']]['public']; ?>" id="viewers_0" />
                  <?php echo $lang[$_SESSION['lang']]['public']; ?></label>
            </p>
            <p>
              <label>
                <input class="shared" type="checkbox" name="viewers_" value="<?php echo $lang[$_SESSION['lang']]['none']; ?>" id="viewers_0" />
                <?php echo $lang[$_SESSION['lang']]['none']; ?></label>
            </p>
            <p class="show-buttons">
              <input type="button" class="show-left alignLeft" value="<?php echo $lang[$_SESSION['lang']]['previous']; ?>" />
              <input id="review" type="button" class="show-bottom alignRight" value="<?php echo $lang[$_SESSION['lang']]['next']; ?>" />
            </p>
          </div>
        </div>
        <div class="bottom cf panel">
          <div class="innerContainer">
            <h2> <?php echo $lang[$_SESSION['lang']]['review']; ?></h2>
            <p><?php echo $lang[$_SESSION['lang']]['please']; ?></p>
            <table width="100%">
              <tr>
                <td width="15%">Q1:</td>
                <td id="interestsResult" width="60%"></td>
                <td width="25%" class="show-buttons"><input type="button" class="show-front" value="<?php echo $lang[$_SESSION['lang']]['modify']; ?>" /></td>
              </tr>
              <tr>
                <td>Q2:</td>
                <td id="desiredCourseResult"></td>
                <td class="show-buttons"><input type="button" class="show-back" value="<?php echo $lang[$_SESSION['lang']]['modify']; ?>" /></td>
              </tr>
              <tr>
                <td>Q3</td>
                <td id="lengthResult"></td>
                <td class="show-buttons"><input type="button" class="show-right" value="<?php echo $lang[$_SESSION['lang']]['modify']; ?>" /></td>
              </tr>
              <tr>
                <td>Q4</td>
                <td id="hoursPracticeResult"></td>
                <td class="show-buttons"><input type="button" class="show-left" value="<?php echo $lang[$_SESSION['lang']]['modify']; ?>" /></td>
              </tr>
              <tr>
                <td>Q5</td>
                <td id="sharedResult"></td>
                <td class="show-buttons"><input type="button" class="show-top" value="<?php echo $lang[$_SESSION['lang']]['modify']; ?>" /></td>
              </tr>
            </table>
           
            <p class="show-buttons">
              <input type="button" class="show-top alignLeft" value="<?php echo $lang[$_SESSION['lang']]['previous']; ?>" />
              <input type="button" class="alignRight" onclick="redirect();" value="<?php echo $lang[$_SESSION['lang']]['submit']; ?>" />
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</article>
<script>
    function redirect(){
	
	   var interest = document.getElementById('interestsResult').innerHTML;
	   var course   = document.getElementById('desiredCourseResult').innerHTML;
	   var length   = document.getElementById('lengthResult').innerHTML;
	    var hours   = document.getElementById('hoursPracticeResult').innerHTML;
		var share   = document.getElementById('sharedResult').innerHTML;
	   
       window.location.href = "finalize.php?interest="+ interest+"&course="+course+"&length="+length+"&hours="+hours+"&share="+ share;
    
	}
</script>
</body>
</html>
