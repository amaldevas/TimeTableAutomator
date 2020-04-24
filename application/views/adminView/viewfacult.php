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
  <h2>VIEW FACULTY</h2>
  <a href="<?php echo base_url(); ?>index.php/add/faculty"><button>Add Faculty</button></a>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Faculty Code</th>
        <th>Faculty Name</th>
        <th>Department</th>
        <th>Work Type</th>
        <th>Username</th>
        <th>Action</th>
       </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($facultyList))
                          {
                            $i=0;
                            for($i=0;$i<$facultyList['count'];$i++)
                            {
                              echo "<tr><td>".$facultyList['faculty_code'][$i]."</td>";
                              echo "<td>".$facultyList['faculty_name'][$i]."</td>";
                              echo "<td>".$facultyList['department_name'][$i]."</td>";
                              echo "<td>".$facultyList['work_type'][$i]."</td>";
                              echo "<td>".$facultyList['email'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/faculty/edit/".$facultyList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/faculty/delete/".$facultyList['id'][$i]."'><button>Delete</button></a><a href='".base_url()."index.php/view-timetable/".$facultyList['id'][$i]."'><button>View Timetable</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>