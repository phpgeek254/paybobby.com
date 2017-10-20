<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
   
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required'
        ]);

        Faq::create($request->all());
        return redirect()->back()->withMessage('Record created successfully');
    }

   
    public function update(Request $request, Faq $faq)
    {

         $this->validate($request, [
            'title'=>'required',
            'content'=>'required'
        ]);

         $faq->update($request->all());
         return redirect()->back()->withMessage('Update Successful');
    }

 
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->withMessage('Record deleted');
    }
}
