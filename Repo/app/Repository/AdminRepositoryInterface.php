<?php

namespace App\Repository;

use App\Repository\BaseRepositoryInterface;

interface AdminRepositoryInterface extends BaseRepositoryInterface
{
    public function getAdmin();
    public function save($data);
    public function delete($id);
    public function getAdminId($id);
    public function edit($data, $id);
}