@isset($book)
<table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
<tbody>
<tr>
<th>Customer</th>
<td>{{$book->customer->customer_name}}<br>+91{{$book->customer->phone}}<br>{{$book->No_people}} Guests
</td>
</tr>
<tr>
<th>Theater / Pkg</th>
<td align="left"><span>@if($book->package != null) {{ $book->package->package_name ?? '' }}
@else {{ $book->theatre->name ?? 'NA' }} Theatre
<span> {{$book->decoration->name ?? 'No'}} </span> Decor
@endif</span>{{$book->theatre->branchs->branch_name ?? '-'}} Branch
</td>
</tr>

<tr>
<th>Amount</th>
<td align="left">Advance: &#8377; {{$book->payment->amount ?? 0}}
Base price: &#8377; @if($book->package != null) {{ $book->package->package_amount ?? '' }} @else {{ $book->theatre->price ?? '' }} @endif
</td>
</tr>
<tr>
<th>Service</th>
<td align="left">{{$book->decoration->name ?? ''}}
@if($book->your_name != null){{$book->decoration->person1}} :{{$book->your_name}}<br>@endif
@if($book->partner_name != null){{$book->decoration->person1  ?? ''}} :{{$book->partner_name}}<br>@endif
Cake:{{$book->cake->cakename ?? ''}}<br>Name on Cake:{{$book->name_on_cake ?? ''}}
</td>
</tr>

<tr>
<th>Add On</th>
<td align="left">@isset($book->addons)
@foreach($book->addons as $add)
{{$add->addon->name}} @if($loop->iteration > 1 && $loop->iteration < count($book->addons)), @endif
@endforeach
@endisset
</td>
</tr>
<tr>
<th>Booking</th>
<td align="left"><a href="https://partyadda.com/backend/public/admin/booking/invoice/{{$book ->id}}" target="_blank" rel="noopener noreferrer">({{$book ->id}})</a> On {{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d')}}
by: {{$book->payment_confirmed_by?? 'Online'}}</td>
</tr>

<tr>
<th>WebSite Blocked Slot</th>
<td align="left">{{$book->date}}, {{$book->slot->name}}</td>
</tr>

@if(isset($book->pre_booking_remarks))
<tr>
    <td colspan="2">Pre Booking Remarks:{{ $book->pre_booking_remarks }}</td>
</tr>
@endif


</tbody>
</table>
@endisset