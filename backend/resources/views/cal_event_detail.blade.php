@isset($book)
<table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
<tbody>
<tr>
<th>Customer</th>
<td>{{$book->customer->customer_name}}<br>
{{$book->customer->email}}<br>
+91{{$book->customer->phone}}<br>
+{{$book->No_people}} Guests
</td>
</tr>
<tr>
<th>Theater</th>
<td align="left"> {{$book->theatre->name ?? '-'}}, {{$book->theatre->branchs->branch_name ?? '-'}}
</td>
</tr>
<tr>
<th>Booking On</th>
<td align="left"><b>{{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d')}}</b>
</td>
</tr>
<tr>
<th>Show On</th>
<td align="left"><b>{{$book->date}}</b>, <b>{{$book->slot->name}}</b></td>
</tr>
<tr>
<th>Amount</th>
<td align="left"><b>Advance: &#8377; {{$book->payment->amount ?? 0}}</b><br><b>Balance: &#8377; {{$book->final_price}}</b>
</td>
</tr>
<tr>
<th>Service</th>
<td align="left"><b>{{$book->decoration->name ?? ''}}</b><br>
@if($book->your_name != null)
{{$book->decoration->person1}} :{{$book->your_name}}<br>
@endif
@if($book->partner_name != null){{$book->decoration->person1  ?? ''}} :{{$book->partner_name}}<br>
@endif
<b>Cake:</b> {{$book->cake->cakename ?? ''}}<br>
<b>Name on Cake:</b> {{$book->name_on_cake ?? ''}}
</td>
</tr>
<tr>
<th>Payment Status</th>
<td align="left">@if(($book->booking_status ?? 0) == 1)
<b class="color:green;">{{$book->payment_status ?? ''}}</b>
@else<b class="color:red;">
{{ $book->payment_status ?? ''}}</b>
@endif
</td>
</tr>
<tr>
<th>Add On</th>
<td align="left">@isset($book->addons)
@foreach($book->addons as $add)
{{$add->addon->name}}
@if($loop->iteration > 1 && $loop->iteration < count($book->addons))
,
@endif
@endforeach
@endisset
</td>
</tr>
</tbody>
</table>
@endisset