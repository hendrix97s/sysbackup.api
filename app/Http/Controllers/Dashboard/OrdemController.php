<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Message;
use App\Http\Requests\Dashboard\OrdemFormRequest;
use App\Model\Ordem;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    //
    private $request;
    private $ordemService;

    public function __construct(Ordem $ordemService)
    {
        $this->ordemService = $ordemService;
    }

    public function store(OrdemFormRequest $request)
    {
        try {

            $data = [
                'user_id'       => $request->user_id,
                'problema'      => $request->problema,
                'solucao'       => $request->solucao,
                'avaliacao'     => $request->avaliacao,
                'feedback'      => $request->feedback,
                'type'          => $request->type
            ];
            $result = $this->ordemService->create($data);

            return Message::msg($result,201);
        } catch (\Throwable $th) {

            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }
    
    public function update($id, OrdemFormRequest $request)
    {
        try {
            $this->request = $request;
            $data = [
                'user_id'       => $this->request->user_id,
                'problema'      => $this->request->problema,
                'solucao'       => $this->request->solucao,
                'avaliacao'     => $this->request->avaliacao,
                'feedback'      => $this->request->feedback,
                'type'          => $this->request->type
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

    public function get_ordem($ordem_id)
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

    public function get_all_ordem($user_id)
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
