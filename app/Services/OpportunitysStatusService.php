<?php  namespace App\Services; use App\Models\OpportunitysStatus; class OpportunitysStatusService {  private OpportunitysStatus $opportunitysStatus;public function __construct(OpportunitysStatus $opportunitysStatus)
    {
        $this->opportunitysStatus = $opportunitysStatus;
    }public function store(array $data){ $this->opportunitysStatus->status = $data['status'];
 $this->opportunitysStatus->users_id = $data['users_id'];
 $this->opportunitysStatus->opportunitys_id = $data['opportunitys_id'];
 $this->opportunitysStatus->save();
 return $this->opportunitysStatus;
}public function update(OpportunitysStatus $opportunitysStatus, array $data){ $opportunitysStatus->status = $data['status'];
 $opportunitysStatus->users_id = $data['users_id'];
 $opportunitysStatus->opportunitys_id = $data['opportunitys_id'];
 $opportunitysStatus->save();
return $opportunitysStatus;
}public function findAll()
    {
        return $this->opportunitysStatus->all();
    }public function findOne(int $id)
    {
        return $this->opportunitysStatus->find($id);
    }public function delete(int $id)
    {
        return $this->opportunitysStatus->find($id)->delete();
    }  }