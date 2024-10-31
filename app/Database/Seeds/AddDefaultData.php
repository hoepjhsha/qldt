<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddDefaultData extends Seeder
{
    public function run(): void
    {
        $this->db->table('accounts')->insert([
            'username'      => 'admin',
            'password'      => password_hash('admin', PASSWORD_BCRYPT),
            'flag'          => 0,
            'status'        => 1,
            'fail_time'     => 0,
            'last_login_at' => null,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time()),
        ]);
        $this->db->table('accounts')->insert([
            'username'      => 'teacher1',
            'password'      => password_hash('teacher1', PASSWORD_BCRYPT),
            'flag'          => 1,
            'status'        => 1,
            'fail_time'     => 0,
            'last_login_at' => null,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time()),
        ]);
        $this->db->table('accounts')->insert([
            'username'      => '2022604618',
            'password'      => password_hash('2022604618', PASSWORD_BCRYPT),
            'flag'          => 2,
            'status'        => 1,
            'fail_time'     => 0,
            'last_login_at' => null,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time()),
        ]);

        /**
         * Add some courses data to the database
         */
        $courses = [
            ['course_name' => 'Mathematics'],
            ['course_name' => 'Physics'],
            ['course_name' => 'Chemistry'],
            ['course_name' => 'Biology'],
            ['course_name' => 'History'],
            ['course_name' => 'Geography'],
            ['course_name' => 'Computer Science'],
            ['course_name' => 'English Literature'],
            ['course_name' => 'Philosophy'],
            ['course_name' => 'Psychology'],
            ['course_name' => 'Art History'],
            ['course_name' => 'Political Science'],
            ['course_name' => 'Economics'],
            ['course_name' => 'Music Theory'],
            ['course_name' => 'Sociology'],
        ];

        foreach ($courses as $course) {
            $this->db->table('courses')->insert([
                'course_name' => $course['course_name'],
                'created_at'  => date('Y-m-d H:i:s', time()),
                'updated_at'  => date('Y-m-d H:i:s', time()),
            ]);
        }
    }
}
