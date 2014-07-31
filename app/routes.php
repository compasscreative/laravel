<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('', function () {
    return View::make('home');
});

Route::get('about', function () {
    return View::make('about')->with('team_members', User::where('display_on_team', '1')->orderBy('team_display_order')->get());
});

Route::get('about/{slug}', function ($slug) {

    $team_member = User::where('slug', $slug)->firstOrFail();
    $team_members = User::where('display_on_team', '1')->orderBy('team_display_order')->get();

    return View::make('team_member')->with('team_member', $team_member)->with('team_members', $team_members);
});

Route::get('contact', function () {
    return View::make('contact');
});

Route::get('contact/thank-you', function () {
    return View::make('thank_you');
});

/*
|--------------------------------------------------------------------------
| Contact form submissions
|--------------------------------------------------------------------------
*/

Route::post('contact', function () {

    // Validate form values
    $validator = Validator::make(Input::all(), [
        'name' => 'required',
        'email' => 'required|email'
    ]);

    // Show errors if found
    if ($validator->fails()) {
        return Redirect::to(URL::previous() . '#form')->withErrors($validator)->withInput();
    }

    // Create new lead
    $lead = new Lead;
    $lead->name = Input::get('name');
    $lead->email = Input::get('email');
    $lead->phone = Input::get('phone');
    $lead->address = Input::get('address');
    $lead->message = Input::get('message');
    $lead->url = URL::previous();
    $lead->save();

    // Send email
    Mail::send('emails.lead', ['lead' => $lead], function ($message) use ($lead) {
        $message->to('')->subject('Lead from ' . $lead->name);
    });

    // Redirect to edit page
    return Redirect::to('/contact/thank-you');
});

/*
|--------------------------------------------------------------------------
| Dynamic images (Glide)
|--------------------------------------------------------------------------
*/

Route::get('img/{folder}/{slug}', function ($folder, $slug) {

    $folders = [
        'team-members' => storage_path() . '/app/users'
    ];

    if (!isset($folders[$folder])) {
        App::abort(404);
    }

    $glide = new \Glide\ImageMagick();
    $glide->setSourceDirectoryPath($folders[$folder]);
    $glide->parseParamatersFromSlug($slug);
    $glide->outputImage();

});

/*
|--------------------------------------------------------------------------
| Admin Control Panel Routes
|--------------------------------------------------------------------------
*/

// Base Admin
Route::get('admin', 'AdminController@index');
Route::get('admin/login', 'AdminController@showLoginForm');
Route::post('admin/login', 'AdminController@processLogin');
Route::get('admin/logout', 'AdminController@processLogout');

// Users
Route::get('admin/users', 'AdminUsersController@listUsers');
Route::get('admin/users/create', 'AdminUsersController@createUser');
Route::post('admin/users', 'AdminUsersController@storeUser');
Route::get('admin/users/{id}/edit', 'AdminUsersController@editUser');
Route::put('admin/users/{id}', 'AdminUsersController@updateUser');
Route::delete('admin/users/{id}', 'AdminUsersController@destroyUser');
Route::get('admin/users/sort-team', 'AdminUsersController@sortTeam');
Route::put('admin/users/store-team-members-order', 'AdminUsersController@updateTeamOrder');

// Leads
Route::get('admin/leads', 'AdminLeadsController@listLeads');
Route::get('admin/leads/{id}', 'AdminLeadsController@showLead')->where('id', '[0-9]+');
