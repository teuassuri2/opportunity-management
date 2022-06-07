<?php

namespace App\Services;

use App\Models\Users;

class UsersService {

    private Users $users;

    public function __construct(Users $users) {
        $this->users = $users;
    }

    public function store(array $data) {
        $this->users->name = $data['name'];
        $this->users->phone = $data['phone'];
        $this->users->email = $data['email'];
        $this->users->remember_token = $data['remember_token'];
        $this->users->password = $data['password'];
        $this->users->email_verified_at = $data['email_verified_at'];
        $this->users->types_users_id = $data['types_users_id'];
        $this->users->save();
        return $this->users;
    }

    public function update(Users $users, array $data) {
        $users->name = $data['name'];
        $users->phone = $data['phone'];
        $users->email = $data['email'];
        $users->remember_token = $data['remember_token'];
        $users->password = $data['password'];
        $users->email_verified_at = $data['email_verified_at'];
        $users->types_users_id = $data['types_users_id'];
        $users->save();
        return $users;
    }

    public function findAll() {
        return $this->users->all();
    }

    public function findOne(int $id) {
        return $this->users->find($id);
    }

    public function delete(int $id) {
        return $this->users->find($id)->delete();
    }

}
