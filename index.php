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
whatIsHappening();
// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Fanta', 'price' => 2.5],
    ['name' => 'Cola', 'price' => 2.5],
    ['name' => 'Sprite', 'price' => 2.5],
    ['name' => 'Cola Zero', 'price' => 2.5],
    ['name' => 'Red Bull', 'price' => 2.5],
];

if (isset($_POST['submit'])) {
    $emailInfo= test_input($_POST['email']);
    $streetInfo = test_input($_POST['street']);
    $streetNrInfo = test_input($_POST['streetnumber']);
    //$cityInfo = test_input($_POST['city']);
    $_COOKIE['cityInfo'] = test_input($_POST['city']);
    $zipcodeInfo =  test_input($_POST["zipcode"]);;




    $nameProducts = [];
    $priceProducts = [];

    if(isset($_POST['submit'])){

        if(!empty($_POST['products'])) {

            foreach($_POST['products'] as $value){
                array_push($nameProducts,$products[$value]['name']);
                array_push($priceProducts,$products[$value]['price']);
            }

        }

    }
    $blabal = "chosen product(s): ".implode("-" , $nameProducts).'<br/>';

}


$orderConfirmation = "<h3>Your order</h3>";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $emailInfo="";
    } else if (!filter_var($emailInfo, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email";
        $emailInfo="";
    }

    if (empty($_POST["street"])) {
        $streetErr = "street name is required";
        $streetInfo ="";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $streetInfo)){
        $streetErr =  "Only use letters and whitespace!";
        $streetInfo ="";
    }

    if (empty($_POST["streetnumber"])) {
        $streetNrErr = "street number is required";
        $streetInfo ="";
    }

    if (empty($_POST["city"])) {
        $cityErr = "city name is required";
        $cityInfo = "";
    }

    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "zipcode is required";
    } else if(!preg_match("/^\d*$/", $zipcodeInfo)) {
        $zipcodeErr = "Only numbers are allowed!";
        $zipcodeInfo= "";
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';