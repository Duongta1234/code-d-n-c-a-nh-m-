<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employee = $request->route('employee');
        
        $result = $employee->status == 1 ? $next($request) : response()->json(['error' => 'Bạn không có quyền truy cập!']);
        return $result;
    }
}
