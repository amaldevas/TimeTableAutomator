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
  <h2>VIEW SEMESTER</h2>
  <a href="<?php echo base_url(); ?>index.php/add/semester"><button>Add Semester</button></a>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Semester Code</th>
        <th>Semester Name</th>
        <th>Semester Type</th>
        <th>Action</th>
       </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($semesterList))
                          {
                            $i=0;
                            for($i=0;$i<$semesterList['count'];$i++)
                            {
                              echo "<tr><td>".$semesterList['semester_code'][$i]."</td>";
                              echo "<td>".$semesterList['semester_name'][$i]."</td>";
                              echo "<td>".$semesterList['semester_type'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/semester/edit/".$semesterList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/semester/delete/".$semesterList['id'][$i]."'><button>Delete</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>