<?php


namespace App\Repositories;


use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Collection;

class PermissionRepository implements PermissionRepositoryInterface
{
    /**
     * @var Permission
     */
    private $model;

    /**
     * PermissionRepository constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->model->orderBy('name', 'asc')->get();
    }

}
