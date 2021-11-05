<?php 
namespace App\Http\Controllers;

use App\User;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class UserController extends Controller{
   /**
     * Create a new controller for User.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //แสดงข้อมูลทั้งหมด
    public function getAll()
    {
        $data = User:: all();
        return $this->responseSuccess($data);
    }

    //แสดงข้อมูลสินค้าทั้งหมด
    public function getproduct()
    {
        $data = Product:: all();
        return $this->responseSuccess($data);
    }

    //แสดงข้อมูลจากid
    public function getID($id)
    {
        $data = User::Where('id',$id)->first();
        return $this->responseSuccess($data);
    }

    // แสดงข้อมูลจากชื่อ
    public function getName($name)
    {
        $data = User::Where('name',$name)->first();
        return $this->responseSuccess($data);
    }

    // เพิ่มข้อมูลลง database
    public function addData(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->tel = $request->tel;

        if ($data->save()) {
            return $this->responseSuccess($data);
        }
    }

    // เพิ่มข้อมูลลง database
    public function addDataproduct(Request $request)
    {
        $data = new Product();
        $data->productname = $request->productname;
        $data->productcategory = $request->productcategory;
        $data->productdetail = $request->productdetail;

        if ($data->save()) {
            return $this->responseSuccess($data);
        }
    }

    // แก้ไขข้อมูล
    public function updateData(Request $request, $id){
        $data = User::where('id', $id)->first();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->tel = $request->tel;
        if ($data->save()) {
           return $this->responseSuccess($data);
        }
    }
    
    // ลบข้อมูล
    public function deleteData($id)
    {
        $data = User::Where('id',$id)->delete();
        return $this->responseSuccess($data);
    }

    protected function responseSuccess($res)
    {
        return response()->json(["status" => "success", "data" => $res], 200)
            ->header("Access-Control-Allow-Origin", "*")
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
    }
}
?>