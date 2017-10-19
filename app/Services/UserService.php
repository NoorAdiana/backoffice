<?php

namespace App\Services;

use App\User;

class UserService
{
    /**
     * @var \App\User
     */
    protected $model;

    /**
     * Contructor new instance
     * 
     * @param \App\User
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Store new resource user
     * 
     * @param array $attributes
     * @return \App\User
     */
    public function store(array $attributes)
    {
        $attributes = array_only($attributes, $this->model->getFillable());

        return $this->model->create($attributes);
    }

    /**
     * Get list users with paginated
     * 
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Delete resource by given id
     * 
     * @param $id
     * @return bool
     */
    public function delete($id) 
    {
        $model = $this->model->find($id);

        return $model ? $model->delete() : false;
    }
}