<html>
<style>
      table, th, td {
        border: 1px solid black;
      }
  </style>
<body>
<div class="container">
  <h2>VIEW SUBJECT</h2>
  <a href="<?php echo base_url(); ?>index.php/add/subject"><button>Add Subject</button></a>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Subject Type</th>
        <th>Lecture Count</th>
        <th>Tutorial Count</th>
        <th>Practical Count</th>
        <th>Action</th>
       </tr>
    </thead>
    <tbody>
      <?php
                          if(!empty($subjectList))
                          {
                            $i=0;
                            for($i=0;$i<$subjectList['count'];$i++)
                            {
                              echo "<tr><td>".$subjectList['subject_code'][$i]."</td>";
                              echo "<td>".$subjectList['subject_name'][$i]."</td>";
                              echo "<td>".$subjectList['subject_type'][$i]."</td>";
                              echo "<td>".$subjectList['lecture_count'][$i]."</td>";
                              echo "<td>".$subjectList['tutorial_count'][$i]."</td>";
                              echo "<td>".$subjectList['practical_count'][$i]."</td>";
                              echo "<td><a href='echo base_url();index.php/subject/edit/".$subjectList['id'][$i]."'><button>Edit</button></a><a href='<?php echo base_url(); ?>index.php/subject/delete/".$subjectList['id'][$i]."'><button>Delete</button></a></td></tr>";
                            }
                          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>