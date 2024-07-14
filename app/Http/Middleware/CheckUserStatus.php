<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->status == 'inactive') {
            Auth::logout();

            $message = 'Tài khoản của bạn đã bị vô hiệu hóa. Vui lòng liên hệ với bộ phận hỗ trợ.';
            return redirect()->route('login')->withMessage($message);
        }

        // Kiểm tra xem người dùng đã liên kết với một tài khoản nhân viên hay không
    if (Auth::check() && !User::where('id', Auth::id())->whereHas('employee')->exists()) {
        Auth::logout();
        $message = 'Tài khoản của bạn chưa được liên kết với tài khoản nhân viên. Vui lòng liên hệ với quản trị viên.';
        return redirect()->route('login')->withMessage($message);
    }

        return $next($request);
    }
}
