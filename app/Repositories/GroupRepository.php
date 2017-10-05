<?php

namespace App\Repositories;

use App\Group;

class GroupRepository implements IGroupRepository
{
    public function all()
    {
        return Group::orderBy('code', 'asc')->paginate(10);;
    }

    public function findGroup($id)
    {
        return Group::findOrFail($id);
    }
    
    public function findGroupByCode($code)
    {
        return Group::where('code','=', $code)->get();
//        return Group::get(array('code')) === $code;
    }

    public function add(Group $group)
    {
        Group::save($group);
    }

    public function remove($id)
    {
        Group::findOrFail($id)->delete();
    }

    public function update($id, array $post_data)
    {
        Group::findOrFail($id)->update($post_data);
    }
}