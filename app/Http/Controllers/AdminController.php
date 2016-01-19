<?php

namespace App\Http\Controllers;

use App\Category;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.admin');
    }

    public function cat()
    {
        $categories = Category::all();

        return view('admin/categories',[
            'cat_tab'=>$categories
        ]);

    }



}