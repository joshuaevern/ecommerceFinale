<?php
require('../models/customer_class.php');

function addCustomerController($name, $email, $password, $country, $city, $contact, $userRole){
    //create an instance of the customer class
    $customer_instance = new Customer();
    // call the method from the class
    return $customer_instance->addCustomer($name, $email, $password, $country, $city, $contact, $userRole);
}

function editCustomerController($name, $email, $password, $country, $city, $contact, $image, $userRole){
    //create an instance of the customer class
    $customer_instance = new Customer();
    //call the method of the class
    return $customer_instance->editCustomer($name, $email, $password, $country, $city, $contact, $image, $userRole);
}

function deleteCustomerController($id){
    //create an instance of the class
    $customert_instance = new Customer();
    //call the method from the class
    return $customer_instance->deleteCustomer($id);
}

function selectAllCustomerController(){
    //create an instance of the class
    $customer_instance = new Customer();
    //call the method from the class
    return $customer_instance->selectAllCustomer();
}

function selectOneCustomerController($email){
    //create an instance of the class
    $customer_instance = new Customer();
    //call the method from the class
    return $customer_instance->selectOneCustomer($email);
}
?>