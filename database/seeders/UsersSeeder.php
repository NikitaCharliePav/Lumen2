<?php

namespace Database\Seeders;

use App\Models\User;
use \Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Функция запаполняющая таблицу users_table
     * @return void
     */
    public function run()
    {
        if (empty(User::first()))
        {
            for ($i =0; $i < 20; $i++)
            {
                $this->createUser();
            }
        }
    }

    /**
     * Функция создает юзеров в таблице users_table.
     *
     * @return void
     */
    private function createUser()
    {
        $name = Arr::random([
            'John',
            'Charlie',
            'Svetlana',
            'Anna',
            'Nikita',
            'Victoria',
            'Oleg'
        ]);

        $user = new User();
        $user->id = Str::uuid();
        $user->login = strtolower($name . '_' . Str::random(5));
        $user->name = $name;
        $user->save();
    }

}
