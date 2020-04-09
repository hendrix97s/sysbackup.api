<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Message;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\BackupFormRequest;
use App\Model\Backup;

class BackupController extends Controller
{
    private $request;
    private $backup;

    public function __construct(Backup $backup)
    {
        
        $this->backup = $backup;
    }

    public function store(BackupFormRequest $request)
    {
            $this->request = $request;

            try {
                $result = $this->backup->create([
                        "name"      => $this->request->name,
                        "size"      => $this->request->size,
                        "user_id"   => $this->request->user_id
                ]);

                return Message::msg($result,201);
                
            } catch (\Throwable $th) {
                $error = ["error" => $th->getMessage()];
                return Message::msg($error, 500) ;
            }
    }

    public function update($id_backup, BackupFormRequest $request)
    {

        try {
            //code...
            
            $this->request = $request;
            $data = [
                "name"      => $this->request->name,
                "size"      => $this->request->size,
                "user_id"   => $this->request->user_id
            ];

            if($this->backup->find($id_backup)){
                $result = $this->backup
                ->find($id_backup)
                ->update($data);
                return Message::msg(['success' => 'atualizado com sucesso!'], 200);
            }else{
                $result = $this->backup->create($data);
                return Message::msg($result, 201);
            }
            

        } catch (\Throwable $th) {

            $error = ["error" => $th->getMessage()];
            return Message::msg($error, 500);
        }
    }

    public function delete($id_backup)
    {
        try {
             if($this->backup->find($id_backup)){
                $this->backup->find($id_backup)->delete();
                 return Message::msg(['message'=>'backup deletado'],200);
             }else{
                 return Message::msg(['message'=>'registro inexistente'],404);
             }

        } catch (\Throwable $th) {
            $error = ["error" => $th->getMessage()];
            return Message::msg($error,500);
        }
    }

    public function get_backup($id)
    {
        if($this->backup->find($id)){
            $result = $this->backup->find($id)->get();
            return Message::msg($result, 200);
        }else{

            return Message::msg(['message'=>'registro inexistente'], 404);
        }
    }

    public function get_all_backup($user_id)
    {
        $result = $this->backup->where('user_id','=',$user_id)->get();
        return Message::msg($result, 200);
    }


}
