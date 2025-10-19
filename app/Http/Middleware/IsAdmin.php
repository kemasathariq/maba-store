<?php

namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Symfony\Component\HttpFoundation\Response;

    class IsAdmin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            // Periksa apakah pengguna sudah login DAN memiliki kolom is_admin bernilai true
            if (Auth::check() && Auth::user()->is_admin) {
                return $next($request); // Jika ya, lanjutkan ke halaman yang dituju
            }

            // Jika tidak, kembalikan ke halaman utama dengan pesan error
            return redirect('/')->with('error', 'You do not have admin access.');
        }
    }
    

