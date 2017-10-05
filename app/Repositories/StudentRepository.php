<?php

namespace App\Repositories;

use App\Student;

class StudentRepository implements IStudentRepository
{
    public function all()
    {
        return Student::orderBy('lastname', 'asc')->paginate(20);
    }

    public function findStudent($id)
    {
        return Student::findOrFail($id);
    }

    public function add(Student $student)
    {
        Student::save($student);
    }

    public function remove($id)
    {
        Student::findOrFail($id)->delete();
    }

    public function update($id, array $post_data)
    {
        Student::findOrFail($id)->update($post_data);
    }
}