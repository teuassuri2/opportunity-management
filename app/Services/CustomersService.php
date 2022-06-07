<?php

namespace App\Services;

use App\Models\Customers;

class CustomersService {

    private Customers $customers;

    public function __construct(Customers $customers) {
        $this->customers = $customers;
    }

    public function store(array $data) {
        $this->customers->name = $data['name'];
        $this->customers->document = $data['document'];
        $this->customers->save();
        return $this->customers;
    }

    public function update(Customers $customers, array $data) {
        $customers->name = $data['name'];
        $customers->document = $data['document'];
        $customers->save();
        return $customers;
    }

    public function findAll() {
        return $this->customers->all();
    }

    public function findOne(int $id) {
        return $this->customers->find($id);
    }

    public function delete(int $id) {
        return $this->customers->find($id)->delete();
    }

}
