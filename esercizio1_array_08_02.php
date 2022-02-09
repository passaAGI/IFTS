<?php
    /**
     * https://classroom.google.com/c/NDUyMDM2NjY0MTgx/a/NDYwNzg1MzgwNzIz/details
     */
    $randInts = [];
    $min = 2;
    $max = 20;
    //1.1
    for($i = 0; $i < $n=100; $i++){
        array_push($randInts, rand($min, $max));
    }
    //1.2
    for($int = 0; $int < count($randInts); $int++){
        echo "$randInts[$int]" . "<br>";
    }
    //1.3
    $m = 8;
    $counter = 0;
    for($j = 0; $j < count($randInts); $j++){
        if($randInts[$j] > $m){
            $counter += 1;
        }
    }
    echo "#Integers > $m: $counter.<br>";
    //1.4
    $start = 5;
    $stop = 21;
    $intsToSum = array_slice($randInts, $start, (($stop - $start)+1));
    $sum = array_sum($intsToSum);
    echo "Sum of the integers (position $start to $stop): $sum.";
?>
