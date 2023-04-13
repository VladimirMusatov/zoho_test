<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function DealForm()
    {

        return view('deal-form');

    }

    public function DealStore(Request $request)
    {

        $request->validate([
            'Deal_Name' => ['required', 'string'],
            'Stage' => ['required', 'string'],
        ]);


        $array = ['Deal_Name' => $request->Deal_Name , 'Stage' => $request->Stage];

        $status = ApiController::CreateDeal($array);

        if($status == 'success'){

            return redirect()->back()->with('message','Deal created successfully');

        }

        return redirect()->back()->with('message', "Something wrong");

    }

    public function AccountForm()
    {
        return view('account-form');
    }

    public function AccountStore(Request $request)
    {

        $request->validate([
            'Account_Name' => ['required', 'string'],
            'Account_website' => ['url'],
        ]);

        $array = ['Account_Name' => $request->Account_Name, 'Phone' => $request->Account_phone, 'Website' => $request->Account_website];

        $responce = ApiController::CreateAccount($array);

        $status = $responce->data[0]->status;

        if($status == 'error'){

            $message = $responce->data[0]->message;

            return redirect()->back()->with('message', $message);
        }

        return redirect()->back()->with('message', $status);

    }

}
