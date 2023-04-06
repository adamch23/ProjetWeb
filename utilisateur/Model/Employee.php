<?php
class Employee
{
    private ?int $idEmployee = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $username = null;
    private ?string $email = null;
    private ?string $address = null;
    private ?DateTime $dob = null;
    private ?string $pwd = null;

    public function __construct($id = null, $n, $p, $q, $e, $a, $d, $g)
    {
        $this->idEmployee = $id;
        $this->lastName = $n;
        $this->firstName = $p;
        $this->username = $q;
        $this->email = $e;
        $this->address = $a;
        $this->dob = $d;
        $this->pwd = $g;
    }

    /**
     * Get the value of idEmployee
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

     /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    
    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of pwd
     */
    public function getPassword()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */
    public function setPassword($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }
}
