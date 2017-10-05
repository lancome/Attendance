<?php

namespace App\Repositories;

use App\Student;

interface IStudentRepository {
    public function all();
    public function findStudent($id);
    public function add(Student $student);
    public function update($id, array $student_data);
    public function remove($id);
}