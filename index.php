<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 24.02.2018
 * Time: 07:39
 *
 *
 * A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N.
 *
 * For example, number 9 has binary representation 1001 and contains a binary gap of length 2. The number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3. The number 20 has binary representation 10100 and contains one binary gap of length 1. The number 15 has binary representation 1111 and has no binary gaps.
 *
 * Write a function:
 *
 * function solution($N);
 *
 * that, given a positive integer N, returns the length of its longest binary gap. The function should return 0 if N doesn't contain a binary gap.
 *
 * For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5.
 *
 * Assume that:
 *
 * N is an integer within the range [1..2,147,483,647].
 * Complexity:
 *
 * expected worst-case time complexity is O(log(N));
 * expected worst-case space complexity is O(1).
 * Copyright 2009–2018 by Codility Limited. All Rights Reserved. Unauthorized copying, publication or disclosure prohibited.
 */

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";


function solution($N)
{

    $n = decbin($N); // conversion to binar
    $n = strval($n); // string value of a variable
    $t = str_split($n); // convert a string to an array
    $l = count($t); // count all elements in an array
    $r = []; // declare empty array


    // let's investigate all elements in the array!
    for ($i = 0; $i < $l; $i++) {


        // if there is such element, we will need it in the future: Undefined offset: 11
        if (isset($t[$i + 1])) {

            // STARTING CONDITION

            if ($t[$i] == 1 AND $t[$i + 1] == 0) {

                $iwp = $i;
            }
            // ENDING CONDITION
            if ($t[$i] == 0 AND $t[$i + 1] == 1) {

                $iwk = $i;
            }
            // ENDING CONDITION INDEX - STARTING CONDITION INDEX
            // EVEN IF IT MIXED PREVIOUS VALUES WE DON'T CARE AS IT WOULD BE ELIMINATED BY GOOD ANSWERS OR NONE
            if (isset ($iwk) AND isset ($iwk)) {

                $j = $iwk - $iwp;

                //WE INSERT ALL RESULTS TO ARRAY
                array_push($r, $j);
            }
        }
    }

    // NOW WE SEARCH ARRAY
    $c = 0;
    foreach ($r as $v) {
        if ($c < $v)
            $c = $v;
    }
    // AND SEND RESULTS
    return $c;
}

solution(1041);