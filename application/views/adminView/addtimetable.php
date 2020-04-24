<div class="container">
  <h2>ADD TIMETABLE</h2>
  <form method="POST" action="">
<div class="form-group">
  <label for="dept">Time</label>
    <input type="time" id="appt" name="time_stamp">
</div>
  <div class="form-group">
  <label for="dept">Day</label>
  <select class="form-control" id="sem" name="day">
    <?php
                          if(!empty($dayList))
                          {
                            $i=0;
                            for($i=0;$i<$dayList['count'];$i++)
                            {
                              echo "<option value='".$dayList['id'][$i]."'>".$dayList['day_name'][$i]."</option>";
                            }
                          }
      ?>
  </select>
</div>
    <div class="form-group">
  <label for="dept">Department</label>
  <select class="form-control" id="sem" name="faculty">
    <?php
                          if(!empty($facultyList))
                          {
                            $i=0;
                            for($i=0;$i<$facultyList['count'];$i++)
                            {
                              echo "<option value='".$facultyList['id'][$i]."'>".$facultyList['faculty_name'][$i]."</option>";
                            }
                          }
      ?>
  </select>
</div>
  <div class="form-group">
  <label for="dept">Department</label>
  <select class="form-control" id="sem" name="department">
    <?php
                          if(!empty($departmentList))
                          {
                            $i=0;
                            for($i=0;$i<$departmentList['count'];$i++)
                            {
                              echo "<option value='".$departmentList['id'][$i]."'>".$departmentList['department_name'][$i]."</option>";
                            }
                          }
      ?>
  </select>
</div>
<div class="form-group">
  <label for="sem">Semester</label>
  <select class="form-control" id="sem" name="semester">
    <?php
                          if(!empty($semesterList))
                          {
                            $i=0;
                            for($i=0;$i<$semesterList['count'];$i++)
                            {
                              echo "<option value='".$semesterList['id'][$i]."'>".$semesterList['semester_name'][$i]."</option>";
                            }
                          }
      ?>
  </select>
</div>
<button type="submit" class="btn btn-default">SAVE</button>
</body>
</html>