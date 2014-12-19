

		


	


<?php
	$subject = 'partie/exemple.html';
	
		
		/*
		if(preg_match("/pgn/i",$subject,$matches))
			{
				
			$subject= preg_replace('/pgn/i', 'html', $subject);
				echo $subject;
		}
		*/
	echo '<input type="submit" value="charger" onclick= "document.location=\'ltpgnviewer.html?'.$subject.'&ParsePgn=2&SetScoreSheet=1\'" /> ';
	
?>
