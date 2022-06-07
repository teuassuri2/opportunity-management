<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OpportunitysResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
'id' => $this->id,
'title' => $this->title,
'description' => $this->description,
'users_id' => $this->users_id,
'customers_id' => $this->customers_id,
'products_id' => $this->products_id,];

    }
}

