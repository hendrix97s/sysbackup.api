<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ClinicFormRequest;
use App\Model\Adress;
use App\Model\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    private $adress;
    private $clinic;

    public function __construct(Adress $adress, Clinic $clinic)
    {
        $this->adress = $adress;
        $this->clinic = $clinic;
    }

    public function store(ClinicFormRequest $request)
    {
        try {
            $dataClinic = [
                'name' => $request->name,
                'cnpj' => $request->cnpj,
                'expert' => $request->expert,
                'email' => $request->email,
                'status' => $request->status
            ];
            $result_clinic = $this->clinic->create($dataClinic);


            $dataAdress = [
                'rua' => $request->rua,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'cep' => $request->cep,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'contato' => $request->contato,
                'clinic_id' => $result_clinic->id
            ];
            $result_adress = $this->adress->create($dataAdress);

            if ($result_adress and $result_clinic) {
                $clinic = $result_clinic->toArray();
                $adress = ["adress" => $result_adress->toArray()];
                $merge_clinic_adress = array_merge($clinic,$adress);
                return Message::msg(201, $merge_clinic_adress);
            } else {
                return Message::msg(500, "Erro ao efetuar cadastro");
            }
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    

    public function update($id, Request $request)
    {

        if($id != null){
            try {
                $dataClinic = [
                    'name' => $request->name,
                    'cnpj' => $request->cnpj,
                    'expert' => $request->expert,
                    'email' => $request->email,
                    'status' => $request->status
                ];
                $dataAdress = [
                    'rua' => $request->rua,
                    'cidade' => $request->cidade,
                    'uf' => $request->uf,
                    'cep' => $request->cep,
                    'numero' => $request->numero,
                    'complemento' => $request->complemento,
                    'contato' => $request->contato
                ];
    
                $clinic = $this->clinic->find($id);
                $adress = $this->adress->where('clinic_id', '=', $id);
    
                if ($clinic and $adress) {
                    if ($clinic->update($dataClinic) and $adress->update($dataAdress)) {
                        return Message::msg(200, null);
                    } else {
                        return Message::msg(500, null);
                    }
                } else {
                    return Message::msg(404, null);
                }
            } catch (\Throwable $th) {
                return Message::msg(500, $th->getMessage());
            }
        }else{
            return Message::msg(404,null);  
        }
    }

    public function delete($id)
    {
        try {
            if($this->clinic->find($id) and $id != null){
                $adress = $this->adress->where('clinic_id','=',$id);
                if($adress){
                    $adress->delete();
                }
                $this->clinic->find($id)->delete();
                return Message::msg(200, null);
            }else{
                return Message::msg(404,null);
            }
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function get($id  = null)
    {
        if($id == null){
            return Message::msg(404, null);
        }else{
            $clinic = $this->clinic->find($id);
            $adress = $this->adress->where('clinic_id','=',$id)->get();
            if ($clinic and $adress) {
                $clinic = $clinic->toArray();
                $adress = $adress->toArray();
                $clinic_adress = array_merge($clinic, ['adress' => $adress]);
                return Message::msg(200, $clinic_adress);
            } else {
                return Message::msg(404, null);
            }
        }
    }

    public function get_all()
    {
        $clinics = $this->clinic->get();
        $clinic_adress = [];
        foreach ($clinics as $key => $value) {
            $adress = $this->adress->where('clinic_id', '=', $value->id)->get();
            ($adress)?$adress = ["adress" => $adress->toArray()]:$adress = ["adress" => null];
            $clinic_adress[$key] =  array_merge($value->toArray(), $adress);            
        }
        return $clinic_adress;
    }
}
