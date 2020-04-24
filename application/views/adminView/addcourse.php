<html>
<body>
<div class="container">
  <h2>ADD COURSES</h2>
  <form method="POST" action="">
    <div class="form-group">
  <label for="sem">Select Semester  </label>
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
<div class="form-group">
      <label for="cc">Course Code</label>
      <input type="text" class="form-control" id="cc" placeholder="Enter Course Code" name="course_code">
    </div>
    <div class="form-group">
      <label for="cn">Course Name</label>
      <input type="text" class="form-control" id="cn" placeholder="Enter Course Name" name="course_name">
    </div>
    <div class="form-group">
      <label for="ct">Course Type</label>
      <input type="text" class="form-control" id="ct" placeholder="Enter Course Type" name="course_type">
    </div>
    <button type="submit" class="btn btn-default">ADD</button>
  </form>
</div>
</body></html>
  