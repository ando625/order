<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse;

class AdminLoginResponse implements LoginResponse
{
    public function toResponse($request)
    {
        // 管理者ログイン後の遷移先
        return redirect('/admin/index');
    }
}
