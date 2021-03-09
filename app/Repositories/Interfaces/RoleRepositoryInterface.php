<?php


namespace App\Repositories\Interfaces;


use App\Http\Requests\Roles\AssignPermissionRequestValidation;
use App\Http\Requests\Roles\CreateRoleRequestValidation;
use App\Http\Requests\Roles\UpdateRoleRequestValidation;
use App\Models\Role;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param CreateRoleRequestValidation $request
     * @return Role
     */
    public function store(CreateRoleRequestValidation $request): Role;

    /**
     * @param int $id
     * @param UpdateRoleRequestValidation $request
     * @return Role
     */
    public function update(int $id, UpdateRoleRequestValidation $request): Role;

    /**
     * @return Collection
     *
     */
    public function getPermissionsByRole(int $id): Collection;

    /**
     * @param int $id
     * @return Role
     */
    public function show(int $id): Role;

    /**
     * @param AssignPermissionRequestValidation $request
     * @return Role
     */
    public function assignPermissions(int $id, AssignPermissionRequestValidation $request): Role;

    /**
     * @param string $name
     * @return Collection
     */
    public function getUsersByRoleName(string $name): Collection;

}
