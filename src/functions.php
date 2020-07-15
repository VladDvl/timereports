<?php

function groupByDays($weekday, $report)
{
    global $data;
    $data[$weekday][$report['name']]['hours'][] = $report['hours'];
}

function calcAvgHours($weekday, $report)
{
    global $data;
    $arr_hours = $data[$weekday][$report['name']]['hours'];
    $average = array_sum($arr_hours) / sizeof($arr_hours);
    $rounded = round($average, 2, PHP_ROUND_HALF_UP);
    $data[$weekday][$report['name']] = $rounded;
}

function topThree($data)
{
    foreach ($data as &$day)
    {
        if (!empty($day)) {
            arsort($day);
            $day = array_slice($day, 0, 3);
        }
    }
    return $data;
}

function printData($data)
{
    foreach ($data as $day => $names)
    {
        $day_str = sprintf("|%10s |", $day);
        $names_arr = [];
        if (!is_null($names)) {
            foreach ($names as $name => $hours)
            {
                $names_arr[] = $name . ' (' . number_format($hours, 2) . ' hours)';
            }
        }
        $names_str = implode(', ', $names_arr);
        $new_names_str = sprintf(" %-60s|", $names_str);
        $result_str = $day_str . $new_names_str;
        echo $result_str;
        if ($day !== 'Sunday') {
            echo PHP_EOL;
        }
    }
}
