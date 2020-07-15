<?php
require_once 'autoloader.php';
spl_autoload_register('autoload');

require_once 'src/functions.php';

$manager = new ReportsManager();
$reports = $manager->selectReports();

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$data = array_fill_keys($days, null);

foreach ($reports as $report)
{
    switch ($report['weekday']) {
        case 'Monday':
            groupByDays('Monday', $report);
            calcAvgHours('Monday', $report);
            break;
        case 'Tuesday':
            groupByDays('Tuesday', $report);
            calcAvgHours('Tuesday', $report);
            break;
        case 'Wednesday':
            groupByDays('Wednesday', $report);
            calcAvgHours('Wednesday', $report);
            break;
        case 'Thursday':
            groupByDays('Thursday', $report);
            calcAvgHours('Thursday', $report);
            break;
        case 'Friday':
            groupByDays('Friday', $report);
            calcAvgHours('Friday', $report);
            break;
        case 'Saturday':
            groupByDays('Saturday', $report);
            calcAvgHours('Saturday', $report);
            break;
        case 'Sunday':
            groupByDays('Sunday', $report);
            calcAvgHours('Sunday', $report);
            break;
    }
}

$newData = topThree($data);
printData($newData);
