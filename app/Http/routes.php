<?php

Route::get("/", "PublicController@getIndex");
Route::get("/login", "PublicController@getLogin");
Route::post("/login", "PublicController@postLogin");
Route::post("/signup", "PublicController@postSignup");

Route::get("/panel", "PanelController@getIndex");
Route::get("/panel/logout", "PanelController@getLogout");
Route::get("/panel/user/{page?}", "PanelUserController@getIndex")->where('page', '[0-9]+');
Route::get("/panel/user/add", "PanelUserController@getAdd");
Route::post("/panel/user/add", "PanelUserController@postAdd");
Route::get("/panel/user/delete/{id}", "PanelUserController@getDelete")->where('id', '[0-9]+');
Route::get("/panel/user/edit/{id}", "PanelUserController@getEdit")->where('id', '[0-9]+');
Route::post("/panel/user/edit", "PanelUserController@postEdit");
Route::get("/panel/user/password/{id}", "PanelUserController@getPassword")->where('id', '[0-9]+');
Route::post("/panel/user/password", "PanelUserController@postPassword");
