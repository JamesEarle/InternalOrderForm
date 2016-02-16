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
        $int_keys = array_keys($input);
        
        // Default there is 15 elements in the form. Divide 3 - 4 results in 1 item 
        // and every time a new item is added, 3 more form elements are added
        $num_items = (count($input) / 3) - 4;
        
        // $resale = $input['resale'];
        
        // $details = [];
        
        $items = [
            'name'               => $input['full_name'],
            'email'              => $input['email'],
            'order_urgency'      => $input['order_urgency'],
            'resale'             => $input['resale'],
            'if_expense'         => $input['if_expense'],
            'if_resale'          => $input['if_resale'],
            'if_resale_customer' => $input['if_resale_customer'],
            'purpose'            => $input['purpose'],
            'order_date'         => $input['order_date'],
            'approver'           => $input['approver'],
            'if_unapproved'      => $input['if_unapproved']
        ];
        
        // Items in the list begin at $input index 4, because of elements before it in the form.
        $orig_index = 4;
        
        for($i=0;$i<$num_items;$i++) {
            array_push($items, $input[$int_keys[$orig_index]]);
            array_push($items, $input[$int_keys[$orig_index + 1]]);
            array_push($items, $input[$int_keys[$orig_index + 2]]);
            $orig_index += 3;
        }
        
        // foreach($input as $in) {
        //     array_push($details, $in);
        // }
                
        // array_push($details, $num_items);
        
        echo var_dump($items);        
        
        Mail::send('emails.order', $items, function($message) use ($input) {
                $message->to("j_earle@hotmail.com", "To JE");
                // $message->from($input['email'], $input['full_name']);
                $message->from("earle.jamest@gmail.com", "From JE");
                $message->subject("Order from " . $input['full_name']);
            });
        // echo var_dump($input), '<br><br>', (count($input) / 3);   
        return view('form'); 
    }
}
