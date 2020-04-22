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
            return Message::msg(201,$result);
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
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
                return Message::msg(200,null);
            }else{
                return Message::msg(404, null);
            }

        } catch (\Throwable $th) {

            return Message::msg(500, $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $os = $this->ordemService->find($id); 
            if($os){
                $os->delete();
                return Message::msg(200,null);
            }else{
                return Message::msg(404,null);
            }
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function get($ordem_id)
    {
        try {
            $os = $this->ordemService->find($ordem_id);
            if($os){
                return Message::msg(203, $os);
            }else{
                return Message::msg(404, null);
            }
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function get_all($user_id)
    {
        try {
            $result = $this->ordemService
            ->where('user_id', '=', $user_id)
            ->get();

            return Message::msg(203, $result);
        } catch (\Throwable $th) {
            
            return Message::msg(500, $th->getMessage());
        }
        
    }
}
