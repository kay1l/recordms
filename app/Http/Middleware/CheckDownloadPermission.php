<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\FileDownloadPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDownloadPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user->role == 'Admin') {
            return $next($request);
        }

        $permission = FileDownloadPermission::where('user_id', $user->id)->first();
        if ($permission && $permission->can_download) {
            return $next($request); // Allow access if permission is granted
        }
        return redirect()->back()->with('error', 'You do not have permission to download files.');
    }
}
