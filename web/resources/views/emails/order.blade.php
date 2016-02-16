<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
        <style>
            span {
                font-weight: bold;
            }
            
            h1, h2, h3, h4 {
                text-decoration: underline;
            }
        </style>    
	</head>
	<body>
		<h2>Order from {{ $name }}</h2>

		<div>
            <h4>Contact Information</h4>
            <span>Full Name:</span>{{ $name }}
            <br>
			<span>Email: </span>{!! $email !!}
		</div>
		<div>
            <h4>Order Details</h4>
            <span>Urgency of this order:</span> {{$order_urgency}} <br><br>
            
            <?php 
                if($resale == 'resale') {
                    echo "<span>Type of Order:</span>Resale <br><br>";
                    echo "<span>Purchaser of This Order:</span> $if_resale <br><br>";
                    echo "<span>Customer of:</span> $if_resale_customer <br><br>";
                } else if($resale == 'expense') {
                    echo "<span>Type of order:</span>Expense <br><br>";    
                    echo "<span>Internal Company:</span> $if_expense <br><br>";            
                } else {
                    echo "Type of order (expense or resale) is not known. <br><br>";
                }
            ?>
            
            <span>Purpose of Order: </span> {{$purpose}} <br><br>
            <span>Preferred Order Date: </span> {{$order_date}} <br><br>
            
            <?php 
                if($approver == 'unapproved') {
                    echo "This item is unapproved and should be approved by $if_unapproved. <br><br>";
                } else {
                    echo "This item has been approved by $approver. <br><br>";
                }
            ?> 
            <hr>
            
            <h4>Item Details</h4>
            
            <span>Nuber of Items:</span> {{$num_items}} <br><br>
            
            <span>Test Item Detail:</span> {{$items_4}} <br><br>
            
		</div>
		<hr>
		<br>
		<footer>
            &copy; BlueWire Computer Services Inc.
		</footer>
	</body>
</html>