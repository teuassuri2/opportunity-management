<?php

namespace App\Services;

use App\Models\Products;

class ProductsService {

    private Products $products;

    public function __construct(Products $products) {
        $this->products = $products;
    }

    public function store(array $data) {
        $this->products->name = $data['name'];
        $this->products->save();
        return $this->products;
    }

    public function update(Products $products, array $data) {
        $products->name = $data['name'];
        $products->save();
        return $products;
    }

    public function findAll() {
        return $this->products->all();
    }

    public function findOne(int $id) {
        return $this->products->find($id);
    }

    public function delete(int $id) {
        return $this->products->find($id)->delete();
    }

}
