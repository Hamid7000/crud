<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\employee;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function graph() {
        return view('admin.graph');
    }

    public function index_() {
        $employees = Employee::orderby('id','ASC')->paginate(5);
        return view('admin.master',['employees' => $employees]);
    }
   
    public function index(){
    
        $employees = Employee::orderby('id','ASC')->paginate(5);

    
    
        return view('admin.list',['employees' => $employees]);
    }
    public function create() {
        return view('admin.create');
    }

    public function store(request $request) {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'address' => 'nullable',
            'image' => 'sometimes|image:gif,pngnjpeg,jpg'
        ]);

        if ($validator->passes()) {
            // save data here

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->save();


            //upload image here
            if (isset($request->image)) {
                $ext = $request->image->extension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);   // this will save file in a folder
                
                //this will save image in database
                $employee->image = $newFileName;
                $employee->save();
            }

            // $request->session()->flash('success', 'Employee Added Successfully');

            return redirect()->route('employees.index')->with('success', 'Employee Added Successfully');
        } else {
            // return with errors
            return redirect()->route('employees.create')->witherrors($validator)->withInput();
        }
    }

    public function edit($id) {

        $employee = Employee::findorfail($id);
       
        return view('admin.edit',['employee' => $employee]);
    }

    public function update($id, Request $request) {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'address' => 'nullable',
            'image' => 'sometimes|image:gif,pngnjpeg,jpg'
        ]);

        if ($validator->passes()) {
            // save data here

            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->save();


            //upload image here
            if (isset($request->image)) {

                $oldImage = $employee->image;

                $ext = $request->image->extension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);   // this will save file in a folder
                
                //this will save image in database
                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path().'/uploads/employees/'.$oldImage);
            }

            $request->session()->flash('success', 'Employee Added Successfully');

            return redirect()->route('employees.index');
        } else {
            // return with errors
            return redirect()->route('employees.edit',$id)->witherrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request) {
        $employee = Employee::findorfail($id);
        File::delete(public_path().'/uploads/employees/'.$employee->image);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee Deleted   Successfully');

    }

   
}
