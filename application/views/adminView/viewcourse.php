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
  <h2>VIEW COURSES</h2>
  <a href="<?php echo base_url(); ?>index.php/add/course"><button>Add Course</button></a>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Course Type</th>
        <th>Semester</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($courseList))
                          {
                            $i=0;
                            for($i=0;$i<$courseList['count'];$i++)
                            {
                              echo "<tr><td>".$courseList['course_code'][$i]."</td>";
                              echo "<td>".$courseList['course_name'][$i]."</td>";
                              echo "<td>".$courseList['course_type'][$i]."</td>";
                              echo "<td>".$courseList['semester_name'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/course/edit/".$courseList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/course/delete/".$courseList['id'][$i]."'><button>Delete</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
