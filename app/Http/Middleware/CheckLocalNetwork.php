<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLocalNetwork
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Dải địa chỉ IP của mạng cục bộ (ví dụ: 192.168.1.0/24)
    $localNetworkIP = '192.168.1.7'; // Định dạng của địa chỉ IP mạng

    // Lấy địa chỉ IP của người dùng gửi yêu cầu
    $userIPAddress = $request->ip();

    // Kiểm tra xem địa chỉ IP có thuộc dải mạng cục bộ không
    if (strpos($userIPAddress, $localNetworkIP) === 0) {
        return $next($request); // Địa chỉ IP hợp lệ, tiếp tục xử lý yêu cầu
    }

        // Nếu không hợp lệ, bạn có thể chuyển hướng hoặc trả về lỗi tùy ý
        // return response()->json(['error' => 'Access denied.'], 403);
        dd($userIPAddress);
    }
}
