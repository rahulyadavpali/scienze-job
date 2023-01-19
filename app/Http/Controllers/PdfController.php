<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Jobs;
use App\Employer;
use App\PDFSeeker;
use App\Jobseeker;
use App\Subcategory;
use App\Designation;
use App\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function jobseeker()
    {
        $user = Auth::user();
        $id = $user->data_id;
        $user_detail = Jobseeker::findOrFail($id);

        $category_one = Subcategory::findOrFail($user_detail->subcategories1);
        $cat_one = $category_one->title;

        $category_two = Subcategory::findOrFail($user_detail->subcategories2);
        $cat_two = $category_two->title;

        $category_three = Subcategory::findOrFail($user_detail->subcategories3);
        $cat_three = $category_three->title;

        $category_four = Subcategory::findOrFail($user_detail->subcategories4);
        $cat_four = $category_four->title;

        $category_five = Subcategory::findOrFail($user_detail->subcategories5);
        $cat_five = $category_five->title;

        $designation = Designation::findOrFail($user_detail->selection_job);
        $designation_title = $designation->title;

        $pdf = PDF::loadView('front.pdf.jobseeker', compact('user_detail', 'cat_one', 'cat_two', 'cat_three', 'cat_four', 'cat_five', 'designation_title'));

        $filename = "-".$id.".pdf";

        return $pdf->download('scienze-job-user-'.$id.'.pdf');
    }

}
