<?php

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

Route::redirect('/', 'blog');

Auth::routes();

//Web
Route::get('blog',       		'Web\PageController@blog')->name('blog');
Route::get('entrada/{slug}', 	'Web\PageController@post')->name('post');
Route::get('categoria/{slug}', 	'Web\PageController@category')->name('category');
Route::get('etiqueta/{slug}', 	'Web\PageController@tag')->name('tag');

//ADMIN

//				 inzucosoft = Ruta
Route::resource('inzucosoft','inzucosoft\inzucosoftController');

Route::resource('categories',		'inzucosoft\CategoryController');
Route::resource('posts',     		'inzucosoft\postController');
Route::resource('tags',      		'inzucosoft\TagController');
Route::resource('municipalities',	'inzucosoft\MunicipalityController');
Route::resource('corregimientos',	'inzucosoft\CorregimientoController');
Route::resource('barrios',	        'inzucosoft\neigborhoodController');
Route::resource('poblaciones',	    'inzucosoft\populationController');
Route::resource('instituciones',	'inzucosoft\InstitutionController');
Route::resource('tipodocumento',	'inzucosoft\TipoDocumentoController');
Route::resource('proyectos',	'inzucosoft\ProjectController');

Route::get('munici/{id}', 'neigborhood2Controller@getMunici');



