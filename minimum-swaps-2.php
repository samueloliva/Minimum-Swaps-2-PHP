<?php
// This solution is not optimal and didn't pass all HackerRank tests.

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {   
    $ctr = 0;
    $swapping = true; 
    while ($swapping) {
        $swapping = false;
        $pos = 1;
        foreach( $arr as $el ) {
            if ( $pos != $el ) {
                $curr = array_search($pos, $arr);
                $temp = $arr[$pos-1];
                $arr[$pos-1]= $pos;
                $arr[$curr] = $temp;  
                $swapping = true;
                $ctr += 1;
                break;        
            }
            $pos += 1;
        }
    }
    return $ctr;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = minimumSwaps($arr);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);

?>
