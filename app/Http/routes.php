<?php

Route::get("/", "PublicController@getIndex");
Route::get("/login", "PublicController@getLogin");
Route::post("/login", "PublicController@postLogin");
Route::post("/signup", "PublicController@postSignup");

Route::get("/panel", "PanelController@getIndex");
Route::get("/panel/logout", "PanelController@getLogout");
Route::get("/panel/user/{page?}", "PanelUserController@getIndex")->where('page', '[0-9]+');
Route::get("/panel/user/add", "PanelUserController@getAdd");
