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
		<div>
            <h4>Contact Information</h4>
            <span>Full Name:</span> {{ $name }}
            <br>
			<span>Email:</span> {!! $email !!}
		</div>
        <br>
		<div>
            <h4>Order Details</h4>
            <span>Urgency of this order:</span> {{$order_urgency}} <br>
            
            <?php 
                if($resale == 'resale') {
                    echo "<span>Type of Order:</span>Resale <br>";
                    echo "<span>Purchaser of This Order:</span> $if_resale <br>";
                    echo "<span>Customer of:</span> $if_resale_customer <br>";
                    if($if_resale_value != "") {
                        echo "<span>Resale value:</span> $if_resale_value <br>";
                    }
                } else if($resale == 'expense') {
                    echo "<span>Type of order:</span>Expense <br>";    
                    echo "<span>Internal Company:</span> $if_expense <br>";            
                } else {
                    echo "Type of order (expense or resale) is not known. <br>";
                }
            ?>
            
            <span>Purpose of Order:</span> {{$purpose}} <br>
            <span>Preferred Order Date:</span> {{$order_date}} <br>
            
            <?php 
                if($approver == 'unapproved') {
                    echo "This item is unapproved and should be approved by $if_unapproved. <br>";
                } else {
                    echo "This item has been approved by $approver. <br>";
                }
            ?> 
            <br>
            <h4>Item Details</h4>
            
            <span>Number of Items:</span> {{$num_items}} <br>
            
            <?php 
                // echo var_dump($items);
                $orig_index = 4;
                for($i=0;$i<$num_items;$i++) {
                    echo "<div><p><h4>Item #" . ($i + 1) . "</h4>";
                    echo "<span>Already Purchased?</span> " . $items['items_' . $orig_index] . "<br>";
                    echo "<span>Links to item(s) needed:</span> " . $items['items_' . strval($orig_index + 1)] . "<br>";
                    echo "<span>Quantity:</span> " . $items['items_' . strval($orig_index + 2)] . "<br>";                    
                    echo "</p></div>";
                    $orig_index += 3;
                }
            ?>
            
		</div>
		<br>
		<footer>
            &copy; BlueWire Computer Services Inc.
		</footer>
	</body>
</html>