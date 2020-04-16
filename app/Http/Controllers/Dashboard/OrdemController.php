<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Message;
use App\Http\Requests\Dashboard\OrdemFormRequest;
use App\Model\Ordem;

class OrdemController extends Controller
{
    //
    private $ordemService;

    public function __construct(Ordem $ordemService)
    {
        $this->ordemService = $ordemService;
    }

    public function store(OrdemFormRequest $request)
    {
        try {
             $os = $this->ordemService;
             $data = [
                'admin_id'      => $request->admin_id,
                'clinic_id'     => $request->clinic_id,
                'problema'      => $request->problema,
                'solucao'       => $request->solucao,
                'avaliacao'     => $request->avaliacao,
                'feedback'      => $request->feedback,
                'type'          => $request->type
            ];

            $result = $os->create($data);
            return Message::msg($result,201);
        } catch (\Throwable $th) {

            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }
    
    public function update($id, OrdemFormRequest $request)
    {
        try {
            $request;
            $data = [
                'problema'      => $request->problema,
                'solucao'       => $request->solucao,
                'avaliacao'     => $request->avaliacao,
                'feedback'      => $request->feedback,
                'type'          => $request->type
            ];

            if($this->ordemService->find($id)){
                $result = $this->ordemService->find($id)->update($data);
                return Message::msg(['message'=> 'Atualizado com sucesso!'], 200);
            }else{
                $result = $this->ordemService->create($data);
                return Message::msg($result, 201);
            }

            

        } catch (\Throwable $th) {

            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }

    public function delete($id)
    {
        try {
            $os = $this->ordemService->find($id); 
            if($os){
                $os->delete();
                return Message::msg(['message'=>'deletado'],200);
            }else{
                return Message::msg(['message'=>'not found'],404);
            }
        } catch (\Throwable $th) {
            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }

    public function get($ordem_id)
    {
        try {
            $os = $this->ordemService->find($ordem_id);
            if($os){
                return Message::msg($os,200);
            }else{
                return Message::msg(['message'=>'not found'],404);
            }
        } catch (\Throwable $th) {
            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }

    public function get_all($user_id)
    {
        try {
            $result = $this->ordemService
            ->where('user_id', '=', $user_id)
            ->get();

            return Message::msg($result, 200);
        } catch (\Throwable $th) {
            
            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
        
    }
}
