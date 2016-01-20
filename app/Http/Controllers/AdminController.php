<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function cat_add(Request $request)
    {
        // Si je suis en POST
        // Validator
        // fail
        // Enregistrement en BDD
        // Message flash
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(),
                [
                    'InputT' => 'required',
                    'InputD' => 'required',
                    'InputP' => 'required',
                    'img' => 'image'
                ],
                [
                    'InputT.required' => 'Attention le champ titre est vide',
                    'InputD.required' => 'Attention la description est vide',
                    'InputP.required' => 'Attention le champ position est vide',

                ]
            );

            if ($validator->fails()) {
                return redirect()->route('route_cat_add')
                    ->withInput()
                    ->withErrors($validator);
            }



            $file = $request->file('img');
            $destinationFile = public_path() . '/uploads/categories';
            $nameFile = str_random(15) . '.' . $file->getClientOriginalExtension();

            $nouvelleCategorie = new Category();
            $nouvelleCategorie->name = $request->InputT;
            $nouvelleCategorie->description = $request->InputD;
            $nouvelleCategorie->position = $request->InputP;
            $nouvelleCategorie->image = $nameFile;

            $nouvelleCategorie->save(); // Fait l'enregistrement en BDD

            $file->move($destinationFile, $nameFile);


            return redirect()->route('route_cat_add')->with('success', 'Votre catégorie a bien été ajoutée');

        }

        return view('admin/ajout-cat');
    }



}