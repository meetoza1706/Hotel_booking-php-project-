<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Popup Calendar</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="calendar-container">
    <input type="text" id="dateInput" placeholder="Select Date">
    <div id="calendarPopup" class="calendar-popup">
        <?php echo generateCalendar(); ?>
    </div>
</div>

</body>
</html>

<?php
function generateCalendar() {
    $currentYear = date('Y');
    $currentMonth = date('n');

    $html = '<div class="calendar-grid">';
    $html .= '<div class="days">Sun</div>';
    $html .= '<div class="days">Mon</div>';
    $html .= '<div class="days">Tue</div>';
    $html .= '<div class="days">Wed</div>';
    $html .= '<div class="days">Thu</div>';
    $html .= '<div class="days">Fri</div>';
    $html .= '<div class="days">Sat</div>';

    $firstDayOfMonth = mktime(0, 0, 0, $currentMonth, 1, $currentYear);
    $daysInMonth = date('t', $firstDayOfMonth);
    $firstDayOfWeek = date('w', $firstDayOfMonth);

    $html .= '<div style="grid-column-start:' . ($firstDayOfWeek == 0 ? 7 : $firstDayOfWeek) . '"></div>';
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $html .= '<div class="calendar-day">' . $day . '</div>';
        if (($firstDayOfWeek + $day) % 7 == 0) {
            $html .= '</div><div class="calendar-grid">';
        }
    }
    $html .= '</div>';

    return $html;
}
?>
s