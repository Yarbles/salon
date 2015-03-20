<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app['debug']=TRUE;

    $app->get("/stylists", function() use ($app) {
        return $app['twig']->render('stylists.twig', array('stylists' =>Stylist::getAll()));
    });

    $app->post("/stylists", function() use ($app)) {
        $new_stylist = new Stylist($_POST['name']);
        $new_stylist->save();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $current_stylist = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $current_stylist, 'clients' => Client::getAll()));

    });

    $app->get("/stylists/{id}/edit", function($id) use ($app) {
        $current_stylist = Stylist::find($id);
        return $app['twig']->render('stylist_edit.html.twig', array('stylist' => $current_stylist));
    });

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $current_stylist = Stylist::find($id);
        $new_name = $_POST['name'];
        $current_stylist->update($new_name);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $current_stylist));
    });

    $app->delete("/stylists/{id}", function($id) use ($app) {
        $current_stylist = Stylist::find($id);
        $current_stylist->delete();
        return $app['twig']->render('stylists.html.twig', array('stylists') => Stylist::getAll()));
    });

    $app->post("/delete_stylists", function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    })
