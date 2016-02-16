@extends('app')

@section('content')


<div class="content">
  <div class="center column">
    <h1>Order Processing Form</h1>
    <hr>
    <div class="form">
      {!! Form::open(['url' => 'submit']) !!}
      <!--<form action="submit.php" method="post">-->
          <label for="full_name"><span>*</span>Full Name</label>
          <input type="text" name="full_name" id="full_name" required="required">
          <br/>
          <label for="email"><span>*</span>Email Address</label>
          <input type="text" name="email" id="email" required="required">
          <br/>
          <label for="order_urgency"><span>*</span>Urgency of This Order</label>
          <select name="order_urgency" id="order_urgency" required="required">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
          </select>
          
          <hr>
          <h2>Item Details</h2>
          <label for="already_purchased"><span>*</span>Already Purchased?</label>
          <select name="already_purchased" id="already_purchased" required="required">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
          <br/>
          <label for="item_link"><span>*</span>Link to Item(s) You Need To Purchase (Enter multiple links for the same item if you want someone to price check with shipping)</label>
          <br/>
          <textarea rows="3" name="item_link" id="item_link" required="required"></textarea>
          <br/>
          <label for="quantity"><span>*</span>Quantity (Digits Only)</label>
          <input name="quantity" id="quantity" size="3" onkeypress="return validate(event)" required="required">
          
          <div>
            <h3>Add or Remove an Item
                <img src="img/add.png" class="item_list" id="add" alt="">
                <img src="img/minus.png" class="item_list" id="minus" alt="">                
            </h3>
          </div>
          
          <div id="added_items">
          </div>
          
          <hr>
          <label for="resale"><span>*</span>Is this an expense or for resale?</label>
          <select name="resale" id="resale">
            <option value="donotknow">Don't Know</option>
            <option value="expense">Expense</option>
            <option value="resale">Resale</option>
          </select>
          <br/>
          <div class="tabbed">
            <label for="if_expense">If this is an expense, which internal company?</label>
            <select name="if_expense" id="if_expense" disabled>
                <option value=""></option>
                <option value="ZipTel">ZipTel</option>
                <option value="BlueWire">BlueWire</option>
            </select>
            <br/>
            <label for="if_resale">If this is for resale, who are we selling it to?</label>
            <input type="text" name="if_resale" id="if_resale" disabled>
            <br/>
            <div class="tabbed">
                <label for="if_resale_customer">Is the customer above a ZipTel customer or a BlueWire customer?</label>
                <select name="if_resale_customer" id="if_resale_customer" disabled>
                    <option value=""></option>                
                    <option value="ZipTel">ZipTel</option>
                    <option value="BlueWire">BlueWire</option>
                </select>
            </div>
          </div>
          <label for="purpose"><span>*</span>Describe the project or purpose of this purchase</label>
          <textarea rows="3" name="purpose" id="purpose" required='required'></textarea>
          <br/>
          <label for="order_date"><span>*</span>When do you need this? Enter an ideal and latest date</label>
          <input type="text" name="order_date" id="order_date" required='required'>
          <br/>
          <label for="approver"><span>*</span>Who approved this purchase?</label>
          <select name="approver" id="approver" required='required'>
            <option value="unapproved">Not yet approved</option>
            <option value="Robin">Robin</option>
            <option value="Kevin">Kevin</option>
          </select>
          <label for="if_unapproved">If unapproved, who should be the approver?</label>
          <select name="if_unapproved" id="if_unapproved">
            <option value=""></option>
            <option value="Robin">Robin</option>
            <option value="Kevin">Kevin</option>
          </select>
          <br/>
          <input type="hidden" name="num_items" id="num_items" value="1">
          <div class="center submit">
              <input type="submit" name="submit" value="Submit">
          </div>
      <!--</form>-->
      {!! Form::close() !!}
    </div>
  </div>
</div>
    

@endsection