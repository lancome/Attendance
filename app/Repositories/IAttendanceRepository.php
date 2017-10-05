<?php

namespace App\Repositories;

use App\Attendance;

interface IAttendanceRepository {
    public function all();
    public function findAttendanceById($id);
    public function findAttendanceByStudent($code);
    public function add(Attendance $attendance);
    public function update($id, array $group_data);
    public function remove($id);
}