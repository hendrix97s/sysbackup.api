<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BackupFormRequest;
use App\Model\Backup;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    private $request;
    private $backup;

    public function __construct(BackupFormRequest $request, Backup $backup)
    {
        $this->request = $request;
        $this->backup = $backup;
    }

    public function store(){
        return $this->backup->create($this->request);
    }

    public function update($id){
        return "ok";
    }
}
