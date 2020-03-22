<?php
/* Controller
  Controller should take the input and decide what action to take based upon that input.
*/

class EmployeeController extends EmployeeModel{

 /* Inherit EmployeeController from Employee Model to manipulate database */

  /* Insert employees from EmployeeController Class */

  public function insert($employee,$schema,$tableName){
    $this->insertEmp($employee,$schema,$tableName);
  }

  /* Update Employees from EmployeeCongtroller Class*/

  public function update($arr1,$schema_array,$tableName,$id){
    $this->updateEmp($arr1,$schema_array,$tableName,$id);
  }

  /* Delete Employees from EmployeeController Class */
  public function delete($tableName,$id){
    $this->deleteEmp($tableName,$id);
  }
}

 ?>
