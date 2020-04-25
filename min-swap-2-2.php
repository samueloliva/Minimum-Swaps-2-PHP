<?php

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {   
    $n = sizeof($arr);
    $ctr = 0;
    $swapping = true; 
    $init = 1;
    while ($swapping) {
        $swapping = false;
        for ($pos=$init; $pos<=$n; $pos++) {
            if ( $pos != $arr[$pos-1] ) {
                $curr = array_search($pos, $arr);
                $temp = $arr[$pos-1];
                $arr[$pos-1] = $pos;
                $arr[$curr] = $temp;  
                $swapping = true;
                $ctr += 1;
                break;        
            }
            else {
                $init = $pos;
            }
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
