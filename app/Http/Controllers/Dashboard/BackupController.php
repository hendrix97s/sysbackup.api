<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Message;
use Illuminate\Http\Request;
use App\Model\Backup;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    private $request;
    private $backup;

    public function __construct(Backup $backup, Request $request)
    {
        $this->request = $request;
        $this->backup = $backup;
    }

    public function upload()
    {

            try {
                $request = $this->request;
                $id = $request->clinic_id;

                $upload = $request->file->storeAs(
                    'local', $id."/".$request->file->getClientOriginalName()
                );

                if($upload){
                    $result = $this->backup->create([
                            "name"          => $request->file->getClientOriginalName(),
                            "size"          => Storage::size($upload),
                            "path"          => "local/$id/".$request->file->getClientOriginalName(),
                            "hour_backup"   => date('h:i'),
                            "clinic_id"     => $id
                    ]);

                    return Message::msg(201, ['data'=>$result]);
                }
                
            } catch (\Throwable $th) {
                return Message::msg(500, $th->getMessage()) ;
            }
    }

    public function download($backup_id)
    {

        $backup = $this->backup->find($backup_id);
        return Storage::download($backup->path);
    }

    public function delete($backup_id)
    {
        try {
            $backup = $this->backup->find($backup_id);
             if($backup){
                $backup->delete();
                Storage::delete($backup->path);
                return Message::msg(200,['message'=>'arquivo deletado com sucesso.']);
             }else{
                 return Message::msg(404, null);
             }

        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }

    public function get($backup_id)
    {
        if($this->backup->find($backup_id)){
            return Message::msg(200, $this->backup->find($backup_id));
        }else{
            return Message::msg(404, null);
        }
    }

    public function get_all($clinic_id)
    {
        return Message::msg(200, ["data" => $this->backup->where('clinic_id','=',$clinic_id)->get()]);
    }
}