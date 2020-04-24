<html>
<style>
      table, th, td {
        border: 1px solid black;
      }
  </style>
<body>
<div class="container">
  <h2>VIEW DEPARTMENT</h2>
  <a href="<?php echo base_url(); ?>index.php/add/department"><button>Add Department</button></a>       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Department Code</th>
        <th>Department Name</th>
        <th>No.of Division</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($departmentList))
                          {
                            $i=0;
                            for($i=0;$i<$departmentList['count'];$i++)
                            {
                              echo "<tr><td>".$departmentList['department_code'][$i]."</td>";
                              echo "<td>".$departmentList['department_name'][$i]."</td>";
                              echo "<td>".$departmentList['no_of_division'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/department/edit/".$departmentList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/department/delete/".$departmentList['id'][$i]."'><button>Delete</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>