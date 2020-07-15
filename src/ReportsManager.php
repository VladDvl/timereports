<?php

class ReportsManager extends Base {

    protected static $get_reports = "SELECT time_reports.id, time_reports.employee_id, employees.name,
                                     ROUND(time_reports.hours, 2) AS hours, DATE_FORMAT(time_reports.date, '%m/%d/%Y') AS date,
                                     DAYNAME(date) AS weekday FROM time_reports INNER JOIN employees
                                     ON employees.id = time_reports.employee_id ORDER BY date";

    public function selectReports()
    {
        $statement = $this->doStatement(self::$get_reports);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
