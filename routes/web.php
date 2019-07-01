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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function() {
	Route::get('/','AdminController@index');

	Route::get('/createquestion','AdminController@createNewQuestion')->name('admin.addQuestion');
	Route::post('/createquestion','AdminController@createNewQuestion');

	Route::get('/commonquestions','AdminController@commonQuestions')->name('admin.commonQuestions');

	
	Route::get('/individualquestions','AdminController@individualQuestions')->name('admin.individualQuestions');


	Route::get('createsection','AdminController@createNewSection')->name('admin.createSection');
	Route::post('createsection','AdminController@createNewSection');


});



Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/quizzes','QuestionController@builderQuizzes')->middleware('auth');
Route::post('/quezzes/answers','QuestionController@quizzesAnswers')->middleware('auth');


