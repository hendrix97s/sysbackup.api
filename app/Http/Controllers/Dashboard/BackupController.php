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
                        "name"          => $this->request->name,
                        "size"          => $this->request->size,
                        "path"          => $this->request->path,
                        "hour_backup"   => $this->request->hour_backup,
                        "clinic_id"     => $this->request->clinic_id
                ]);

                return Message::msg(201, $result);
                
            } catch (\Throwable $th) {
                return Message::msg(500, $th->getMessage()) ;
            }
    }

    public function update($id_backup, Request $request)
    {

        try {
            //code...
            $this->request = $request;
            $data = [
                "name"      => $this->request->name,
                "size"      => $this->request->size,
                "path"          => $this->request->path,
                "hour_backup"   => $this->request->hour_backup,
                "clinic_id"     => $this->request->clinic_id
            ];

            $backup = $this->backup->find($id_backup);
            if($backup){
                $backup->update($data);
                return Message::msg(202, null);
            }else{
                return Message::msg(404, null);
            }

        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function delete($id_backup)
    {
        try {
            $backup = $this->backup->find($id_backup);
             if($backup){
                $backup->delete();
                 return Message::msg(202, null);
             }else{
                 return Message::msg(404, null);
             }

        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function get($id)
    {
        if($this->backup->find($id)){
            return Message::msg(302, $this->backup->find($id));
        }else{
            return Message::msg(404, null);
        }
    }

    public function get_all($clinic_id)
    {
        return Message::msg(302, $this->backup->where('clinic_id','=',$clinic_id)->get());
    }


}
