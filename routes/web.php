<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        [
                'label' => 'I. Start Task',
                'content' => ["minimum of 100 USDT is required to reset the tasks counter of the optimization.", "Once the 45 tasks have been completed, the user must request a full withdrawal 
                and receive the withdrawal amount before requesting to reset the account."],
            ],
            [
                'label' => 'II. Withdrawal',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'III. Funds',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'IV. Account Security',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'V. Normal Products',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VI. Combination Tasks',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VII. Deposits',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VIII. Merchant Cooperation',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'IX. Invitation',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'X. Operating Hours',
                'content' => ["Platform operating hours 10:00 to 22:59:5940.", "Online customer service hours 10:00 to 22:59:5941.", "Withdrawal operation hours 10:00 to 22:59:59"],
            ],
        ];
    return view('welcome', compact('data'));
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/set', function () {
    return view('user.info');
});
Route::get('/deposit', function () {
    return view('user.deposit');
});
Route::get('/withdraw', function () {
    return view('user.withdraw');
});
Route::get('/wallet', function () {
    return view('user.wallet');
});
Route::get('/lang', function () {
    return view('user.language');
});
Route::get('/vips', function () {
    return view('user.vips');
});
Route::get('/starting', function () {
    return view('user.start');
});
Route::get('/records', function () {
    return view('user.record');
});
Route::get('/cslink', function () {
    return view('user.cslink');
});
Route::get('/logout', function () {
    return view('user.logout');
});