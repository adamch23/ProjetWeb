<?php
include '../Controller/EmployeeC.php';
$employeeC = new EmployeeC();
$employeeC->deleteEmployee($_GET["idEmployee"]);
header('Location:ListEmployees.php');
