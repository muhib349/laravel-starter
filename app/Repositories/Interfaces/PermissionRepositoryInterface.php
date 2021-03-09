<?php


namespace App\Repositories\Interfaces;


use Illuminate\Support\Collection;

interface PermissionRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

}
