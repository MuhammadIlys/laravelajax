<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    //
    public function students()
    {
        return view('students');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    public function stu(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | regex:/(0)[0-9]{9}/',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {

            $obj = new Student;
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;

            $obj->name = $name;
            $obj->email = $email;
            $obj->phone = $phone;
            $obj->save();
            

            return response()->json([
                'status' => 200,
                'message' => 'Student entered successfully',
            ]);
        }
    }

    public function fetch_students()
    {
        $data = Student::all();
        return response()->json([
            'studentsdata' => $data,
        ]);
    }

    public function edit_student($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'status' => '200',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'student' => 'Student Not Found'
            ]);
        }
    }


    public function update_student(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required | regex:/(0)[0-9]{9}/',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {

            $obj = Student::find($id);
            if ($obj) {
                $name = $request->name;
                $email = $request->email;
                $phone = $request->phone;

                $obj->name = $name;
                $obj->email = $email;
                $obj->phone = $phone;
                $obj->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Student updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'student' => 'Student Not Found'
                ]);
            }
        }
    }


    public function delete_student($id){
        
        
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' =>'Student deleted successfully'
        ]);
    }

    public function email(){
        $data = ['name'=>"Ilyas", 'email'=>'ily@gmail.com'];
        $user['to'] = 'ily@gmail.com';
        Mail::send('mail',$data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Testing email');
        });
    }

}
