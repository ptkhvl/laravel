<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Data;
use Validator;

class DataController extends BaseController
{
    public function index()
    {
        $data = Data::all();
        return $this->sendResponse($data->toArray(), 'Datas retrieved successfully.');
        
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'ip_address' => 'required',
            'date' => 'required',
            'car' => 'required',
            'car_vin' => 'required',
            'car_year' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $data = Data::create($input);
        return $this->sendResponse($data->toArray(), 'Info created successfully.');
    }
    public function show($id)
    {
        $data = Data::find($id);
        if (is_null($data)) {
            return $this->sendError('Info not found.');
        }
        return $this->sendResponse($data->toArray(), 'Info retrieved successfully.');
    }
    public function update(Request $request, Data $data)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'ip_address' => 'required',
            'date' => 'required',
            'car' => 'required',
            'car_vin' => 'required',
            'car_year' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $data->first_name = $input['first_name'];
        $data->last_name = $input['last_name'];
        $data->email = $input['email'];
        $data->gender = $input['gender'];
        $data->ip_address = $input['ip_address'];
        $data->date = $input['date'];
        $data->car = $input['car'];
        $data->car_vin = $input['car_vin'];
        $data->car_year = $input['car_year'];
        $data->save();
        return $this->sendResponse($data->toArray(), 'Info updated successfully.');
    }

    public function destroy(Data $data)
    {
        $data->delete();
        return $this->sendResponse($data->toArray(), 'Info deleted successfully.');
    }
}
