<?php

use Controller\Admin\CategoryController;
use Controller\Admin\ArticleController;
use Controller\IndexController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

// déclaration d'un nouveau contrôleur en service dans l'application
$app['index.controller'] = function () use ($app){
    return new IndexController($app);
};

$app->get('/','index.controller:indexAction')
    ->bind('homepage')
;

$app->get('rubriques','index.controller:categoriesAction')
    ->bind('categories')
;

$app['admin.category.controller'] = function() use ($app){
    return new CategoryController($app);
}
;

$app['admin.article.controller'] = function() use ($app){
    return new ArticleController($app);
}
;

$app->get('admin/rubriques','admin.category.controller:listAction')
    ->bind('admin_categories')    
;

$app->get('admin/articles','admin.article.controller:listAction')
    ->bind('admin_articles')    
;

# match permet d'accepter une route en méthode GET et POST contrairement à
# get qui n'accepte que la méthode GET

$app->match('admin/rubriques/edition/{id}','admin.category.controller:editAction')
    # valeur par défaut pour le paramétre de la route
    ->value('id',null)
    ->bind('admin_category_edit')    
;

$app->match('admin/rubriques/suppression/{id}','admin.category.controller:deleteAction')
    ->bind('admin_category_delete')    
;

$app->match('admin/articles/edition/{id}','admin.article.controller:editAction')
    # valeur par défaut pour le paramétre de la route
    ->value('id',null)
    ->bind('admin_article_edit')    
;

$app->match('admin/articles/suppression/{id}','admin.article.controller:deleteAction')
    ->bind('admin_article_delete')    
;

/*
 * Créer la partie admin pour les articles :
 * - Créer le contrôleur Admin\ArticleController
 * - Le définir en service
 * - on y ajoute la méthode listAction
 * - puis la route qui pointe dessus
 * - on ajoute un lien vers cette route dans la navbar admin
 * - on crée l'entity Article et de repository ArticleRepository
 * - on remplit la méthode ListAction du contrôleur en utilisant ArticleRepository
 * - on crée la vue qui affiche les articles dans un tableau HTML
 */

$app->error(function (Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});