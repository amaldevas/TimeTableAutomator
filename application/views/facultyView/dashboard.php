<!DOCTYPE html>
<html>
<head>
	<style>
      table, th, td {
        border: 1px solid black;
      }
  </style>
	<title>Dashboard</title>
</head>
<body>
	<h2>Timetable</h2>
<a href="<?php echo base_url(); ?>index.php/faculty/logout"><button>Logout</button></a> 
  <table class="table table-bordered">
    <tbody>
      <?php
                          if(!empty($facultyTimetableList))
                          {
                            $i=0;
                            for($i=0;$i<$facultyTimetableList['count'];$i++)
                            {
                              echo "<tr><td>".$facultyTimetableList['day_name'][$i]."</td>";
                              if(!empty($facultyTimetableList['timetable_entities'][$i]))
                              {
                                $j=0;
                                for($j=0;$j<$facultyTimetableList['timetable_entities'][$i]['count'];$j++)
                                {
                                  echo "<td><div>Time: ".$facultyTimetableList['timetable_entities'][$i]['time_stamp'][$j]."</div><div>Faculty Name: ".$facultyTimetableList['timetable_entities'][$i]['faculty_name'][$j]."</div><div>Semester: ".$facultyTimetableList['timetable_entities'][$i]['semester_name'][$j]."</div><div>Department: ".$facultyTimetableList['timetable_entities'][$i]['department_name'][$j]."</div></td>";
                                }
                              }
                              echo "</tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</body>
</html>