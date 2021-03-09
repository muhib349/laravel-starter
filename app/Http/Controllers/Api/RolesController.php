<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\AssignPermissionRequestValidation;
use App\Http\Requests\Roles\CreateRoleRequestValidation;
use App\Http\Requests\Roles\UpdateRoleRequestValidation;
use App\Http\Resources\Roles\RoleResource;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Resources\Roles\RolesResource;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * RolesController constructor.
     * @param RoleRepositoryInterface $roleRepo
     */
    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RolesResource::collection($this->roleRepo->get());
    }

    /**
     * @param CreateRoleRequestValidation $request
     * @return RolesResource|\Illuminate\Http\JsonResponse
     */
    public function store(CreateRoleRequestValidation $request)
    {
        try {
            $role = $this->roleRepo->store($request);
            return new RolesResource($role);
        } catch (\ErrorException $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }

    /**
     * @param $id
     * @return RolesResource|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $role = $this->roleRepo->show($id);
            return new RolesResource($role);
        } catch (\ErrorException $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }

    /**
     * @param UpdateRoleRequestValidation $request
     * @param $id
     * @return RolesResource|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateRoleRequestValidation $request,$id)
    {
        try {
            $role = $this->roleRepo->update($id, $request);
            return new RolesResource($role);
        } catch (\ErrorException $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     * @param AssignPermissionRequestValidation $request
     * @return RolesResource|\Illuminate\Http\JsonResponse
     */
    public function assignPermissions($id, AssignPermissionRequestValidation $request) {
        try {
            $role = $this->roleRepo->assignPermissions($id, $request);
            return new RolesResource($role);

        } catch (\ErrorException $error) {
            return response()->json([
                'message' => $error->getMessage(),
                'error' => true
            ], $error->getCode());
        }
    }
}
