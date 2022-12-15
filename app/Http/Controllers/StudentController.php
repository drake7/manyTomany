<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Bring in the model
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Carbon\Carbon;

class StudentController extends Controller {
    
    public function list()  {
        $viewData = array();
        $viewData['title'] = "List of students.";

        //Call my model and bring me all the students
        $viewData['students'] = Student::all();

        return view('student.list')
            ->with('viewData', $viewData);
    }

    public function single($id)   {
    
        //Get the proper student from the Model
        $student = Student::findorFail($id);

        //Get a list of courses
        $courses = Course::all();

        //Get a list of enrollmts
        $enrollments = DB::table('enrollments')
            ->select('courses.name','enrollments.id')
            ->join('courses', 'courses.id','=','enrollments.courses_id')
            ->where('students_id',$student->id)->get();

        //Get a list of enrollments

        $viewData = array();
        $viewData["title"]  = $student->first_name . ' ' . $student->last_name;
        $viewData["student"] = $student;
        $viewData["courses"] = $courses;
        $viewData["enrollments"] = $enrollments;

        return view('student.show')
            ->with('viewData',$viewData);
    }
    public function edit($id) {

        //Get the proper student from the Model
        $student = Student::findorFail($id);

        $viewData = array();
        $viewData["title"]  = 'Edit Form'. $student->first_name . ' ' . $student->last_name;
        $viewData["student"] = $student;

        return view('student.edit')
        ->with('viewData',$viewData);

    }

    public function create(Request $formData)    {
        //Validation
        $formData->validate([
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'email' => 'required|email:rfc', //Email RFC and DNS validation
            'dob' => 'required|date|before_or_equal:18 years ago|after_or_equal:100 years ago',
            'number' => 'required',
        ],['dob.between' => 'You must be at least 18 years old or 100 years young.', //Fix the validation message otherwise it wont make sense to the user.
           'email.required' => 'Without an email address you cannot sign up to use the internet!',
           'number.required' => 'Is a student without a number really a student?']); 

        $ns = new Student();
        $ns->first_name = $formData->input('first_name');
        $ns->last_name = $formData->input('last_name');
        $ns->email = $formData->input('email');
        $ns->dob = $formData->input('dob');
        $ns->number = $formData->input('number');
        $ns->save();
        return back();

    }    

public function  update(Request $formData, $id) {
    $us =  Student::findorFail($id);
    $us->first_name = $formData->input('first_name');
    $us->last_name = $formData->input('last_name');
    $us->email = $formData->input('email');
    $us->dob = $formData->input('dob');
    $us->number = $formData->input('number');
        
    $us->save();
        return redirect()->route('student.list');
}

    public function delete($id) {
        Student::destroy($id);
        return back();
    }


}

?>