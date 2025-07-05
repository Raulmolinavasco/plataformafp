<?php
namespace App\Http\Responses;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\LoginResponse as BaseLoginResponse;
use Filament\Pages\Dashboard;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends BaseLoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        //dd(Auth::user()->hasRole('Admin'));
        //return redirect()->to(Dashboard::getUrl(panel:'Admin'));
        if (Auth::user()->hasRole('Jefe de estudios')) {
            return redirect()->to(Dashboard::getUrl(panel: 'jefeestudios'));
        }
        if (Auth::user()->hasRole('Profesor')) {
            return redirect()->to(Dashboard::getUrl(panel: 'profesor'));
        }
        if (Auth::user()->hasRole('Jefe de departamento')) {
            return redirect()->to(Dashboard::getUrl(panel: 'jefeestudios'));
        }
        if (Auth::user()->hasRole('Director')) {
            return redirect()->to(Dashboard::getUrl(panel: 'jefeestudios'));
        }

        return parent::toResponse($request);
}
}
