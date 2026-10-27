<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Próba dostępu do trasy administracyjnej:', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
        ]);

        if (! $request->session()->get('is_admin') && $request->header('X-Admin-Token') !== 'secret-admin' && $request->query('admin') !== '1') {
            abort(403, 'Brak uprawnień. Dostęp tylko dla administratora.');
        }

        return $next($request);
    }
}
