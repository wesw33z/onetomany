<?php
// import each model(s) used below
use App\User;
use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// basic laravel welcome page

Route::get('/', function () {
    return view('welcome');
});

// Create route to add info to database

Route::get('/create', function(){

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'Title 2', 'body'=>'Body 2']);

    $user->posts()->save($post);

    //// this also works the same way

    // $user->post()->save(new(['title'=>'My first post', 'body'=>'First post content']));
});


// Read route to read information stored in the database

Route::get('/read', function(){

    $user = User::findOrFail(1);
//// returns all posts for the user
//    return $user->posts;

    foreach($user->posts as $post){

        echo $post->title . "<br>";

    }
});


// Update Route to modify an existing record in the database

Route::get('/update', function(){

    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->update(['title'=>'Again updated title using laravel!']);

//    $user->posts()->where('id', '=', 2)->update(['title'=>'Again updated title using laravel!']);

    foreach($user->posts as $post)

        echo $post->title . "<br>";
});


// Delete Route to remove items form the database

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    $user->posts()->whereId(2)->delete();

});

// here is some text to test a push