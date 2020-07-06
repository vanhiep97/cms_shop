<?php

namespace App\Services;

use App\Models\CodeVerify;
use Illuminate\Support\Carbon;

class CodeVerifyService
{
    protected $codeVerify;

    public function __construct(CodeVerify $codeVerify)
    {
        $this->codeVerify = $codeVerify;
    }

    public function createVerifyCode($codeVerify, int $user_id)
    {
        return CodeVerify::create([
            'user_id' => $user_id,
            'code_verify' => $codeVerify,
        ]);
    }

    public function getByVerifyCodeActive($code)
    {
        return CodeVerify::whereNull('verify_at')
            ->where(['code_verify' => $code])
            ->where('created_at', '>', Carbon::now()->subMinutes(15))
            ->first();
    }

    public function expireVerifyCodeActive($code)
    {
        return CodeVerify::where(['code_verify' => $code])->update(['verify_at' => Carbon::now()]);
    }
}
