<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::all();
    // $posts = Post::where('user_id',auth()->id())->get();
    // $posts=[];
    // if(auth()->check()){
    //     $posts=auth()->user()->usersCoolPosts()->latest()->get();
    // }
    return view('home', ['posts' => $posts]);
});
Route::get('/welcome', function () {
    return view('welcome');
});

//User related
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Post related
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyEditPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

//Tracker related

Route::post('/add-expense', [ExpenseController::class, 'actuallyAddExpense']);
Route::post('/dashboard',  [ExpenseController::class, 'fetchExpensesOfDesiredMonth']);

Route::get('/add-expense', function () {
    return view('add-expense');
});
Route::get('/dashboard', [ExpenseController::class, 'fetchExpensesOfCurrentMonth']);


