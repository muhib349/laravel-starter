<?php


namespace App\Resources\Users;


use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'username' => $this->username,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'post_code' => $this->post_code,
        ];
    }
}
