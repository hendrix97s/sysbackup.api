<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminFormRequest;
use App\Model\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function store(AdminFormRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email
            ];
            
            $result = $this->admin->create($data);
            if($result){
                return Message::msg(201, $result);

            }
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
        
    }
}
