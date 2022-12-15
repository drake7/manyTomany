<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;

class EnrollmentController extends Controller {


    //Create

    public function create(Request $formData) {

    $en = new Enrollment();
    $en->courses_id = $formData->input("courses_id");
    $en->students_id = $formData->input("students_id");


    $en->save();

    //Send user back to where they came from
    return back();

    }

    //Delete
    public function delete($id)    {
        Enrollment::destroy($id);
        return back();

    }
}