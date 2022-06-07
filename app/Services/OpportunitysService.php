<?php

namespace App\Services;

use App\Models\Opportunitys;

class OpportunitysService {

    private Opportunitys $opportunitys;

    public function __construct(Opportunitys $opportunitys) {
        $this->opportunitys = $opportunitys;
    }

    public function store(array $data) {
        $this->opportunitys->title = $data['title'];
        $this->opportunitys->description = $data['description'];
        $this->opportunitys->users_id = $data['users_id'];
        $this->opportunitys->customers_id = $data['customers_id'];
        $this->opportunitys->products_id = $data['products_id'];
        $this->opportunitys->save();
        return $this->opportunitys;
    }

    public function update(Opportunitys $opportunitys, array $data) {
        $opportunitys->title = $data['title'];
        $opportunitys->description = $data['description'];
        $opportunitys->users_id = $data['users_id'];
        $opportunitys->customers_id = $data['customers_id'];
        $opportunitys->products_id = $data['products_id'];
        $opportunitys->save();
        return $opportunitys;
    }

    public function findAll($search) {
        if (!empty($search)){
            return $this->opportunitys->where('title','LIKE','%'.$search.'%')->get();
        }
        
        return $this->opportunitys->all();
    }

    public function findOne(int $id) {
        return $this->opportunitys->find($id);
    }

    public function delete(int $id) {
        return $this->opportunitys->find($id)->delete();
    }

}
