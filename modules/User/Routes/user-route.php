<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\User\Http\Controllers\Auth\ConfirmablePasswordController;
use Modules\User\Http\Controllers\Auth\EmailVerificationNotificationController;
use Modules\User\Http\Controllers\Auth\EmailVerificationPromptController;
use Modules\User\Http\Controllers\Auth\NewPasswordController;
use Modules\User\Http\Controllers\Auth\PasswordResetLinkController;
use Modules\User\Http\Controllers\Auth\RegisteredUserController;
use Modules\User\Http\Controllers\Auth\VerifyEmailController;

Route::group(['middleware' => 'web'], function (Router $router) {

    $router->get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register');

    $router->post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest');

    $router->get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

    $router->post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');

    $router->get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest')
        ->name('password.request');

    $router->post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    $router->get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest')
        ->name('password.reset');

    $router->post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.update');

    $router->get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth')
        ->name('verification.notice');

    $router->get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    $router->post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');

    $router->get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth')
        ->name('password.confirm');

    $router->post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth');

    $router->post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    $router->get('verification-code', function () {
        return view('auth.verification-code');
    })->name('verification-code');

});
