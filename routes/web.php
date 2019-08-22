<?php

Route::get('/', 'TestController@goToLogin');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('user', 'UserController')->middleware(['verified', 'auth']);

Route::get('all-send-mail', 'MailController@allSendMail')->name('all-mail')->middleware(['verified', 'auth']);
Route::get('send-mail', 'MailController@sendMail')->name('send-mail')->middleware(['verified', 'auth']);
Route::post('send-mail-post', 'MailController@actionPostSendMail')->name('send-mail-post')->middleware(['verified', 'auth']);
Route::get('show-email/{id}', 'MailController@actionShowEmailDetails')->name('show-email')->middleware(['verified', 'auth']);
Route::delete('delete-mail/{id}', 'MailController@actionDeleteMail')->name('delete-mail')->middleware(['verified', 'auth']);


