@if(isset($isMailTemplate) && $isMailTemplate == 1)
<div class="table-responsive">

<br/>
	<div>
		<b>Booking Details From - {{ $dateRange ?? '' }}</b>
	</div>
	<br/>
	<table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
@else

<table id="myTable" style="margin:20px auto" class="table table-striped table-responsive table-sm">
@endif
<thead>
				<tr>
					<th>#</th>
					<th>package/Theatre</th>
					<th>BasePrice</th>
					<th>sub_total</th>
					<th>Cake</th>
					<th>Total</th>
					<th>Advance</th>
					<th>PaidTo</th>
					<th>Collected</th>
					<th>Amount</th>
					<th>Balance</th>
					<th>Addons</th>
					<th>Discount</th>
					<th>Food</th>
					<th>Cold Drink</th>
					<th>250 ml</th>
					<th>500 ml</th>
					<th>1l water</th>
					<th>Xtras</th>
					<th>promo </th>
				</tr>
			</thead>
			<tbody>
@php
$totalAmounts = 0; 

$AdvanceAmounts = 0; 
$CollectedAmounts = 0;
$DiscountAmounts = 0;
$pendingAmounts = 0;
$amountreciveds = 0;

@endphp

@foreach($booking->whereIn('booking_status', [1, 7] ) as $book)

@php
    $discountAmount = 0;
    
    $cakeAmount = $book->cake_amount + $book->cake_extra_amount ?? 0;
    $discountAmount = $book->discount_amount ?? 0;
    
    $totalExpAmount = $book->billing->comp_total_amount + $cakeAmount - $discountAmount;
    $advanceAmount =   $book->payment?->amount ?? 0;
    $collectedAmount = $book->billing_paid_amount; 
    
    $amountreceived = $advanceAmount + $collectedAmount;
    $pendingAmount = $totalExpAmount - $amountreceived;
    
     
    $AdvanceAmounts = $AdvanceAmounts + $advanceAmount; 
    $amountreciveds = $amountreciveds + $amountreceived;
    $CollectedAmounts = $CollectedAmounts + $collectedAmount;
    
    $DiscountAmounts = $DiscountAmounts + $discountAmount;
    $totalAmounts = $totalAmounts + $totalExpAmount;
    $pendingAmounts  = $pendingAmounts + $pendingAmount 
    
@endphp
<tr>
<td>
	<a href="https://partyadda.com/backend/public/admin/booking/invoice/{{$book ->id}}" target="_blank" rel="noopener noreferrer">({{$book ->id}})
</a>
{{ $loop->iteration }} 
</td>
					<td>
@if($book->package != null)
{{ $book->package->package_name ?? '' }} 
@else
{{ $book->theatre->name ?? 'NA' }} 
@endif
</td>
					<td>{{$book->billing->base_amount}}</td>
					<td>{{$book->billing->comp_total_amount}}</td>
					<td>{{$cakeAmount}}</td>
					<td>{{$totalExpAmount}}</td>
					<td>{{$advanceAmount}}</td>
					<td>{{$book->payment_reference}}</td>
					<td>{{$book->amount_confirmed_by}}</td>
					<td>{{$book->billing_paid_amount}}</td>
					<td>{{$pendingAmount}}</td>	
					<td>{{$book->billing->addon_total_amount}}</td>
					<td>{{$book->discount_amount + $book->billing->special_discount_amount ?? 0}}</td>
					<td>{{$book->billing-> food_total_amount}}</td>
					<td>{{$book->billing-> cold_drink_qty}}</td>
					<td>{{$book->billing-> water_bottle_250_qty}}</td>
					<td>{{$book->billing-> water_bottle_500_qty}}</td>
					<td>{{$book->billing-> water_bottle_1000_qty}}</td>
					<td>{{$book->billing-> extra_charge_amount}}</td>
@if(isset($isMailTemplate) && $isMailTemplate == 1)
@else
<td>{{$book->promocode ?? '' }}</td>
@endif
</tr>
@endforeach
</tbody>
		</table>

<table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
    <tr>
        <td>Advance Amount +</td>
        <td>Amount Collected =</td>
        <td>Amount received - </td>
        <td>Total Amounts =</td>
        <td>Pending Amount  </td>
        <td>Discount Amount  </td>
    </tr>
      <tr>
        <td>{{ $AdvanceAmounts }}</td>
        <td>{{  $CollectedAmounts }}</td>
        <td> {{  $amountreciveds }} </td>
        <td> {{   $totalAmounts }}</td>
        <td>{{ $pendingAmounts }}</td>
        <td> {{ $DiscountAmounts }} </td>
    </tr>
</table>
	</div>
	<!-- /.table-responsive -->