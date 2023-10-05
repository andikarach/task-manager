<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MyData;
use Illuminate\Http\Request;

class TaskAPI extends Controller
{

    public function __construct()
    {

        $this->datetime = date('Y-m-d H:i:s');
    }


    public function generateButton($id_task)
    {
        $btn = '<button type="button" class="btn btn-sm btn-success" style="margin:2px"  onclick="viewDetail(' . $id_task . ')"><i class="fa-solid fa-eye"></i></button>';
        $btn .= '<button type="button" class="btn btn-sm btn-warning" style="margin:2px"  onclick="viewUpdate(' . $id_task . ')"><i class="fa-solid fa-pencil"></i></button>';
        $btn .= '<button type="button" class="btn btn-sm btn-danger" style="margin:2px"  onclick="viewDelete(' . $id_task . ')"><i class="fa-solid fa-trash"></i></button>';

        return $btn;
    }

    public function api_task_summary(Request $request)
    {
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $id_user = $request->get('id_user');
        $role    = $request->get('role');
        $data    = [];
        $FilterStatus = $request->get('FilterStatus');
        $countData = 0;
        $totalFiltered = 0;

        $query = "SELECT task.id_task, m_category_task.category, task.task, task.status, task.description, task.created_at, task.updated_at, users.name 
            FROM `task` 
            LEFT JOIN m_category_task ON m_category_task.id_category = task.id_category 
            LEFT JOIN users ON users.id = task.id_user 
            WHERE 1
        ";

        if ($role != 'admin') {
            $query .= "AND task.id_user = " . $id_user;
        } 

        if($FilterStatus){                    
            for ($i=0; $i < count($FilterStatus); $i++) { 
                if($i == 0){
                    $query .= " AND ";
                }

                $query .= " task.status = '". $FilterStatus[$i]. "'";
                
                if($i != count($FilterStatus)-1){
                    $query .= " OR ";
                }                
            }
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
                $nestedData['created_by']   = $dat->name;
                $nestedData['updated_at']   = $dat->updated_at;
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

    public function api_task_create(Request $request)
    {
        $id_user     = $request->get('id_user');
        $task        = $request->get('task');
        $description = $request->get('description');
        $id_category = $request->get('id_category');
        $status      = $request->get('status');

        $data = [
            'id_user' => $id_user,
            'task'      => $task,
            'description' => $description,
            'id_category' => $id_category,
            'status' => $status,
            'created_at' => $this->datetime,
            'updated_at' => $this->datetime,
        ];

        MyData::insertData('task', $data);

        return redirect(route('task'));
    }

    public function api_task_detail(Request $request)
    {
        $id_task    = $request->get('id_task');
        $query      = "SELECT task.*, users.email, users.name, m_category_task.category
            FROM task 
            LEFT JOIN m_category_task ON m_category_task.id_category = task.id_category 
            LEFT JOIN users ON users.id = task.id_user
            WHERE task.id_task = " . $id_task . " LIMIT 1";

        $getData = MyData::getCustomQuerying($query);

        if ($getData) {
            $response = array(
                'data' => $getData,
                'error' => false,
                'message' => 'Data Success',
            );
        } else {
            $response = array(
                'error' => true,
                'message' => 'Not Found !',
            );
        }

        return $response;
    }

    public function api_task_update(Request $request)
    {
        $id_task     = $request->get('id_task');
        $id_user     = $request->get('id_user');
        $task        = $request->get('task');
        $description = $request->get('description');
        $id_category = $request->get('id_category');
        $status      = $request->get('status');

        $data = [
            'id_user'       => $id_user,
            'task'          => $task,
            'description'   => $description,
            'id_category'   => $id_category,
            'status'        => $status,
            'updated_at'    => $this->datetime,
        ];

        $getData = MyData::updateData('task', ['id_task' => $id_task], $data);

        return redirect(route('task'));
    }

    public function api_task_delete(Request $request)
    {
        $id_task     = $request->get('id_task');
        MyData::deleteData('task', ['id_task' => $id_task]);

        $response = array(
            'error' => false,
            'message' => 'Delete Success',
        );
        return $response;
    }
}
