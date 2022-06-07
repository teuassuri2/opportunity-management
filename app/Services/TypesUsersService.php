<?php

namespace App\Services;

use App\Models\TypesUsers;

class TypesUsersService {

    private TypesUsers $typesUsers;

    public function __construct(TypesUsers $typesUsers) {
        $this->typesUsers = $typesUsers;
    }

    public function store(array $data) {
        $this->typesUsers->name = $data['name'];
        $this->typesUsers->save();
        return $this->typesUsers;
    }

    public function update(TypesUsers $typesUsers, array $data) {
        $typesUsers->name = $data['name'];
        $typesUsers->save();
        return $typesUsers;
    }

    public function findAll() {
        return $this->typesUsers->all();
    }

    public function findOne(int $id) {
        return $this->typesUsers->find($id);
    }

    public function delete(int $id) {
        return $this->typesUsers->find($id)->delete();
    }

}
