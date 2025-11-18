<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KlipingDigital;
use App\Models\User;
use Faker\Factory as Faker;

class KlipingDigitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get or create admin users
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $categories = ['Teknologi', 'Bisnis', 'Kesehatan', 'Pendidikan', 'Hiburan', 'Olahraga', 'Politik'];
        $sources = ['CNN Indonesia', 'BBC News', 'Reuters', 'Associated Press', 'The Guardian', 'Bloomberg', 'TechCrunch'];

        // Create 50 kliping digital records
        for ($i = 0; $i < 50; $i++) {
            KlipingDigital::create([
                'judul' => $faker->sentence(6),
                'sumber' => $faker->randomElement($sources),
                'tanggal_publikasi' => $faker->dateTimeBetween('-6 months', 'now'),
                'penulis' => $faker->name(),
                'isi' => $faker->paragraph(5),
                'kategori' => $faker->randomElement($categories),
                'url_sumber' => $faker->url(),
                'is_protected' => $faker->boolean(30), // 30% chance of being protected
                'created_by' => $adminUser->id,
                'updated_by' => $adminUser->id,
                'is_deleted' => $faker->boolean(10), // 10% chance of being deleted
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }

        $this->command->info('KlipingDigital seeder completed successfully!');
    }
}
