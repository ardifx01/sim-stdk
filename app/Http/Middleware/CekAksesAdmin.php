<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\JabatanEnum;

class CekAksesAdmin
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
        if (in_array(auth()->user()->jabatan, [JabatanEnum::Tamu, JabatanEnum::Anggota])) {
            abort(404); // atau redirect()->route('users.beranda');
        }


        // selain anggota dan tamu, boleh lanjut
        return $next($request);
    }
}
