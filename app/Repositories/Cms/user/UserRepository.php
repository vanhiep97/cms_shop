<?php

namespace App\Repositories\Cms\user;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function save(array $data, int $id = null)
    {
        return parent::save([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(12345678),
            'level' => 1,
            'status' => $data['status'],
            'role_id' => $data['role_id'],
            'created_by' => auth()->user()->name,
        ], $id);
    }

    public function searchUser($data)
    {
        return parent::query()->where('level', 1)->where('email', 'like', '%' . $data . '%')->orderBy('id', 'DESC')->paginate(10);
    }

    public function updateProfile(array $data, int $id = null)
    {
        return parent::save($data, $id);
    }

    public function changePassword(array $data, int $id = null)
    {
        return parent::save([
            'password' => bcrypt($data['passwordNew'])
        ], $id);
    }
}
