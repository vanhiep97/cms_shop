<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        $users = User::where('level', '<>', 0)->paginate(10);
        return view('cms.modules.setting.setting', compact('users'));
    }
    public function createUsers(CreateUserRequest $request)
    {
        try {
            $min = 000001;
            $max = 999999;
            $userCode = 'NV-'.random_int ($min , $max);
            $users = User::create([
                'user_code' => $userCode,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt(123456),
                'level' => $request->level,
                'user_practise' => auth()->user()->name,
                'status' => $request->status
            ]);
            return response()->json([
                'message' => 'Create User success',
                'data' => $users
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'message' => 'success',
            'data' => $user
        ], 200);
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'user_practise' => auth()->user()->name,
                'status' => $request->status
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        $ids = explode(',', $id);
        User::destroy($ids);
        return response()->json([
           'message' => 'success',
        ], 200);
    }
}
