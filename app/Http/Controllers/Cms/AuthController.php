<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\ChangePasswordRequest;
use App\Http\Requests\auth\ForgotPasswordRequest;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\SetPasswordRequest;
use App\Repositories\Cms\user\UserRepository;
use App\Services\StatusResponse;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use UploadFile;
    use StatusResponse;

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('cms.modules.auth.login');
    }

    public
    function signIn(LoginRequest $request)
    {
        try {
            $logined = auth()->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1]);
            if ($logined == false) {
                return response()->json([
                    'code' => $logined,
                    'message' => 'Login Failer',
                ]);
            }
            return response()->json([
                'code' => $logined,
                'message' => 'Login Success',
            ]);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public
    function account()
    {
        return view('cms.modules.account.info');
    }

    public
    function logout()
    {
        try {
            $logouted = auth()->logout();
            if ($logouted == true) {
                return redirect()->route('page-login');
            } else {
                return redirect(\URL::previous());
            }
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public
    function profile($id)
    {
        $user = $this->userRepository->findById($id);
        $role_label = $user->role->role_label;
        $user = $this->userRepository->findById($id);
        return view('admins.modules.auth.profile', compact('role_label', 'user'));
    }

    public
    function updateProfile(Request $request, $id)
    {
        try {
            if ($request->hasFile('avatar')) {
                $fileName = $this->uploadFile('uploads/user/profile/', $request->file('avatar'));
            } else {
                $fileName = $this->userRepository->findById($id)->avatar;
            }
            $this->userRepository->updateProfile([
                'avatar' => $fileName,
                'name' => $request->input('name'),
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ], $id);
            return redirect()->back()->with('message', 'Cập nhật Profile thành công');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public
    function changePassword(ChangePasswordRequest $request, $id)
    {
        try {
            $this->userRepository->changePassword($request->all(), $id);
            return $this->responseStatus(200, 'Change Password Success');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public
    function forgotPassword()
    {
        return view('cms.modules.auth.forgot-password');
    }

    public
    function getVerifyCode(ForgotPasswordRequest $request)
    {
        try {
            $codeVerify = random_int(000000, 999999);
            $subject = '[Ecommerce] Email forgot password!';
            $this->mailService->sendVerifyCode($subject, $request->email, $codeVerify);
            $user = $this->userRepository->findBy('email', $request->email)->first();
            $codeVerified = $this->codeVerifyService->createVerifyCode($codeVerify, $user->id);
            if ($codeVerified) {
                return redirect()->back()->with('message', 'Send Mail Success !!');
            } else {
                return redirect()->back()->with('message', 'Send Mail Error !!');
            }
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public
    function resetPassword()
    {
        return view('cms.modules.auth.reset-password');
    }

    public
    function changePasswordNew(SetPasswordRequest $request)
    {
        try {
            $verifyCode = $this->codeVerifyService->getByVerifyCodeActive($request->codeVerify);
            $this->userRepository->changePassword($request->all(), $verifyCode->user_id);
            $this->codeVerifyService->expireVerifyCodeActive($verifyCode->codeVerify);
            return redirect()->route('page-login');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }
}
