<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataAdmin = [
            'username' => 'gv1',
            'password' => '123',
            'name' => 'Giảng viên 1',
            'role' => 1,
        ];

        Account::query()->create($dataAdmin);

        $dataAdmin = [
            'username' => 'admin',
            'password' => '123',
            'name' => 'admin',
            'role' => 1,
        ];

        Account::query()->create($dataAdmin);

        $dataSV = [
            'username' => 'sv1',
            'password' => '123',
            'name' => 'Sinh viên 1',
            'role' => 0,
        ];

        Account::query()->create($dataSV);
    }
}
