<?php
require('../settings/dbconnection.php');

//inherit the methods from Dbconnection; that is db_class
class Customer extends Dbconnection{

    function addCustomer($name, $email, $password, $country, $city, $contact){
        
    //return true or false
    return $this->query("insert into customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact) values('$name', '$email', '$password', '$country', '$city', '$contact')");

    }

    function editCustomer($id, $name, $email, $password, $country, $city, $contact, $image, $userRole){
    //return true or false
    return $this->query("edit customer set customer_name='$name', customer_email='$email', customer_pass='$password', customer_country='$country', customer_city='$city', customer_contact='$contact', customer_image='$image' user_role='$userRole' where id ='$id'");

    }

    function deleteCustomer($id){
    //return true or false
    return $this->query("delete from customer where id ='$id'");

    }

    function selectAllCustomer(){
    //return array true or false
    return $this->fetch("select * from customer");
    }

    function selectOneCustomer($email){
    //return associative array
    return $this->fetchOne("select * from customer where customer_email = '$email' ");
    }
}           

?>
