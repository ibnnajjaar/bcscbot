<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class UsersSeeder extends Seeder
{

    protected $data = [
        [
            'name' => 'Hussain Afeef',
            'email' => 'ibnahnajjaar@gmail.com',
            'password' => 'Wadadmw@',
        ],
    ];

    public function run()
    {
        foreach ($this->data as $user_data) {
            $user = User::whereEmail($user_data['email'])->first();

            if ($user) {
                continue;
            }

            $user = (new CreateNewUser())->create([
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'password' => $user_data['password'],
            ]);

            $user->email_verified_at = Carbon::now();
            $user->save();
        }
    }
}
