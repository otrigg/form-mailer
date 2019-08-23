<?php

Route::post('api/send', 'Otrigg\Formmailer\Http\Controllers\FormmailerController@send')->middleware('checkform');
