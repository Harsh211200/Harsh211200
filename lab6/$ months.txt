<?php
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

// Task 1.1: 'for' loop to print names of the last four months (Sep-Dec).
for ($i = 8; $i < 12; $i++) {
    echo $months[$i] . "\n";
}

echo "\n"; // Line break for clarity

// Task 1.2: 'for' loop to print names of every second month.
for ($i = 0; $i < count($months); $i += 2) {
    echo $months[$i] . "\n";
}

echo "\n"; // Line break for clarity

// Task 1.3: 'foreach' loop to print names of every month and its index.
foreach ($months as $index => $month) {
    echo "Index: $index, Month: $month\n";
}

echo "\n"; // Line break for clarity

// Task 1.4: 'foreach' loop that terminates when the index is 8.
foreach ($months as $index => $month) {
    if ($index == 8) {
        break;
    }
    echo "Index: $index, Month: $month\n";
}

echo "\n"; // Line break for clarity

// Task 1.5: 'foreach' loop that terminates when the array value is 'Aug'.
foreach ($months as $index => $month) {
    if ($month == 'Aug') {
        break;
    }
    echo "Index: $index, Month: $month\n";
}
?>