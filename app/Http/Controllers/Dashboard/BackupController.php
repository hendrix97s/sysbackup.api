<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\BackupFormRequest;
use App\Model\Backup;

class BackupController extends Controller
{
    //
    private $request;
    private $backup;

    public function __construct(BackupFormRequest $request, Backup $backup)
    {
        $this->request = $request;
        $this->backup = $backup;
    }

    public function store()
    {
            try {
                $result = $this->backup->create([
                        "name"      => $this->request->name,
                        "size"      => $this->request->size,
                        "user_id"   => $this->request->user_id
                ]);

                return response()->json($result, 200);
                
            } catch (\Throwable $th) {
                return response()->json(["error" => $th->getMessage()],500) ;
            }
    }
}
