<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Resources\Permissions\PermissionResource;
use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionsController extends Controller
{
    /**
     * @var
     */
    private $permissionRepo;

    /**
     * PermissionsController constructor.
     * @param PermissionRepositoryInterface $permissionRepo
     */
    public function __construct(PermissionRepositoryInterface $permissionRepo)
    {
        $this->permissionRepo = $permissionRepo;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PermissionResource::collection($this->permissionRepo->get());
    }
}
