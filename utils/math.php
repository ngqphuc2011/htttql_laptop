<?php
    function sumArray($arr) {
        $sum = 0;
        foreach ($arr as $value) {
            $sum += $value;
        }
        return $sum;
    }

    function total2Arrays($arr1, $arr2) { // 2 arrays of the same length
        $total = 0;
        for ($i = 0; $i < count($arr1); $i++) {
            $total += ($arr1[$i] * $arr2[$i]);
        }
        return $total;
    }