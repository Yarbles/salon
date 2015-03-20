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
            $name = "Ben";
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

        function test_find()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $name2 = "Lisa";
            $id2 = 2;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "Benny";

            //Act
            $test_stylist->update($new_name);

            //Assert
            $this->assertEquals("Benny", $test_stylist->getName());
        }

        function test_delete()
        {
            //Arrange
            $name = "Ben";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Lisa";
            $id2 = 2;
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        // function test_getClients()
        // {
        //     //Arrange
        //     $name = "Ben";
        //     $id = 1;
        //     $test_stylist = new Stylist($name, $id);
        //     $test_stylist->save();
        //
        //     $test_stylist_id = $test_stylist->getId();
        //
        //     $client_name = "Betty Sue";
        //     $phone = "503-998-8484";
        //     $test_client = new Client($client_name, $phone, $id, $test_stylist_id);
        //     $test_client->save();
        //
        //     $client_name2 = "Evil John DeMayo";
        //     $phone2 = "503-666-6666";
        //     $test_client2 = new Client($client_name2, $phone2, $id, $test_stylist_id);
        //
        //     //Act
        //     $result = $test_client->getClients();
        //
        //     //Assert
        //     $this->assertEquals([$test_client, $test_client2], $result);
        // }
        //Layoutting use only; Don't use yet


    }
?>
