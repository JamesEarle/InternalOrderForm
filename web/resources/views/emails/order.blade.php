<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
        <style>
            span {
                font-weight: bold;
                text-decoration:underline;
            }
        </style>    
	</head>
	<body>
		<h2>Order from {{ $name }}</h2>

		<div>
            <h4>Contact Information</h4>
            <span>Full Name: </span>{{ $name }}
			<span>Email:     </span>{!! $email !!}
		</div>
		<div>
            <table>
                <tr><td>Urgency of this order </td><td>{{$order_urgency}}</td></tr>
                
                <?php 
                    if($resale == 'resale') {
                        echo "<tr><td>This is a </td><td>Resale</td></tr>";
                        echo "<tr><td>Who are we selling this to?</td><td>$if_resale</td></tr>";
                        echo "<tr><td>Customer of </td><td>$if_resale_customer</td></tr>";
                    } else if($resale == 'expense') {
                        echo "<tr><td>This is an </td><td>Expense</td></tr>";    
                        echo "<tr><td>Internal Company</td><td>$if_expense</td></tr>";            
                    } else {
                        echo "<tr><td>Expense or resale is not known.</td></tr>";
                    }
                ?>
                
                <tr><td>Purpose of order </td><td>{{$purpose}}</td></tr>
                <tr><td>Preferred order date </td><td>{{$order_date}}</td></tr>   
                
                <?php 
                    if($approver == 'unapproved') {
                        echo "";
                    } else {
                        echo "";
                    }
                ?>                             
                
            </table>
			{{ $purpose }}
			{{ $order_date }}
			{{ $approver }}
			{{ $if_unapproved }}
		</div>
		</br>
		<div>
		</div>
		<br>
		<hr>
		<br>
		<footer>
            &copy; BlueWire Computer Services Inc.
		</footer>
	</body>
</html>