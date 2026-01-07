<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LogoutResponse;

class AdminLogoutResponse implements LogoutResponse
{
    public function toResponse($request)
    {
        // 管理者ログイン画面へ
        return redirect('/login');
    }
}
