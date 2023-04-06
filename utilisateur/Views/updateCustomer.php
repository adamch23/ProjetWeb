<?php

include '../Controller/CustomerC.php';

$error = "";

// create customer
$customer = null;

// create an instance of the controller
$customerC = new CustomerC();
if (
    isset($_POST["idCustomer"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"]) &&
    isset($_POST["username"])&&
    isset($_POST["address"]) &&
    isset($_POST["dob"]) &&
    isset($_POST["pwd"])
) {
    if (
        !empty($_POST["idCustomer"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["username"])&&
        !empty($_POST["address"]) &&
        !empty($_POST["dob"]) &&
        !empty($_POST["pwd"])
    ) {
        $customer = new Customer(
            $_POST['idCustomer'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST["username"],
            $_POST['address'],
            new DateTime($_POST['dob']),
            $_POST['pwd']
        );
        $customerC->updateCustomer($customer, $_POST["idCustomer"]);
        header('Location:ListCustomers.php');
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
    <button><a href="ListCustomers.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idCustomer'])) {
        $customer = $customerC->showCustomer($_POST['idCustomer']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idCustomer">Id Customer:
                        </label>
                    </td>
                    <td><input type="text" name="idCustomer" id="idCustomer" value="<?php echo $customer['idCustomer']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="firstName" id="firstName" value="<?php echo $customer['firstName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="lastName" id="lastName" value="<?php echo $customer['lastName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail:
                        </label>
                    </td>
                    <td><input type="text" name="email" id="email" value="<?php echo $customer['email']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="username"> User Name:
                        </label>
                    </td>
                    <td><input type="text" name="username" id="username" value="<?php echo $customer['username']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $customer['address']; ?>" id="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dob" id="dob" value="<?php echo $customer['dob']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Password:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="pwd" id="pwd" value="<?php echo $customer['pwd']; ?>">
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