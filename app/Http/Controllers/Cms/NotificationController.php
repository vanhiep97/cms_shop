<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Cms\user\UserRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $serverKey;
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->serverKey = config('app.firebase_server_key');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('cms.modules.notifications.index');
    }

    public function saveToken (Request $request)
    {
        $user = $this->userRepository->findById(auth()->user()->id);
        $tokenSave = $user->device_token()->create([
            'user_id' => auth()->user()->id,
            'device_token' => $request->fcm_token,
            'ip_address' => $request->ip(),
            'browser_login' => $request->header('User-Agent')
        ]);
        return response()->json([
            'isSuccess' => true,
            'data' => $tokenSave
        ]);
    }

    public function sendPush (Request $request)
    {
        $user = User::find(2);
        $data = [
            "registration_ids" => ['f1Y6awBquNxpk-A2sO_VbV:APA91bEIvEUjRUP_GCwstG5XVFB953c7M_f82nhwXAhlAOASc_ygtkByvlEDYBl5pIzQ2HslcFjKwoH7dWlV-Nh19-3CyD5J-p8BsmOsV9y8DvygOnhB4_80hqVv_D9kiaEp0u-XB0Od'],
            "notification" =>
                [
                    "title" => 'Web Push',
                    "body" => "https://my.workplace.com/chat/t/100051017075605",
                    "icon" => url('/logo.png')
                ],
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_exec($ch);
        return redirect('/admin')->with('message', 'Notification sent!');
    }
}
