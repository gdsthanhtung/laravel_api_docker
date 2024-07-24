<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $fnf = [
        'status' => false,
        'message' => 'Không tìm thấy dữ liệu',
        'data' => []
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductModel::all();
        $data = ProductResource::collection($products);
        $msg = [
            'status' => ($data) ? true : false,
            'message' => 'Danh sách sản phẩm',
            'data' => $data
        ];
        return response()->json($msg, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required'
        ]);
        if($validator->fails()){
            $msg = [
                'status' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'data' => $validator->errors()
            ];
        }else{
            $item = ProductModel::create($input);
            $msg = [
                'status' => true,
                'message' => 'Tạo thành công',
                'data' => new ProductResource($item)
            ];
        }
        return response()->json($msg, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = ProductModel::find($id);
        if(is_null($item)){
            $msg = $this->fnf;
        }else{
            $msg = [
                'status' => true,
                'message' => 'Thông tin chi tiết',
                'data' => new ProductResource($item)
            ];
        }
        return response()->json($msg, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required'
        ]);
        if($validator->fails()){
            $msg = [
                'status' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'data' => $validator->errors()
            ];
        }else{
            $item = ProductModel::find($id);
            if(is_null($item)){
                $msg = $this->fnf;
            }else{
                $item->name = $input['name'];
                $item->price = $input['price'];
                $item->save();
                $msg = [
                    'id' => $id,
                    'status' => true,
                    'message' => 'Cập nhật thành công',
                    'data' => new ProductResource($item)
                ];
            }
        }
        return response()->json($msg, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProductModel::find($id);
        if(is_null($item)){
            $msg = $this->fnf;
        }else{
            $item->delete();
            $msg = [
                'status' => true,
                'message' => 'Đã xoá dữ liệu',
                'data' => []
            ];
        }
        return response()->json($msg, 200);
    }
}
