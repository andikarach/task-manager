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

    public function api_task_summary(Request $request)
    {
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $id_user = $request->get('id_user');
        $role    = $request->get('role');
        $data    = [];

        $countData = 0;
        $totalFiltered = 0;

        $query = "SELECT task.id_task, m_category_task.category, task.task, task.status, task.description, task.created_at, users.name 
            FROM `task` 
            LEFT JOIN m_category_task ON m_category_task.id_category = task.id_category 
            LEFT JOIN users ON users.id = task.id_user 
            WHERE 1
        ";

        if($role != 'admin'){
            $query .= "AND task.id_user = ".$id_user; 
        }

        if (!empty($_POST['search']['value'])) {
            $search = $_POST['search']['value'];

            // ADD ADDITIONAL WHERE
            $query .= " AND 
                (
                    task.task LIKE '%" . $search . "%' OR 
                    task.status LIKE '%" . $search . "%' OR 
                    task.description LIKE '%" . $search . "%'
                )
            ";
        }

        $queryCount = $query;
        $query .= " ORDER BY created_at";
        $query .= " LIMIT $limit OFFSET $start";

        $data =  MyData::getCustomQuerying($query);
        // STOP QUERY FOR GET ALL DATA

        $dataCount =  MyData::getCustomQuerying($queryCount);
        $countData = count($dataCount);
        $totalFiltered = $countData;

        $newData = [];
        if (!empty($data)) {
            foreach ($data as $dat) {
                $btn = $this->generateButton($dat->id_task);

                $nestedData['task']         = $dat->task;
                $nestedData['description']  = $dat->description;
                $nestedData['category']     = $dat->category;
                $nestedData['status']       = $dat->status;
                $nestedData['created_at']   = $dat->created_at;
                $nestedData['action']       = $btn;
                $newData[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($_POST['draw']),
            "recordsTotal"    => intval($countData),
            "recordsFiltered" => intval($totalFiltered),
            "query"           => $query,
            "data"            => $newData
        );

        echo json_encode($json_data);
    }
}
