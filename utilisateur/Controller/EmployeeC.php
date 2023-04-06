<?php
include '../config.php';
include '../Model/Employee.php';

class EmployeeC
{
    public function listEmployees()
    {
        $sql = "SELECT * FROM employee";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEmployee($id)
    {
        $sql = "DELETE FROM employee WHERE idEmployee = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEmployee($employee)
    {
        $sql = "INSERT INTO employee  
        VALUES (NULL, :fn,:ln, :us, :em, :ad, :dob, :pwd)";
        $db = config::getConnexion();
        try {
            print_r($employee->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $employee->getFirstName(),
                'ln' => $employee->getLastName(),
                'us' => $employee->getUsername(),
                'em' => $employee->getEmail(),
                'ad' => $employee->getAddress(),
                'dob' => $employee->getDob()->format('Y/m/d'),
                'pwd' => $employee->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEmployee($employee, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE employee SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    username = :username,
                    email = :email,
                    address = :address, 
                    dob = :dob,
                    pwd = :pwd
                WHERE idEmployee= :idEmployee'
            );
            $query->execute([
                'idEmployee' => $id,
                'firstName' => $employee->getFirstName(),
                'lastName' => $employee->getLastName(),
                'username' => $employee->getUsername(),
                'email' => $employee->getEmail(),
                'address' => $employee->getAddress(),
                'dob' => $employee->getDob()->format('Y/m/d'),
                'pwd' => $employee->getPassword()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showEmployee($id)
    {
        $sql = "SELECT * from employee where idEmployee = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $employee = $query->fetch();
            return $employee;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function findEmployee($username,$email,$password)
    {   
        $sql = "SELECT * from employee where username = :username and email = :email and pwd = :pwd";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(["username" => $username,"email" => $email,"pwd" => $password]);

            $employee = $query->fetch();
            return $employee;
        } catch (Exception $e) {
            die('Error : ' .$e->getMessage());
        }

    }
    public function SortByName (){
        $sql = "SELECT * FROM employee ORDER BY firstName";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
    catch (Exception $e){
        echo($e->getMessage());
    }
    }
    // public function SearchEmployee ($inputsearch){
    //     $sql = "SELECT * FROM employee WHERE username LIKE '%$inputsearch%' ";
    //     $db  = config ::getConnexion();
    //     try {
    //      $list = $db->query($sql);
    //      return $list;
    //     }
    
    // catch (Exception $e){
    //     echo('Error:'.$e->getMessage());
    // }
    // }
}
