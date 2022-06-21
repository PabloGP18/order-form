<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Goku ultra instinct Figure', 'price' => 69.9],
    ['name' => 'Super Saiyan Vegeta Figure', 'price' => 30.0],
    ['name' => 'Bardock Figure', 'price' => 49.9],
    ['name' => 'Super Saiyan Goku Figure', 'price' => 30.0],
    ['name' => 'Super Saiyan Future Trunks Figure', 'price' => 35.0],
    ['name' => 'Super Saiyan Gohan Figure', 'price' => 30.0],
    ['name' => 'Broly Figure', 'price' => 40.0],
    ['name' => 'Gotenks Figure', 'price' => 39.0],
    ['name' => 'Goku Figure', 'price' => 50.0]
];

if(isset($_POST['submit'])){
    handleForm($products);
}

$totalValue = 0;

function validate()
{
    /*$emailErr = $streetErr = $streetNrErr = $cityErr = $zipcodeErr = "";
    $email = $street = $streetNr = $city = $zipcode = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["street"])) {
            $streetErr = "street name is required";
        } else {
            $street = test_input($_POST["street"]);
        }

        if (empty($_POST["streetnumber"])) {
            $streetNrErr = "street number is required";
        } else {
            $streetNr = test_input($_POST["streetnumber"]);
        }

        if (empty($_POST["city"])) {
            $cityErr = "city name is required";
        } else {
            $city = test_input($_POST["city"]);
        }

        if (empty($_POST["zipcode"])) {
            $zipcodeErr = "zipcode is required";
        } else {
            $zipcode = test_input($_POST["zipcode"]);
        }
    }    return [$emailErr];*/
}

function handleForm($productsZarray)
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
        if (isset($_POST['submit'])){
            $emailInfo = $_POST['email'];
            $streetInfo = $_POST['street'];
            $streetNrInfo = $_POST['streetnumber'];
            $cityInfo = $_POST['city'];
            $zipcodeInfo = $_POST['zipcode'];

            $checkedItems = [];
            $checkedItemsNames = [];

            foreach ($_POST['products'] as $value){
                array_push($checkedItems,$productsZarray[$value]);
                array_push($checkedItemsNames,$productsZarray[$value]['name']);
            }

            echo "Thank you for your purchase of " . implode("-", $checkedItemsNames) . ". We will send these to $cityInfo";
            //var_dump($checkedItems);
            //var_dump($checkedItemsNames);
        }
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';
