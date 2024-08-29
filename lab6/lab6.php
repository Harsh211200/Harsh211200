<?php
if (isset($_GET['task'])) {
    $task = $_GET['task'];
    $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    $days_per_month = array('Jan'=>31,'Feb'=>28,'Mar'=>31,'Apr'=>30, 'May'=>31,'Jun'=>30,'July'=>31,'Aug'=>31, 'Sep'=>30,'Oct'=>31, 'Nov'=>30, 'Dec'=>31);

    switch ($task) {
        case 'lastFourMonths':
            for ($i = 8; $i < count($months); $i++) {
                echo $months[$i] . "<br>\n";
            }
            break;
        case 'everySecondMonth':
            for ($i = 0; $i < count($months); $i++) {
                if ($i % 2 == 0) {
                    echo $months[$i] . "<br>\n";
                }
            }
            break;
        case 'monthsWithIndex':
            foreach ($months as $index => $month) {
                echo ($index+1) . " - " . $month . "<br>\n";
            }
            break;
        case 'indexUntil8':
            foreach ($months as $index => $month) {
                if ($index == 8) break;
                echo ($index+1) . " - " . $month . "<br>\n";
            }
            break;
        case 'monthsUntilAug':
            foreach ($months as $index => $month) {
                if ($month == 'Aug') break;
                echo ($index+1) . " - " . $month . "<br>\n";
            }
            break;
        case 'daysPerMonth':
            foreach ($days_per_month as $month => $days) {
                echo $month . " has " . $days . " days.<br>\n";
            }
            break;
        case 'totalDays':
            $total_days = array_sum($days_per_month);
            echo "Total days: " . $total_days . "<br>\n";
            break;
        case 'monthNames':
            $month_names = array_keys($days_per_month);
            echo implode(', ', $month_names) . "<br>\n";
            break;
        case 'isArray':
            if (is_array($days_per_month)) {
                echo "This is an array<br>\n";
            } else {
                echo "This is not an array<br>\n";
            }
            break;
        default:
            echo "Invalid task<br>\n";
            break;
    }
}
?>
