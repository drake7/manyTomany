<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller {

    function index() {
    //Initialize View data
    $viewData = array();
    $viewData['Title'] = 'Course List';
    $viewData['courses'] = Course::all();

    return view('course.list')
        ->with("viewData",$viewData);
    }

    function add()  {
        $viewData = array();
        $viewData["title"] = "Add Course Form";
        return view('courses.add')
            ->with('viewData',$viewData);
    }
    function singleCourse($id)  {

        //Grab the course from the database
        $course = Course::findorFail($id);

        //Grab a list of students from the database
        $students = Student::all();

        //Grab a list of the enrollments for this course.
        $enrollments = DB::table('enrollments')
            ->select('students.number','students.first_name','students.last_name','enrollments.id')
            ->join('students','students.id','=','enrollments.students_id')
            ->where('enrollments.courses_id',$id)->get();

    //Initialize View data
    $viewData = array();
    $viewData['Title'] = $course->name . ' - '. $course["short_name"];
    $viewData['course'] = $course;
    $viewData['students'] = $students;
    $viewData['enrollments'] = $enrollments;

    return view('course.single')
        ->with('viewData',$viewData);
    }

    function edit($id)  {

        //Grab the course from the database
        $course = Course::findorFail($id);

        //Initialize View data
        $viewData = array();
        $viewData['title'] = 'Edit '.$course->name . ' - '. $course["short_name"];
        $viewData['course'] = $course;

        return view('course.edit')
            ->with('viewData',$viewData);
    }

    function delete($id)    {

        Course::destroy($id);
        return back();

    }

    function create(Request $postData)  {

        //Validate the post data sent via the form.
        //These values should be compatible with the database and with the business rules.

        $postData->validate([
                'name' => 'required|max:16',
                'short_name' => 'required|max:9',
                'description' => 'required',
                'seats' => 'required|int',
                'credits' => 'required|int|max:9',
                'last_approved' => 'required'
            ]);

        $nc = new Course();
        $nc->name = $postData->input('name');
        $nc->short_name = $postData->input('short_name');
        $nc->description = $postData->input('description');
        $nc->seats = $postData->input('seats');
        $nc->credits = $postData->input('credits');
        $nc->last_approved = $postData->input('last_approved');

        $nc->save();
        return back();

    }

    function update(Request $postData, $id)    {

        $nc = Course::findorFail($id);
        $nc->name = $postData->input('name');
        $nc->short_name = $postData->input('short_name');
        $nc->description = $postData->input('description');
        $nc->seats = $postData->input('seats');
        $nc->credits = $postData->input('credits');
        $nc->last_approved = $postData->input('last_approved');

        $nc->save();
        return redirect()->route('course.list');

    }

}
