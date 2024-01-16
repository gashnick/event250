<?php

use App\Http\Controllers\UserDetailController;
use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\CreateEvent;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\EditEvent;
use App\Http\Livewire\EditUser;
use App\Http\Livewire\Events;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Livewire\ViewEventDetails;
use App\Http\Livewire\ViewUserDetails;
use App\Http\Livewire\Welcome;
use App\Models\Event;
use Faker\Guesser\Name;
use NunoMaduro\Collision\Contracts\RenderlessEditor;
use Psy\Command\EditCommand;

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

Route::redirect('/', '/welcome');

Route::get('/register', Register::class)->name('register');
Route::post('/register', [Register::class, 'register']);

Route::get('/login', Login::class)->name('login');
Route::post('/login', Login::class);

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');

Route::get('/welcome', Welcome::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/users', Users::class)->name('users');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/typography', Typography::class)->name('typography');
    Route::get('/events', Events::class)->name('manage-events');
    Route::get('/create-event', CreateEvent::class)->name('create-events');
    Route::post('/create-event', CreateEvent::class);
    Route::get('/edit-user/{userId}', EditUser::class)->name('edit-user');
    Route::post('/edit-user/{userId}', EditUser::class);
    Route::get('/create-user', CreateUser::class)->name('user-create');
    Route::post('/create-user', CreateUser::class);
    Route::get('/edit-event/{eventId}', EditEvent::class)->name('update-event');
    Route::post('/edit-event/{eventId}', EditEvent::class);
    Route::get('/view-event-details/{eventId}', ViewEventDetails::class)->name('event-details');
    Route::get('/view-user-details/{userId}', ViewUserDetails::class)->name('user-details');
    Route::get('/profile', Profile::class)->name('profile');
});
