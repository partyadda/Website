<div class="table-responsive">
  @if(isset($isMailTemplate) && $isMailTemplate == 1)
  <br />
  <div><b>Booking Details From - {{ $dateRange ?? '' }}</b></div>
  <br />
  <table border="1" 
  style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
    @else
    <table id="myTable" style="margin:20px auto" class="table table-striped table-responsive table-sm">
      @endif
      <thead>
        <tr>
          <th width="1%">#</th>
          <th width="20%">Booking Details</th>
          <th width="18%">Theatre Details</th>
          <th width="16%">Dates</th>
          <th width="12%">Amount</th>
          <th>Add-Ons</th>
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <th width="10%">Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach($booking as $book)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            {{$book->customer->customer_name ?? ''}}<br>
            <a href="Https://wa.me/+91{{$book->customer->phone ?? ''}}">
              {{$book->customer->phone ?? ''}}
            </a>
            <br>
            <div id="table-sparkline-1"> #Guests : {{$book->No_people}} |
              @if(isset($book->payment_confirmed_by))
              {{$book->payment_confirmed_by}}
              @else
              Web
              @endif
            </div>
          
            <a href="https://partyadda.com/backend/public/admin/booking/invoice/{{$book ->id}}" target="_blank" rel="noopener noreferrer">({{$book ->id}})</a>
            @if(isset($book->payment_screenshot))
            </br>
            <span class="fs-8 text-bg-info" style="padding-left: 6px; padding-right: 6px; border-radius: 4px">
              {{$book->payment_screenshot}}
            </span>
            @endif
            @if(isset($book->discountid))
            </br>
            DiscountCode: {{$book->discountid}}
            @endif
          </td>
          <td>
            @if($book->package != null)
            {{ $book->package->package_name ?? '' }} Package ({{ $book->package->package_amount ?? '' }})<br>
            @else
            {{ $book->theatre->name ?? 'NA' }} ({{ $book->theatre->price ?? '' }})<br>
            <span class="fs-8"> {{$book->decoration->name ?? 'No Decoration'}} </span><br>
            @endif
            <span class="fs-8"></span>{{$book->cake->cakename ?? ''}} ({{ $book->cake_extra_amount }})</br>
            <span class="fs-8">Msg:</span>{{ $book->name_on_cake }}
          </td>
          <td>
            <span class="fs-8">
              Slot Date:</span><br>{{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('d-M-y')}}
            <br>
            {{$book->slot->name}}
            @if(isset($book->new_starttime))
            </br>
            <span class="text-success">{{$book->new_starttime}} - {{$book-> new_endttime}}</span><br>
            @endif
            @if($book->partner_name != null)
            <span class="fs-8"> {{$book->decoration->person1}} :</span><br>{{$book->partner_name}}<br>
            @endif
            @if($book->your_name != null)
            <span class="fs-8"> {{$book->decoration->person2}} :</span><br>{{$book->your_name}}<br>
            @endif
          </td>
          <td>
            <div id="table-sparkline-1">
              Total : &#8377;{{$book->final_price+ $book->payment->amount ?? 0 }}<br>
              <span class="fs-8">
                @if(($book->booking_status ?? 0) == 1)
                <span class="text-success">{{ $book->payment_status ?? ''}}</span><br>
                Advance:&#8377;{{$book->payment->amount ?? 0}}
                @else
                <span class="text-danger">{{ $book->payment_status ?? ''}}</span>
                @endif
                <br>
                Balance: &#8377;{{$book->final_price}}<br>
              </span>
          </td>
          <td>
            @foreach($book->addons as $add)
            @if(($add->amount ?? 0) > 0)
            <span class="fs-8">
              {{$add->addon->name}}
              (<b>{{ $add->amount }}</b>) |
            </span>
            @endif
            @endforeach
          </td>
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <td>
                   @if(($book->booking_status ?? 0) == 1) 
              
            <a target="_blank"
              href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
