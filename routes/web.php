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

Route::get('/', function () {
    return redirect('login');
});



    //route::view('/login', "auth.login")->name('login');
    Route::get('/login', 'Auth\LoginController@isLogged')->name('login');
    Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //HOME
    Route::view('/home', 'home')->name('home');
    Route::get('/home', ['uses'=>'HomeController@index', 'as' => 'home']);


    //Room
    Route::get('/room', ['uses'=>'RoomController@index', 'as' => 'room.index']);
    Route::get('/room/add', ['uses'=>'RoomController@add', 'as' => 'room.add']);
    Route::post('/room/save', ['uses'=>'RoomController@save', 'as' => 'room.save']);
    Route::get('/room/edit/{id}', ['uses'=>'RoomController@edit', 'as' => 'room.edit']);
    Route::put('/room/update/{id}', ['uses'=>'RoomController@update', 'as' => 'room.update']);
    Route::get('/room/delete/{id}', ['uses'=>'RoomController@delete', 'as' => 'room.delete']);
   
    //Reuniao
   Route::get('/meeting', ['uses'=>'meetingController@index', 'as' => 'meeting.index']);
   Route::get('/meeting/add', ['uses'=>'meetingController@add', 'as' => 'meeting.add']);
   Route::post('/meeting/save', ['uses'=>'meetingController@save', 'as' => 'meeting.save']);
   Route::get('/meeting/edit/{id}', ['uses'=>'meetingController@edit', 'as' => 'meeting.edit']);
   Route::put('/meeting/update/{id}', ['uses'=>'meetingController@update', 'as' => 'meeting.update']);
   Route::get('/meeting/delete/{id}', ['uses'=>'meetingController@delete', 'as' => 'meeting.delete']);

    //Equipamentos
    Route::get('/equipament', ['uses'=>'EquipamentController@index', 'as' => 'equipament.index']);
    Route::get('/equipament/add', ['uses'=>'EquipamentController@add', 'as' => 'equipament.add']);
    Route::post('/equipament/save', ['uses'=>'EquipamentController@save', 'as' => 'equipament.save']);
    Route::post('/equipament/saveModal', ['uses'=>'EquipamentController@saveModal', 'as' => 'equipament.saveModal']);
    Route::get('/equipament/edit/{id}', ['uses'=>'EquipamentController@edit', 'as' => 'equipament.edit']);
    Route::put('/equipament/update/{id}', ['uses'=>'EquipamentController@update', 'as' => 'equipament.update']);
    Route::get('/equipament/delete/{id}', ['uses'=>'EquipamentController@delete', 'as' => 'equipament.delete']);

    //Routes user
    Route::get('/User', ['uses'=>'UserController@index', 'as' => 'User.index']);
    Route::get('/User/add', ['uses'=>'UserController@add', 'as' => 'User.add']);
    Route::post('/User/save', ['uses'=>'UserController@save', 'as' => 'User.save']);
    Route::get('/User/edit/{id}', ['uses'=>'UserController@edit', 'as' => 'User.edit']);
    Route::get('/User/updateProfile', ['uses'=>'UserController@profileUpdate', 'as' => 'User.profileUpdate']);
    Route::put('/Userupdate/{id}', ['uses'=>'UserController@update', 'as' => 'User.update']);
    Route::get('/User/load/{id}', ['uses'=>'UserController@load', 'as' => 'User.load']);
    Route::get('/User/delete/{id}', ['uses'=>'UserController@delete', 'as' => 'User.delete']);
    Route::post('/Profile/update/{id}', ['uses'=>'UserController@updateProfile', 'as' => 'User.updateProfile']);

    //Routes people
    Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
    Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
    Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
    Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
    Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
    Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);

    Route::get('/homeClient', 'FullCalendarController@index')->name('index');
    // Eventos
    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
    Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
    Route::post('/event-store', 'EventController@store')->name('routeEventStore');
    Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');
    
    Route::get('/eventADM', 'FullCalendarController@eventADM')->name('index');

    /**
     * Rotas para Eventos Rápidos
     */
    Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');
    Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');
    Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');

Route::group( [ 'middleware' => 'auth'], function()
{


    Route::group( [ 'middleware' => 'auth'], function()
    {
    Route::view('/Profile', 'profile')->name('profile')->middleware('auth');
    Route::get('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/perfil', ['uses'=>'UserController@perfilAtualiza','as'=>'User.perfilAtualiza']);
   
});
//Usuários
Route::Post('/people/add/user', ['uses'=>'UserController@save', 'as' => 'user.save']);

}); // Fim Autenticação