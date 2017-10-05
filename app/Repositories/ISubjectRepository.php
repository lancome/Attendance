<?php

namespace App\Repositories;

use App\Subject;

interface ISubjectRepository {
    public function all();
    public function findSubject($id);
    public function add(Subject $subject);
    public function update($id, array $group_data);
    public function remove($id);
}