<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admin = $this->adminService->getAllAdmin();
        return view('welcome', ['admin' => $admin]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $admin = $this->adminService->saveAdminData($data);
        return Redirect::to('/');
    }

    public function getAdminById($id)
    {
        $admin = $this->adminService->getAdminId($id);
        return view('front.edit', ['admin' => $admin]);
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $admin = $this->adminService->update($data, $id);
        return Redirect::to('/');
    }

    public function delete($id)
    {
        $this->adminService->delete($id);

        return Redirect::to('/');
    }
}