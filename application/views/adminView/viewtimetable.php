<html>
<head>
  <style>
      table, th, td {
        border: 1px solid black;
      }
  </style>
</head>
<body>
<div class="container">
  <h2>VIEW TIMETABLE</h2>
  <a href="<?php echo base_url(); ?>index.php/add/timetable"><button>Add Timetable</button></a>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Day</th>
        <th>Faculty Name</th>
        <th>Department</th>
        <th>Semester</th>
        <th>Time</th>
        <th>Action</th>
       </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($timetableList))
                          {
                            $i=0;
                            for($i=0;$i<$timetableList['count'];$i++)
                            {
                              echo "<tr><td>".$timetableList['day_name'][$i]."</td>";
                              echo "<td>".$timetableList['faculty_name'][$i]."</td>";
                              echo "<td>".$timetableList['department_name'][$i]."</td>";
                              echo "<td>".$timetableList['semester_name'][$i]."</td>";
                              echo "<td>".$timetableList['time_stamp'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/timetable/edit/".$timetableList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/timetable/delete/".$timetableList['id'][$i]."'><button>Delete</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>