<?php
/* Model
 Employee Model class should only handle the database related operations such as insert, update and delete
 and select and select all.
*/
class EmployeeModel extends Dbh{

 /* All methods are protected because in mvc only View and and Controller classes access  */

  protected function insertEmp($employee,$schema,$tableName){

  /*
  For mysql insert query taking schema and values as an array in method parameters
  and building mysql query dynamically.
  */
  $new_arr = [];
  foreach ($employee as $key => $emp) {
    array_push($new_arr,"'$emp'".",");
  }
  $last =  end($new_arr);
  array_pop($new_arr);
  $modify =  str_replace(',', '', $last);
  array_push($new_arr,$modify);

  /* generate comma seprated schema for insert sql statement*/

  $new_schema = [];
  foreach ($schema as $key => $sch) {
        array_push($new_schema,$sch.",");
  }
  $last_val =  array_pop($new_schema);
  $modify_last = str_replace(',','',$last_val);
  array_push($new_schema,$modify_last);

  /*creates an sql query dynamically */

   $sql = "INSERT INTO $tableName(";
   $sum = "";

   /* create a string to be a sql statement */

   foreach ($new_schema as $key => $value) {
     $sum = $sum . $value;
   }
    $sql = $sql.$sum.") VALUES(";

    // create a string for data ..

    $sum1 = "";
    foreach ($new_arr as $key => $value1) {
      $sum1 = $sum1 . $value1;
  }
   $sql = $sql.$sum1.");";

   /* call a connection method from database class and insert employees */
   $this->connection()->query($sql);
 }

 /*
 For mysql Update query taking schema and values as an array in method parameters
 and building mysql query dynamically.
 */

 protected function updateEmp($arr1,$schema_array,$tableName,$id){

 /* Builds an update query by concatenation converts an array into sql update statements */

 $sql = "UPDATE $tableName SET ";
 $new_arr = [];
 $new_arr1 = [];
 $sum = "";

 foreach ($schema_array as $key => $schema) {
       array_push($new_arr,$schema."=");
 }

  /* Remove an Extra commas from the end of the statement */

  foreach ($arr1 as $key => $value) {
      array_push($new_arr1,"'$value'".',');
  }
   $last = end($new_arr1);
   array_pop($new_arr1);
   $withoutComma =  str_replace(',','',$last);
   array_push($new_arr1,$withoutComma);

  for ($i = 0;$i<sizeof($schema_array);$i++) {
        $sum = $sum . $new_arr[$i] . $new_arr1[$i];
 }
  $sql = $sql . $sum . " WHERE EmployeelD = $id;";

  /* call a connection to update employee using sql update statement */

  $stmt = $this->connection()->query($sql);

 }

 /* Delete employess by their EmployeeID */

protected function deleteEmp($tableName,$id){
  $sql = "DELETE FROM $tableName where EmployeelD = $id;";
  $stmt = $this->connection()->query($sql);
}


/* Select all Employees from database*/

protected function showAllEmp(){
  $sql = "SELECT * FROM employee;";
  $stmt = $this->connection()->query($sql);
  while($row = $stmt->fetch()){
    echo $row['FirstName'] . $row['LastName'] . $row['Gender'] . $row['HiredDate'] . $row['Salary'] . "<br>";
  }
}

/* Select Employess from thier specific EmployeeID*/

protected function searchyEmp_by_id($id){
  $sql = "SELECT * FROM employee where EmployeelD = $id;";
  $stmt = $this->connection()->query($sql);
  $row = $stmt->fetch();
  echo $row['FirstName'] . $row['LastName'] . $row['Gender'] . $row['HiredDate'] . $row['Salary'] . "<br>";
}

}


/*

  Database Schema

create table employee(
EmployeelD int primary key AUTO_INCREMENT,
FirstName varchar(100),
LastName varchar(100),
Gender varchar(100),
HiredDate varchar(100),
Salary int
);

*/