%0A%0AWe%20are%20happy%20to%20confirm%20your%20booking%20.
%0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-M-d') ?? 'NA'}}
%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}
%0A*Event%20Date*%20%3A%20{{$book->date ?? 'NA'}}
@if(isset($book->new_starttime))
(Start Time : {{$book->new_starttime}}  - EndTime : {{$book->new_endttime}})
@else
{{$book->slot->name ?? 'NA'}}
@endif
%0A*%20{{$book->package->package_name ?? ''}}
%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'NA'}}
%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}
%0A* _After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_
%0A*Decoration*%20%3A%20Yes%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}
@if(isset($book->partner_name)) %0A *{{$book->decoration->person1}}* %3A%20 {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A *{{$book->decoration->person2}}* %3A%20 {{$book->your_name}} @endif
%0A%0A*Addons%20%3A*%0A 
@foreach($book->addons as $add){{$add->addon->name ?? 'NA'}}@if(($add->amount ?? 0) > 0)({{$add->amount}})@endif,  @endforeach
%0A%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount??'NA'}}
%0A @if(isset($book->payment_screenshot)) %0A _Remarks_%3A%20 {{$book->payment_screenshot}} @endif
%0A%0A*Thanks*
%0APartyAdda%20Team
%0Ahttps://wa.me/p/30352389044404733/918217575597 %0A "
              type="submit" class="btn btn-sm border border-success" name="whatsapp" id="whatsapp"
              value="Send WhatsApp">
              <span class="fs-8"><i class="bi bi-whatsapp"></i>Customer</span>
            </a>
                @else

<a target="_blank"
href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
%0A%0AWe%20have%20noticed%20your%20interest%20in%20celebrating
%20{{$book->decoration->name ?? ''}}%20event%20
on%20{{$book->date ?? ' '}}%20at%20our%20{{$book->theatre->name ?? 'a'}}%20Theatre.
.%20but%20the%20booking%20was%20not%20completed...%20No%20worries%21%20%F0%9F%98%80
%0A%0ALet%20us%20know%20if%20you%20need%20any%20assistance%20to%20proceed!
%0A%0A*Thanks*
%0APartyAdda%20Team"
type="submit" class="btn btn-sm border border-success" name="whatsapp" id="whatsapp"
value="Send WhatsApp">
<span class="fs-8" style="background-color: orange; "><i class="bi bi-whatsapp"></i> Follow up </span>
</a>
            @endif
            
            
            <!-- Admin -->
            <a target="_blank"
              href="https://wa.me/91{{$book->theatre->branchs->contactnumber ?? ''}}?text=*{{$book->customer->customer_name ?? 'Customer'}}*%20booking's%20details.

%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}%20
%0A*Event%20Date*%20%3A%20{{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('Y-M-d') ?? 'NA'}}
@if(isset($book->new_starttime))
%20(Start: {{$book->new_starttime}}  - End: {{$book->new_endttime}})
@else %20{{$book->slot->name ?? 'NA'}} @endif
 @if(isset($book->payment_screenshot)) %0A _Remarks_%3A%20 {{$book->payment_screenshot}} @endif
%0A*Package|Theatre*%20%3A%20%20{{$book->package->package_name ?? $book->theatre->name}}
%0A*Amount*%20%3A%20%20{{$book->package->package_amount  ??$book->theatre->price}}
%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}
%0A_After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_
%0A*Decoration*%20%3A%20Yes
%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}
@if(isset($book->partner_name)) %0A*{{$book->decoration->person1}}* %3A%20 {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A*{{$book->decoration->person2}}* %3A%20 {{$book->your_name}} @endif
%0A*Addons*%0A @foreach($book->addons as $add)@if(($add->amount ?? 0) > 0){{$add->addon->name ??'NA'}}({{$add->amount}})|@endif @endforeach
%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount ?? 'NA'}}
%0A*BookingBy%3A%20{{$book->payment_confirmed_by?? 'Online'}} on*  
%0A*Booking%20Date*%20%3A%20{{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-M-d') ?? 'NA'}}
"
              class="btn btn-sm border border-success" name="whatsapp" id="whatsapp" value="Send WhatsApp" style="margin-top: 8px;">
              <span class="fs-8"><i class="bi bi-whatsapp"></i> Admin</span>
            </a>
            @if(($book->booking_status ?? 0) == 1)
            <a target="_blank" href="{{ route('admin.booking.invoice', ['booking_id' => $book->id]) }}"
              class="btn btn-sm border border-success" style="margin-top: 8px;">
              <span class="fs-8">Bkg_Confirm</span>
            </a>
            @endif
            <a href="{{ route('admin.booking.edit.remarks', ['booking_id' => $book->id]) }}"
              class="btn btn-sm border border-success" style="margin-top: 8px;">
              <span class="fs-8"><i class="bi bi-receipt"></i>Remarks</span>
            </a>
            @if(isset($isDashboard) && $isDashboard == 1)
            @endif
            <!--
<button type="submit" class="btn btn-primary" name="services" id="services" value="Services"><i class="bi bi-files"></i> Manage Order</button><br><br>
-->
            <!--
<button type="submit" class="btn btn-warning" name="suspend" id="suspend" value="Suspend"><i class="bi bi-hand-thumbs-down"></i> Manage Refund</button> 
-->
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
</div> <!-- /.table-responsive -->