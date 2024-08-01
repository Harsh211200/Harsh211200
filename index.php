<?php
function findSingleNumber($arr) {
    // Initialize an empty associative array to store counts of each number
    $count = array();
    
    // Iterate through the array and count occurrences of each number
    foreach ($arr as $num) {
        if (isset($count[$num])) {
            $count[$num]++;
        } else {
            $count[$num] = 1;
        }
    }
    
    // Find the number with count 1 (occurs only once)
    foreach ($count as $num => $occurrences) {
        if ($occurrences === 1) {
            return $num;
        }
    }
    
    // If no single number found, return null or handle as needed
    return null;
}

// Example usage:
$array = array(5, 3, 4, 3, 4);
$singleNumber = findSingleNumber($array);

if ($singleNumber !== null) {
    echo "The single number in the array [" . implode(', ', $array) . "] that doesn't occur twice is: $singleNumber";
} else {
    echo "No single number found in the array [" . implode(', ', $array) . "]";
}
?>
