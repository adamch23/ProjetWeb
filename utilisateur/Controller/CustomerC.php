<?php
include '../config.php';
include '../Model/Customer.php';

class CustomerC
{
    public function listCustomers()
    {
        $sql = "SELECT * FROM customer";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCustomer($id)
    {
        $sql = "DELETE FROM customer WHERE idCustomer = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCustomer($customer)
    {
        $sql = "INSERT INTO customer  
        VALUES (NULL, :fn,:ln, :us, :em, :ad, :dob, :pwd)";
        $db = config::getConnexion();
        try {
            print_r($customer->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $customer->getFirstName(),
                'ln' => $customer->getLastName(),
                'us' => $customer->getUsername(),
                'em' => $customer->getEmail(),
                'ad' => $customer->getAddress(),
                'dob' => $customer->getDob()->format('Y/m/d'),
                'pwd' => $customer->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCustomer($customer, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE customer SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    username = :username,
                    email = :email,
                    address = :address, 
                    dob = :dob,
                    pwd = :pwd
                WHERE idCustomer= :idCustomer'
            );
            $query->execute([
                'idCustomer' => $id,
                'firstName' => $customer->getFirstName(),
                'lastName' => $customer->getLastName(),
                'username' => $customer->getUsername(),
                'email' => $customer->getEmail(),
                'address' => $customer->getAddress(),
                'dob' => $customer->getDob()->format('Y/m/d'),
                'pwd' => $customer->getPassword()
            ]);
            echo $query->rowCount(). " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showCustomer($id)
    {
        $sql = "SELECT * from customer where idCustomer = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $customer = $query->fetch();
            return $customer;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function findCustomer($username,$email,$password)
    {   
        $sql = "SELECT * from customer where username = :username and email = :email and pwd = :pwd";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(["username" => $username,"email" => $email,"pwd" => $password]);

            $customer = $query->fetch();
            return $customer;
        } catch (Exception $e) {
            die('Error : ' .$e->getMessage());
        }
    }
    public function SortByName (){
        $sql = "SELECT * FROM customer ORDER BY firstName";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
    catch (Exception $e){
        echo($e->getMessage());
    }
    }
    
}
