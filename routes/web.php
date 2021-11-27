<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

/*Route::get('/', function () {
    return redirect('/login');
});*/
//route site présentation
Route::get('/', [\App\Http\Controllers\SliderController::class, 'indexSite'])->name('indexSite');
Route::get('/services', [\App\Http\Controllers\SliderController::class, 'services'])->name('services');
Route::get('/publicgalleries', [\App\Http\Controllers\SliderController::class, 'publicGalleries'])->name('publicGalleries');
Route::get('/reservation', [\App\Http\Controllers\SliderController::class, 'rendezVous'])->name('rendezVous');
//post pour soumettre le formulaire de reservation
Route::post('/reservation', [\App\Http\Controllers\SliderController::class, 'reservationForm'])->name('reservationForm');

Route::get('/contact', [\App\Http\Controllers\SliderController::class, 'contact'])->name('contact');
//post pour soumettre le formulaire de reservation
Route::post('/contact', [\App\Http\Controllers\SliderController::class, 'contactForm'])->name('contactForm');
//blog
Route::get('/articles', [\App\Http\Controllers\SliderController::class, 'blog'])->name('blogPresentation');
Route::get('/articles/article-{id}', [\App\Http\Controllers\SliderController::class, 'blogArticle'])->name('blogArticle');


//Regrouper routes admin
Route::middleware(['isAdmin'])->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\GalleryController::class, 'lastGalleries'])->name('admin');
//route index article qui permet d'affihcer tout
//route create article/create qui permet de créer un article
//route show article/{id} qui permet d'afficher un article dont son id est passé en parametre
//route update article/{id} qui permet de modifier un article dont son id est passé en parametre
//route destory article/{id} qui permet de supprimer un article dont son id est passé en parametre

////////////////////////////////////////////Gestion des clients///////////////////////////////////////////////
//afficher tous les clients
    Route::get('clients', [\App\Http\Controllers\UserController::class, 'index'])->name('indexClient');
//ajouter un client
//get pour afficher le formulaire
    Route::get('clients/ajouter-client', [\App\Http\Controllers\UserController::class, 'getForm'])->name('getFormClient');
//post pour soumettre le formulaire
    Route::post('clients/ajout-client', [\App\Http\Controllers\UserController::class, 'add'])->name('addClient');
