<?php 

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/services', function(){
    return view('services');
});
Route::get('/showcases', function(){
    return view('showcases');
});
Route::get('/blog', function(){
    return view('blog');
});


Route::get('/formtest', function () {
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function () {

    request()->validate([
        'email' => ['required', 'email'],
    ]);

    $newEmail = request('email');
    $emails = session()->get('emails', []);

    if(count($emails) >= 5)
        return redirect('/formtest')-> with ('error', 'Maximum of 5 emails only');

    if (in_array($newEmail, $emails)) {
        return redirect('/formtest')->with('error', 'Email already exists!');
    }

    $emails[] = $newEmail;
    session()->put('emails', $emails);

    return redirect('/formtest') ->with('success', 'Email added successfully!');
});

Route::delete('/delete-email/{index}', function ($index) {

    $emails = session()->get('emails', []);

    unset($emails[$index]);

    session()->put('emails', array_values($emails));

    return redirect('/formtest');
});

Route::delete('/delete-email/{index}', function ($index) {

    $emails = session()->get('emails', []);

    unset($emails[$index]);

    $emails = array_values($emails);

    session()->put('emails', $emails);

    return redirect('/formtest');
});