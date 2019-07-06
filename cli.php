<?php
if (isset($_GET["client"])) {
 $display = "
 <table cellpadding = \"3\" cellspacing = \"1\" border = \"1\" align=\"center\" width=\"50%\">
 <tr>
 <th> Employee ID </th>
 <th> Delete </th>
 <th> Edit </th>
 </tr>
 ";


 $employee_sql = "SELECT * from client_emp where client = ".$_GET['client']." ORDER BY employee";
 $employee = mysqli_query($con, $employee_sql) or die(mysqli_error($con));

 while($emp = mysqli_fetch_array($employee)) {
     $empl = $emp["employee"];

     $display .= "
     <tr>
     <td>".$empl."</td>
     <td><a href = \"delete_emp.php?client=".$_GET["client"]."&employee=".$empl."\">Delete</a></td>
     <td><a href = \"edit_emp.php?client=".$_GET["client"]."&employee=".$empl."\">Edit</a></td>
     </tr>
     ";
}
echo "<br> Showing Employees of Client ".$_GET["client"]."<br>";
echo $display;



echo "<br><a href=\"add_emp.php?client=".$_GET["client"]."\">Add Employees</a>";

echo "<br><a href=\"format1.php?client=".$_GET["client"]."\">Format 1</a>";
}
 ?>
