<?php
/* View
View should display the information using appropriate page
*/


/* Inherit EmployeeView from Employee Model to Show Employees */

class EmployeeView extends EmployeeModel{

  /* Show all Employees */
  public function show_allEmp(){
  $this->showAllEmp();
}

  /*Select specific Employees */
  public function showEmp($id){
  $this->searchyEmp_by_id($id);
}

}
