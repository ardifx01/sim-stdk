<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\JabatanEnum;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekAksesProfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user login sebagai anggota, blokir akses
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // jika jabatan adalah Tamu atau Anggota
        if (in_array(auth()->user()->jabatan, [JabatanEnum::Tamu])) {
            abort(404); // atau redirect()->route('users.beranda');
        }


        // selain anggota dan tamu, boleh lanjut
        return $next($request);
    }
}
