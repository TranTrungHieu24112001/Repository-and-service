<?php

namespace App\Services;

use App\Repository\AdminRepositoryInterface;
use Dotenv\Parser\Value;
use Illuminate\Support\Facades\Validator;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function saveAdminData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Invalid input value'
            ]);
        }

        $result = $this->adminRepository->save($data);
        return $result;
    }

    public function getAllAdmin()
    {
        return $this->adminRepository->getAdmin();
    }

    public function getAdminId($id)
    {
        return $this->adminRepository->getAdminId($id);
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Invalid input value'
            ]);
        }

        return $this->adminRepository->update($data, $id);
    }

    public function delete($id)
    {
        $admin = $this->adminRepository->delete($id);
        return $admin;
    }
}