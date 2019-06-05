<?php

Route::get('/', 'SubscriberController@index');
Route::post('/subscribe', 'SubscriberController@submit');
