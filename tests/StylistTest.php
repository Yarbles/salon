<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_getName()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setName("Lisa");
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals("Lisa", $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Jill";
            $id = 0;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $name2 = "Jess";
            $id2 = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $name = "Jess";
            $id = 1;
            $test_stylist2 = new Stylist($name, $id);

            //Act
            $test_stylist->save();
            $test_stylist2->save();
            Stylist::deleteAll();

            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }

        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_setId()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_cuisine = new Stylist($name, $id);

            //Act
            $test_cuisine->setId(2);
            $result = $test_cuisine->getId();

            //Assert
            $this->assertEquals(2, $result);
            }


        function test_getId()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

    }
?>
