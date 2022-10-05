<?php

namespace App\Repository\Eloquent;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function getModel()
    {
        return Admin::class;
    }

    public function getAdmin()
    {
        return $this->model->get();
    }

    public function save($data)
    {
        $model = new $this->model;
        $model['admin_name'] = $data['name'];
        $model['admin_email'] = $data['email'];
        $model['admin_phone'] = $data['phone'];
        $model->save();
    }
    
    public function delete($id)
    {
        $admin = $this->model->find($id);
       
        $admin->delete();
    }
    
    public function getAdminId($id)
    {
        return $this->model->find($id);
    }

    public function edit($data, $id)
    {
        $admin = $this->model->find($id);
        $admin['admin_name'] = $data['name'];
        $admin['admin_email'] = $data['email'];
        $admin['admin_phone'] = $data['phone'];
        $admin->save();
    }
}