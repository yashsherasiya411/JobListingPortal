<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => Hash::make('password123'),
        ]);

        $samples = [
            ['Junior .NET Developer Intern', 'Sample Tech Pvt Ltd', 'Ahmedabad', 'Internship', 'Stipend: 10,000/month', 'Work with the team on ASP.NET Core web applications and SQL Server databases.'],
            ['Laravel Web Developer', 'Sample Web Studio', 'Rajkot', 'Full-time', null, 'Build and maintain client websites using Laravel, HTML, CSS and JavaScript.'],
            ['Frontend Developer (Remote)', 'Sample Remote Co', 'Remote', 'Remote', null, 'Create responsive user interfaces with HTML, CSS and JavaScript.'],
        ];

        foreach ($samples as [$title, $company, $location, $type, $salary, $description]) {
            JobListing::create([
                'user_id' => $user->id,
                'title' => $title,
                'company' => $company,
                'location' => $location,
                'job_type' => $type,
                'salary' => $salary,
                'description' => $description,
            ]);
        }
    }
}
