<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            array_push($data, [
                'name'       => $faker->name,
                'username'   => $faker->userName,
                'email'      => $faker->unique()->safeEmail,
                'password'   => password_hash('password',   PASSWORD_DEFAULT),
                'role'       => $faker->randomElement(['admin',    'member']),
                'status'     => $faker->randomElement(['active', 'inactive']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $this->db->table('users')->insertBatch($data);
    }
}
