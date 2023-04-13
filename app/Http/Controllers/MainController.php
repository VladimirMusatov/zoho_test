<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

class MainController extends Controller
{
    public function index()
    {

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

    }

}
