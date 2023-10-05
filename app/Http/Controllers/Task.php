<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Task extends Controller
{

    public function __construct(Request $request)
    {
        
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function index(Request $request)
    { 
        $this->AuthUser($request);
        $data['PageTitle'] = 'Task Manager';
        $data['category']  = MyData::getSelectedData('m_category_task', ['status' => 'active']);
        return view('Task/index', $data);
    }

    public function generateButton($id_task){
        $btn = '<button type="button" class="btn btn-sm btn-success" style="margin:2px"  onclick="detail('.$id_task.')"><i class="fa-solid fa-eye"></i></button>';
        $btn .= '<button type="button" class="btn btn-sm btn-warning" style="margin:2px"  onclick="edit('.$id_task.')"><i class="fa-solid fa-pencil"></i></button>';
        $btn .= '<button type="button" class="btn btn-sm btn-danger" style="margin:2px"  onclick="delete('.$id_task.')"><i class="fa-solid fa-trash"></i></button>';

        return $btn;
    }

}
