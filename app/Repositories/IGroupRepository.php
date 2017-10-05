<?php

namespace App\Repositories;

use App\Group;

interface IGroupRepository {
    public function all();
    public function findGroup($id);
    public function findGroupByCode($code);
    public function add(Group $group);
    public function update($id, array $group_data);
    public function remove($id);
}