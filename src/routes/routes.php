<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
Route::post('api/send', 'Otrigg\Formmailer\Http\Controllers\FormmailerController@send')->middleware('checkform');
