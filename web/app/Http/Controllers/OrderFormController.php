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
        return view('form');
    }
    
    public function submit() 
    {   
        // Collect user input
        $input = Request::all();
        
        // $int_keys allows us to access $input using int indexes, 
        // instead of associative key indexes.
        $int_keys = array_keys($input);
        
        //echo var_dump($input);
        
        //echo "<br><br>";
        
        $detail = [
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
            'if_unapproved'      => $input['if_unapproved'],
            'num_items'          => $input['num_items']
        ];
        
        // Items in the list begin at $input index 4, 
        // because of elements before it in the form.
        $orig_index = 4;
        
        // Create an array of elements holding the variable number of items.
        $items = array(); 
        
        for($i=0;$i<$input['num_items'];$i++) {
            $items["items_" . strval($orig_index)] = $input[$int_keys[$orig_index]];
            $items["items_" . strval($orig_index + 1)] = $input[$int_keys[$orig_index + 1]];
            $items["items_" . strval($orig_index + 2)] = $input[$int_keys[$orig_index + 2]];
            $orig_index += 3;
        }
        
        // Append item details to the end of the detail array.
        $detail['items'] = $items;
               
        Mail::send('emails.order', $detail, function($message) use ($input) {
                // TODO: Replace TO with registered ZipTel address 
                // if priority is HIGH, cc Kevin and Robin.
                $message->to("j_earle@hotmail.com", "To JE");
                $message->from($input['email'], $input['full_name']);
                $message->subject("Order from " . $input['full_name']);
            });

        return redirect('/');
    }
}
