<?php

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/myfinder/browser', 'andresayak\MyFinder\Controller\MyFinderController@browser')
        ->name('myfinder_browser');
    
    Route::post('/myfinder/upload', 'andresayak\MyFinder\Controller\MyFinderController@upload')
        ->name('myfinder_upload');
    
    Route::post('/myfinder/mkdir', 'andresayak\MyFinder\Controller\MyFinderController@mkdir')
        ->name('myfinder_mkdir');
    
    Route::get('/myfinder/remove', 'andresayak\MyFinder\Controller\MyFinderController@remove')
        ->name('myfinder_remove');
});