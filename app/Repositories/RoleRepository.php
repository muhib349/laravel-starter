<?php


namespace App\Repositories;


use App\Http\Requests\Roles\AssignPermissionRequestValidation;
use App\Http\Requests\Roles\CreateRoleRequestValidation;
use App\Http\Requests\Roles\UpdateRoleRequestValidation;
use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @var Role
     */
    private $model;

    /**
     * RoleRepostitory constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->model->orderBy('name', 'asc')->get();
    }

    /**
     * @param CreateRoleRequestValidation $request
     * @return Role
     */
    public function store(CreateRoleRequestValidation $request): Role
    {

        DB::beginTransaction();

        try {
            $this->model->name = $request->name;
            $this->model->display_name = $request->display_name;
            $this->model->save();

            $this->model->permissions()->sync($request->permissions);

            DB::commit();

            return $this->model;

        } catch (\Exception $error) {
            DB::rollback();

            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }

    /**
     * @param int $id
     * @param UpdateRoleRequestValidation $request
     * @return Role
     */
    public function update(int $id, UpdateRoleRequestValidation $request): Role
    {

        DB::beginTransaction();

        try {
            $this->model = $this->model->find($id);
            $this->model->name = $request->name;
            $this->model->display_name = $request->display_name;
            $this->model->save();

            $this->model->permissions()->sync($request->permissions);

            DB::commit();

            return $this->model;

        } catch (\Exception $error) {
            DB::rollback();

            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }

    /**
     * @param $id
     * @return Role
     */
    public function show($id): Role
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function getPermissionsByRole(int $id): Collection
    {
        $role = $this->model->findOrFail($id);
        return $role->permissions;
    }

    public function assignPermissions(int $id, AssignPermissionRequestValidation $request): Role
    {
        $this->model = $this->model->find($id);
        $this->model->permissions()->sync($request->permissions);

        return $this->model;
    }

    public function getUsersByRoleName(string $name): Collection
    {
        $role = $this->model->where('name', $name)->first();
        return $role->users;
    }


}
