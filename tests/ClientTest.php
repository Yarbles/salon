<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        
        function test_getName()
        {
            //Arrange
            $name = "Betty Sue";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Evil Jimmy John";
            $id = 1;
            $test_client = new Client($name, $id, $client_id);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);

        }


    }

?>
