<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Frontend\NewsletterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    //

    public function index() {
        return view('frontend.newsletter.index');
    }


    public function store(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $item = new NewsletterModel();

        $item->email = $input['email'];

        $item->save();

        return redirect('/newsletter');
    }
}