//détails d'un client
    Route::get('clients/client/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('editClient');
//modifier un client : patch permet d'editer une table
//patch c'est la requete qui va modifier dans la base de données
    Route::patch('clients/client/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('updateClient');
//supprimer un client
    Route::delete('clients/client/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroyClient');

////////////////////////////////////////////Gestion des galeries///////////////////////////////////////////////
//afficher tous les galeries
    Route::get('privategallery/galleries', [\App\Http\Controllers\GalleryController::class, 'index'])->name('indexGallery');
//modifier
    Route::get('privategallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'showGallery'])->name('showGallery');
    Route::patch('privategallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'updateGallery'])->name('updateGallery');
//supprimer
    Route::delete('privategallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'destroyGallery'])->name('destroyGallery');

//afficher galleries d'un client
    Route::get('privategallery/galleries/client/{id}', [\App\Http\Controllers\GalleryController::class, 'showClient'])->name('showGalleriesClient');
//get pour afficher la liste des clients
    Route::get('privategallery/creer-gallerie', [\App\Http\Controllers\GalleryController::class, 'getClientsForCreateGallery'])->name('getListeClients');
//créer une gallerie
    Route::get('privategallery/creer-gallerie/client/{id}', [\App\Http\Controllers\GalleryController::class, 'getForm'])->name('getFormGallery');
    Route::post('privategallery/creer-gallerie/client/{id}', [\App\Http\Controllers\GalleryController::class, 'addGallery'])->name('addGallery');
//supprimer media
    Route::post('privategallery/gallery/{id}/media', [\App\Http\Controllers\MediaController::class, 'destroyMedia'])->name('gallery.media.destroy');
//Route::delete('gallery/{id}/media/{id}', [\App\Http\Controllers\MediaController::class, 'destroyMedia'])->name('destroyMedia');


////////////////////////////////////////////Gestion des sliders///////////////////////////////////////////////
//afficher tous les sliders
    Route::get('sliders', [\App\Http\Controllers\SliderController::class, 'index'])->name('indexSliders');
//ajouter un slider
//get pour afficher le formulaire
    Route::get('sliders/ajouter-slider', [\App\Http\Controllers\SliderController::class, 'getForm'])->name('getFormSlider');
//post pour soumettre le formulaire
    Route::post('sliders/ajout-slider', [\App\Http\Controllers\SliderController::class, 'add'])->name('addSlider');
//détails d'un slider
    Route::get('sliders/slider/{id}', [\App\Http\Controllers\SliderController::class, 'edit'])->name('editSlider');
//modifier un client : patch permet d'editer une table
//patch c'est la requete qui va modifier dans la base de données
    Route::patch('sliders/slider/{id}', [\App\Http\Controllers\SliderController::class, 'update'])->name('updateSlider');
//supprimer un slider
    Route::delete('sliders/slider/{id}', [\App\Http\Controllers\SliderController::class, 'destroy'])->name('destroySlider');



////////////////////////////////////////////Gestion des galeries publiques///////////////////////////////////////////////
//afficher tous les galeries
    Route::get('publicgallery/galleries', [\App\Http\Controllers\GalleryController::class, 'indexPublicGallery'])->name('indexPublicGallery');
//modifier
    Route::get('publicgallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'showPublicGallery'])->name('showPublicGallery');
    Route::patch('publicgallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'updatePublicGallery'])->name('updatePublicGallery');
//supprimer
    Route::delete('publicgallery/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'destroyPublicGallery'])->name('destroyPublicGallery');

//créer une gallerie
    Route::get('publicgallery/creer-gallerie', [\App\Http\Controllers\GalleryController::class, 'getFormPublicGallery'])->name('getFormPublicGallery');
    Route::post('publicgallery/creer-gallerie', [\App\Http\Controllers\GalleryController::class, 'addPublicGallery'])->name('addPublicGallery');
//supprimer media
    Route::post('publicgallery/gallery/{id}/media', [\App\Http\Controllers\MediaController::class, 'destroyMedia'])->name('gallery.media.destroy');



////////////////////////////////////////////Gestion du blog///////////////////////////////////////////////
//afficher tous les galeries
    Route::get('blog', [\App\Http\Controllers\ArticleController::class, 'index'])->name('indexBlog');
//modifier
    Route::get('blog/article/{id}', [\App\Http\Controllers\ArticleController::class, 'showArticle'])->name('showArticle');
    Route::patch('blog/article/{id}', [\App\Http\Controllers\ArticleController::class, 'updateArticle'])->name('updateArticle');
//supprimer
    Route::delete('blog/article/{id}', [\App\Http\Controllers\ArticleController::class, 'destroyArticle'])->name('destroyArticle');

//créer un article
    Route::get('blog/creer-article', [\App\Http\Controllers\ArticleController::class, 'getFormArticle'])->name('getFormArticle');
    Route::post('blog/creer-article', [\App\Http\Controllers\ArticleController::class, 'addArticle'])->name('addArticle');
//supprimer media
//Route::post('blog/gallery/{id}/media', [\App\Http\Controllers\MediaController::class, 'destroyMedia'])->name('gallery.media.destroy');

});



//Regrouper route client
Route::middleware(['auth'])->group(function() {
//route client
Route::get('/espace-client', [\App\Http\Controllers\GalleryController::class, 'lastGalleriesClient'])->name('client');

//afficher profil
Route::get('/profil', [\App\Http\Controllers\UserController::class, 'showprofil'])->name('showProfil');
//modifier un client : patch permet d'editer une table
//patch c'est la requete qui va modifier dans la base de données
Route::patch('/profil', [\App\Http\Controllers\UserController::class, 'updateprofil'])->name('updateProfil');

Route::get('/galleries', [\App\Http\Controllers\GalleryController::class, 'showGaleriesClient'])->name('galeriesclient');

Route::get('/galleries/gallery/{id}', [\App\Http\Controllers\UserController::class, 'galleryclient'])->name('galleryclient');

//galleries en attente
Route::get('/en-attente', [\App\Http\Controllers\GalleryController::class, 'waitingGaleries'])->name('waitingGaleries');
});

// Route Symlink pour la mise en ligne
/*route::get('storage', function() {

    try {
        $targetFolder = base_path().'/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
        symlink($targetFolder, $linkFolder);
        return 'ok';
    }catch (Exception $e)  {
        return $e;
    }
});*/

