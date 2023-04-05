<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
  public function index()
  {
    $students = DB::select('select * from students');
    return view('index', ['students' => $students]);
  }

  public function showAdd()
  {
    return view('create');
  }

  public function addStudent(Request $request)
  {
    $student = new Student;
    $student->student_id = $request->student_id;
    $student->class = $request->class;
    $student->name = $request->name;
    $student->birthday = $request->birthday;
    $student->gender = $request->gender;
    $student->phone = $request->phone;
    $student->email = $request->email;
    $student->save();
    $request->session()->flash('success', '生徒を追加しました!');
    return view('create');
  }

  public function editStudent(Request $request)
  {
    $id = $request->input('id');
    $student = Student::find($id);
    return view('edit', ['student' => $student]);
  }

  public function updateStudent(Request $request)
  {
    $id = $request->input('id');
    $student = Student::findOrFail($id);
    $student->student_id = $request->input('student_id');
    $student->class = $request->input('class');
    $student->name = $request->input('name');
    $student->birthday = $request->input('birthday');
    $student->gender = $request->input('gender');
    $student->phone = $request->input('phone');
    $student->email = $request->input('email');
    $student->save();
    return redirect('/');
  }
  
  public function deleteStudent(Request $request)
  {
    $id = $request->input('id');
    DB::delete('delete from students where id =(?) ', [$id]);  
    return redirect('/');
  }

  public function filterStudent(Request $request)
  {
    $filter_by = $request->input('filter_by');
    $content = $request->input('content');
    if ($filter_by == 'name') {
      $students = Student::where('name', 'like', '%' . $content . '%')->get();
    } else if ($filter_by == 'class') {
      $students = Student::where('class', 'like', '%' . $content . '%')->get();
    } else {
      $students = Student::where('gender', 'like', '%' . $content . '%')->get();
    }
    return view('index', ['students' => $students]);
    return redirect('/');
  }

  public function searchStudent(Request $request)
  {
    $keyword = $request->input('keyword');
    $students = Student::where('student_id', 'like', '%' . $keyword . '%')
      ->orWhere('class', 'like', '%' . $keyword . '%')
      ->orWhere('name', 'like', '%' . $keyword . '%')
      ->orWhere('birthday', 'like', '%' . $keyword . '%')
      ->orWhere('gender', 'like', '%' . $keyword . '%')
      ->orWhere('phone', 'like', '%' . $keyword . '%')
      ->orWhere('email', 'like', '%' . $keyword . '%')
      ->get();
      $hasResult = count($students) > 0;
    return view('index', ['students' => $students, 'keyword' => $keyword, 'hasResult' => $hasResult]);
   }
}