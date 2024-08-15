<?php

function printNos($n){
    if ($n>0) {
        printNos($n-1);
        echo $n,"<br>";
    }
    return;
}

printNos(100);
?>