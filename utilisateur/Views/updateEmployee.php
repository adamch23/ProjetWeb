<?php

include '../Controller/EmployeeC.php';

$error = "";

// create Employee
$employee = null;

// create an instance of the controller
$employeeC = new EmployeeC();
if (
    isset($_POST["idEmployee"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["address"]) &&
    isset($_POST["dob"]) &&
    isset($_POST["pwd"])
) {
    if (
        !empty($_POST["idEmployee"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["username"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["pwd"])
    ) {
        $employee = new Employee(
            $_POST['idEmployee'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['username'],
            $_POST['email'],
            $_POST['address'],
            new DateTime($_POST['dob']),
            $_POST['pwd']
        );
        $employeeC->updateEmployee($employee, $_POST["idEmployee"]);
        header('Location:ListEmployees.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListEmployees.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idEmployee'])) {
        $employee = $employeeC->showEmployee($_POST['idEmployee']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idEmployee">Id Employee:
                        </label>
                    </td>
                    <td><input type="text" name="idEmployee" id="idEmployee" value="<?php echo $employee['idEmployee']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="firstName" id="firstName" value="<?php echo $employee['firstName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="lastName" id="lastName" value="<?php echo $employee['lastName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username:
                        </label>
                    </td>
                    <td><input type="text" name="username" id="username" value="<?php echo $employee['username']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail:
                        </label>
                    </td>
                    <td><input type="text" name="email" id="email" value="<?php echo $employee['email']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $employee['address']; ?>" id="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dob" id="dob" value="<?php echo $employee['dob']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pwd">Password:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="pwd" id="pwd" value="<?php echo $employee['pwd']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>