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

    public function update($id = null, Request $request){
        if($id != null){
            $data = [
                'name' => $request->name,
                'email' => $request->email
            ];

            try {
                if($this->admin->find($id)->update($data)){
                    return Message::msg(200, null);
                }
            } catch (\Throwable $th) {
                return Message::msg(500, $th->getMessage());
            }
        }else{
            return Message::msg(404,null);
        }
    }

    public function delete($id = null){
        if($id != null){
            try {
                $this->admin->find($id)->delete();
                return Message::msg(200, null);
            } catch (\Throwable $th) {
                //throw $th;
                return Message::msg(500, $th->getMessage());
            }
        }else{
            return Message::msg(404, null);
        }
    }

    public function get($id = null){
        if($id != null){
            return Message::msg(302, $this->admin->find($id));
        }
        else{
            return Message::msg(404,null);
        }
    }

    public function get_all(){
        try {
            return Message::msg(302, $this->admin->get());
        } catch (\Throwable $th) {
            return Message::msg(500, $th->getMessage());
        }
    }
}
