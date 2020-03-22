<?php

require 'includes/autoLoad.inc.php';



// Schema for Employee CRUD
$schema = ["FirstName","LastName","Gender","HiredDate","Salary"];

// Employees Values for Insertion
$insert = ["Muhammad Hamza","Khan","Male","3/21/2020","60000"];

$empControll = new EmployeeController();

/* Insert Employee */

//$empControll->insert($insert,$schema,"employee");

/*Update Employee*/

// Employees Values for Updation

$update = ["Ronald Cornelius","Khan","Male","3/21/2020","60000"];

// $empControll->update($update,$schema,"employee",38);



//Delete employee Controller
$empControll->delete("employee",38);


$empView = new EmployeeView();

/* Select All Employess */
$empView->show_allEmp();

/* Select Employees from their specific ID */
$empView->showEmp(38);


 ?>
