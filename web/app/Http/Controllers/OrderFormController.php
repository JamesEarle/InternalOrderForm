<?php

namespace App\Http\Controllers;

use Mail;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderFormController extends Controller
{
    public function index() 
    {
        //    
        return view('form');
    }
    
    public function submit() 
    {
        $input = Request::all();
        
        // Default there is 15 elements in the form. Div 3 - 4 results in 1 item 
        // and every time a new item is added, 3 more form elements are added
        $num_items = (count($input) / 3) - 4;
        
        $details = [];
        
        foreach($input as $in) {
            array_push($details, $in);
        }
                
        array_push($details, $num_items);
        
        echo var_dump($details);        
        
        // Mail::send('emails.order', []);
        // echo var_dump($input), '<br><br>', (count($input) / 3);   
        return view('form'); 
    }
}
