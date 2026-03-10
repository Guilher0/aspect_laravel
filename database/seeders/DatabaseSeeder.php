<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (User::count() === 0) {
            User::factory()->create([
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ]);

            $this->command->info('Usuário criado com sucesso! 👇');
            $this->command->info('E-mail: admin@admin.com');
            $this->command->info('Senha: password');
        }

        if (\App\Models\Approval::count() === 0) {
            $approvals = [
                [
                    'course' => 'Aprovados em Medicina em Tocantins',
                    'student_name' => 'Professores NERD🧠',
                    'image_base64' => 'images/ProfsMed.jpg',
                    'approval_date' => '2020-03-16',
                ],
                [
                    'course' => 'Aprovado em Agronomia no Pará',
                    'student_name' => 'Aluno NERD✨',
                    'image_base64' => 'images/aluno7.jpg',
                    'approval_date' => '2020-03-16',
                ],
                [
                    'course' => 'Aprovado em Medicina na ITPAC',
                    'student_name' => 'Aluno NERD✨',
                    'image_base64' => 'images/aluno1.jpg',
                    'approval_date' => '2020-03-10',
                ],
                [
                    'course' => 'Aprovado em Agronomia na UFT',
                    'student_name' => 'Aluno NERD✨',
                    'image_base64' => 'images/aluno2.jpg',
                    'approval_date' => '2020-02-12',
                ],
                [
                    'course' => 'Aprovadas em Medicina na UNIRG E UNIRV',
                    'student_name' => 'Aluno NERD✨',
                    'image_base64' => 'images/aluno5.jpg',
                    'approval_date' => '2020-02-12',
                ],
            ];

            foreach ($approvals as $approval) {
                // Here we keep the path for now. The blade uses asset() logic if it's a relative path,
                // but we changed the blade to just use the image directly.
                // Let's ensure the blade uses asset() if the image_base64 doesn't start with data:image
                \App\Models\Approval::create($approval);
            }
        }
    }
}
