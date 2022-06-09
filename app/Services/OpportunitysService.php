<?php

namespace App\Services;

use App\Models\Opportunitys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \App\Models\OpportunitysStatus;

class OpportunitysService {

    private Opportunitys $opportunitys;

    public function __construct(Opportunitys $opportunitys) {
        $this->opportunitys = $opportunitys;
    }

    public function store(array $data) {

        try {

            $this->opportunitys->title = $data['title'];
            $this->opportunitys->description = $data['description'];
            $this->opportunitys->users_id = Auth::user()->id;
            $this->opportunitys->customers_id = $data['customers_id'];
            $this->opportunitys->products_id = $data['products_id'];
            $this->opportunitys->save();
            Session::flash('status', 'Oportunidade cadastrada com sucesso!');
            return redirect()->route('opportunitys_store');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function updateAcceptOrReject(Opportunitys $opportunitys, $option) {
        try {

            $opportunitysStatus = new OpportunitysStatus();
            $opportunitysStatus->opportunitys_id = $opportunitys->id;
            $opportunitysStatus->status = $option;
            $opportunitysStatus->users_id = Auth::user()->id;
            $opportunitysStatus->save();
            return redirect()->route('opportunitys');
        } catch (Exception $exc) {
            return false;
        }
    }
    
    public function updateStatus(Opportunitys $opportunitys, $request, $api = false) {
        try {
            $opportunitys->status = $request->input('status');
            $opportunitys->save();
            
            if ($api){
                return $opportunitys;
            }
            
            Session::flash('status', 'Status da Oportunidade alterado com sucesso!');
            return redirect()->route('opportunitys_update', [$opportunitys->id ]);
        } catch (Exception $exc) {
            return false;
        }
    }
    

    public function findAll($request) {
        $opportunitys = $this->opportunitys;

        if (!empty($request->input('user_id'))) {
            $opportunitys = $this->opportunitys->where('user_id', '=', $request->input('user_id'));
        }

        if (!empty($request->input('data'))) {
            $opportunitys = $this->opportunitys->where('data', '=', $request->input('data'));
        }

        if (!empty($request->input('title'))) {
            $opportunitys = $this->opportunitys->where('title', 'like', '%'.$request->input('title').'%');
        }
        
        return $opportunitys->where('status', 1)->get();
    }

    public function findOne(int $id) {
        return $this->opportunitys->find($id);
    }

    public function delete(int $id) {
        return $this->opportunitys->find($id)->delete();
    }

}
