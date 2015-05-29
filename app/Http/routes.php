<?php

Route::get("/", "PublicController@getIndex");
Route::get("/login", "PublicController@getLogin");
Route::post("/login", "PublicController@postLogin");
Route::post("/signup", "PublicController@postSignup");

Route::group(["prefix" => "panel"], function() {
	Route::get("/", "PanelController@getIndex");
	Route::get("/logout", "PanelController@getLogout");
	Route::post("/change-price", "PanelController@postChangePrice");
	Route::post("/add-utoken", "PanelController@postAddUtoken");
	Route::post("/sub-utoken", "PanelController@postSubUtoken");

	Route::get("/ip", function() {
		echo Session::get("browse_country_id");
	});

	Route::group(["prefix" => "user"], function() {
		Route::get("/{page?}", "PanelUserController@getIndex")->where('page', '[0-9]+');

		Route::get("/add", "PanelUserController@getAdd");
		Route::post("/add", "PanelUserController@postAdd");

		Route::get("/edit/{id}", "PanelUserController@getEdit")->where('id', '[0-9]+');
		Route::post("/edit", "PanelUserController@postEdit");

		Route::get("/password/{id}", "PanelUserController@getPassword")->where('id', '[0-9]+');
		Route::post("/password", "PanelUserController@postPassword");

		Route::get("/delete/{id}", "PanelUserController@getDelete")->where('id', '[0-9]+');
		Route::get("/restore/{id}", "PanelUserController@getRestore")->where('id', '[0-9]+');
	});

	Route::group(["prefix" => "bank"], function() {
		Route::get("/{page?}", "PanelBankController@getIndex")->where("page", '[0-9]+');

		Route::get("/add", "PanelBankController@getAdd");
		Route::post("/add", "PanelBankController@postAdd");

		Route::get("/edit/{id}", "PanelBankController@getEdit")->where('id', '[0-9]+');
		Route::post("/edit", "PanelBankController@postEdit");

		Route::get("/delete/{id}", "PanelBankController@getDelete")->where("id", '[0-9]+');
//		Route::get("/restore/{id}", "PanelBankController@getRestore")->where("id", '[0-9]+');
	});
});
