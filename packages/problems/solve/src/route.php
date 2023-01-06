<?php  

Route::get('/problems', function(){
    $sample = array(2, 4,1, 5, 1, 2,1, 3);
	$count = count($sample);
	$sumArray = array($sample[0]);
	
	for($i=1;$i<$count;$i++){
	  $value = $sample[$i] + $sumArray[$i-1];
	  array_push($sumArray,$value);
	 
	}
	$max = max($sumArray);
	$subArray = array($max);
	for($i=0;$i<$count-1;$i++){
	  $value = $max - $sumArray[$i];
	  array_push($subArray,$value);
	}
	echo '<h5 class="card-title"> Find an Index of Array Such that Sum of Left and Right Subarray  fo </h5>';
	for($i=0;$i<$count;$i++){
        echo $sample[$i] .',';
	  $commonValue;
      $commonIndex;
	  if($subArray[$i] == $sumArray[$i]){
	    $commonIndex = $i;
	    $commonValue = $subArray[$i+1];
	  }
	}
	
	echo " <pre>" . "The common value is $commonValue and common index $commonIndex" ."<pre>";
        
        

});