<html>
<body>
   <div class="container">
  <h2>ADD FACULTY</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="fc">Faculty Code</label>
      <input type="text" class="form-control" id="fc" placeholder="Enter Faculty Code" name="faculty_code">
    </div>
    <div class="form-group">
      <label for="fn">Faculty Name</label>
      <input type="text" class="form-control" id="fn" placeholder="Enter Faculty Name" name="faculty_name">
    </div>
  <div class="form-group">
      <label for="sem">Select Department  </label>
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
      <label for="ft">Work Type</label>
      <input type="text" class="form-control" id="ft" placeholder="Enter Work Type" name="work_type">
    </div>
    <div class="form-group">
      <label for="f">Username</label>
      <input type="text" class="form-control" id="fu" placeholder="Enter Username" name="email">
    </div>
  <div class="form-group">
      <label for="fp">Password</label>
      <input type="text" class="form-control" id="fp" placeholder="Enter Password" name="password">
  </div>

    <button type="submit" class="btn btn-default">ADD</button>
  </form>
</div>

</body>
</html>