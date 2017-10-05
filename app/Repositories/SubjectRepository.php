<?php

namespace App\Repositories;

use App\Subject;

class SubjectRepository implements ISubjectRepository
{
    public function all()
    {
        return Subject::orderBy('name', 'asc')->paginate(10);
    }

    public function findSubject($id)
    {
        return Subject::findOrFail($id);
    }

    public function add(Subject $subject)
    {
        Subject::save($subject);
    }

    public function remove($id)
    {
        Subject::destroy($id);
    }

    public function update($id, array $post_data)
    {
        Subject::findOrFail($id)->update($post_data);
    }
}