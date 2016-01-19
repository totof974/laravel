<?php

//commentaire dl depuis laravel jusqu'a ma maison


namespace App\Http\Controllers;

/*
 * Class MainController
 * @package App\Http\Controllers
 * Sufficé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Product;

class MainController extends Controller
{
    public function essai()
    {
        return view('testcode',[
            "firstname"=>"totof"
        ]);
    }

    public function tableau()
    {
        $products = [
            [
                "id" => 1,
                "title" => "Mon premier produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 10
            ],
            [
                "id" => 2,
                "title" => "Mon deuxième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 20
            ],
            [
                "id" => 3,
                "title" => "Mon troisième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 30
            ],
            [
                "id" => 4,
                "title" => "",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 410
            ],
        ];


        return view("fichiertab",["bladeproduct"=>$products]);

    }


    public function team()
    {
        $equipes = [
            [
                "id" => 1,
                "firstname" => "Marc",
                "lastname" => "Toto",
                "chef" => true,
                "description" => "Lorem ipsum",
                "statut" => "chef",
                "image" => "chef.jpg"
            ],
            [
                "id" => 2,
                "firstname" => "Jean",
                "lastname" => "Michel",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "graphiste",
                "image" => "graphiste.jpg"
            ],
            [
                "id" => 3,
                "firstname" => "Martine",
                "lastname" => "a la plage",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "developeur",
                "image" => "developpeur.jpg"
            ],
        ];

        return view("myteam",["teamblade"=>$equipes]);
    }


    public function info($age)
    {
        dump($age);
        die;
    }

    public function contact(Request $request)

    {
        if($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(),
                [
                    'userName' => 'required | min:2',
                    'userEmail' => 'required | email' ,
                    'userPhone' => 'required | numeric',
                    'userMsg' => 'required | max:1000',
                ],
                [
                    'userName.required' => 'Attention le champ nom est vide',
                    'required' => 'Attention le champ est vide',
                ]);



            if ($validator->fails())
            {
                return redirect()->route('route_contact')
                                ->withInput()
                                ->withErrors($validator);
            }



            Mail::send(['emails.contact-email', 'emails.contact-email-text'], ["data" => $request->all()], function ($message) {
                $message->from('c.bour974@gmail.com');
                $message->subject("Formulaire de contact");
                $message->to('c.bour974@gmail.com');
            });

            return redirect()->route('route_contact')->with('successContact', 'Votre email a bien été envoyé');
        }

        return view('contactB'); //contactB.blade.php



    }


    public function home()
    {
        $products = Product::all();
        dump($products);

        return view('accueil'); // accueil.blade.php
    }


    public function feed(Request $request)
    {

        if($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(),
                [
                    'page' => 'required|url',
                    'bug' => 'required',
                    'firstname' => 'required' ,
                    'lastname' => 'required',
                    'email' => 'required|email',
                    'message' => 'required',
                    "screenshot" => "image"

                ],
                [
                    'message.required' => 'Expliquez nous le problème pour qu\'il soit corrigé',
                    'required' => 'Attention le champ est vide',
                ]);



            if ($validator->fails())
            {
                return redirect()->route('go_back')
                    ->withInput()
                    ->withErrors($validator);
            }

            $nameScreenshot = false;

            if($request->hasFile('screenshot'))
            {
                $image = $request->file('screenshot');
                $destinationScreenshot = public_path().'/uploads/feedback';
                $nameScreenshot = str_random(15).'.'.$image->getClientOriginalExtension();

                $image->move($destinationScreenshot, $nameScreenshot);

            }

            Mail::send(['emails.feedback-email', 'emails.feedback-email-text'], ["data" =>
            $request->all()], function ($message) use ($nameScreenshot) {
                $message->from('c.bour974@gmail.com');
                $message->subject("Rapport de satisfaction");
                $message->to('c.bour974@gmail.com');
                if ($nameScreenshot) {
                    $message->attach(asset("/uploads/feedback/".$nameScreenshot) );
                }
            });

            return redirect()->route('go_back')->with('successFeedback', 'Merci pour votre retour');
        }


        return view('feedback'); // feedback.blade.php
    }
}