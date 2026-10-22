  @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
<td class="fs-8">
            {{-- @if(($book->booking_status ?? 0) == 1) --}}
            @if(isset($book->payment) && Helper::isPaymentStatusSuccess($book->payment->status ?? 0))
            <a target="_blank" href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C

%0A%0AWe%20are%20happy%20to%20confirm%20your%20booking%20.
%0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-M-d') ?? 'NA'}}
%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}
%0A*Event%20Date*%20%3A%20{{$book->date ?? 'NA'}}
%0A
@if(isset($book->new_starttime))
(Start Time: {{$book->new_starttime}} -EndTime: {{$book->new_endttime}})
@else
{{$book->slot->name ?? 'NA'}}
@endif

%0A*%20{{$book->package->package_name ?? ''}}

%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'NA'}}

%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}
%0A* _After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_

%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}

@if(isset($book->partner_name)) %0A *{{$book->decoration->person1}}* %3A%20 {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A *{{$book->decoration->person2}}* %3A%20 {{$book->your_name}} @endif

%0A*Cake Amount%20*%20%3A%20{{$book->cake_amount + $book->cake_extra_amount}}


%0A%0A*Addons%20%3A*%0A 

@foreach($book->addons as $add){{$add->addon->name ?? 'NA'}}@if(($add->amount ?? 0) > 0)({{$add->amount}})@endif,  @endforeach

%0A%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount??'NA'}}
%0A @if(isset($book->pre_booking_remarks)) %0A _Remarks_%3A%20 {{$book->pre_booking_remarks}} @endif

%0A%0A*Thanks*
%0APartyAdda%20Team
%0Ahttps://wa.me/p/24894710386893450/918217575597 %0A " type="submit"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp"
              id="whatsapp" value="Send WhatsApp">
              <span>Custmr</span>
            </a>
        
        
        <a target="_blank" href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C

%0A%0AWe%20would%20like%20to%20remind%20your%20booking%20.
%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}
%0A*Event%20Date*%20%3A%20{{$book->date ?? 'NA'}}
%0A
@if(isset($book->new_starttime))
(Start Time: {{$book->new_starttime}} -EndTime: {{$book->new_endttime}})
@else
{{$book->slot->name ?? 'NA'}}
@endif

%0A*%20{{$book->package->package_name ?? ''}}

%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'NA'}}

%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}
%0A* _After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_

%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}


%0A%0A*Addons%20%3A*%0A 

@foreach($book->addons as $add){{$add->addon->name ?? 'NA'}}@if(($add->amount ?? 0) > 0)({{$add->amount}})@endif,  @endforeach

%0A%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount??'NA'}}
%0A @if(isset($book->pre_booking_remarks)) %0A _Remarks_%3A%20 {{$book->pre_booking_remarks}} @endif

%0A%0A*Thanks*
%0APartyAdda%20Team
%0Ahttps://wa.me/p/24894710386893450/918217575597 %0A " type="submit"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp"
              id="whatsapp" value="Send WhatsApp">
              <span>FollowUp on the Day </span>
            </a>
        
            
            
            @else
            <a target="_blank" href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
%0A%0AWe%20have%20noticed%20your%20interest%20in%20celebrating
%20{{$book->decoration->name ?? ''}}%20event%20
on%20{{$book->date ?? ' '}}%20at%20our%20{{$book->theatre->name ?? 'a'}}%20Theatre.
.%20but%20the%20booking%20was%20not%20completed...%20No%20worries%21%20%F0%9F%98%80
%0A%0ALet%20us%20know%20if%20you%20need%20any%20assistance%20to%20proceed!
%0A%0A*Thanks*
%0APartyAdda%20Team" type="submit" class="btn btn-sm btn-outline-dark rounded-pill padding:-5px; border border-success" style="background-color: orange; "
              name="whatsapp" id="whatsapp" value="Send WhatsApp">
              <span>Follow</span>
            </a>
            @endif
            <!-- Admin -->
            <a target="_blank" 
            href="https://wa.me/91{{$book->theatre->branchs->contactnumber ?? ''}}?text=
*{{$book->customer->customer_name ?? 'Customer'}}*%20booking's%20details.
%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}%20
*on*%20%3A%20{{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('Y-M-d') ?? 'NA'}}
%0A*From*:
@if(isset($book->new_starttime))
{{$book->new_starttime}} to {{$book->new_endttime}}
@else
{{$book->slot->name ?? 'NA'}}
@endif

%0A*Package|Theatre*%20%3A%20%20{{$book->package->package_name ?? $book->theatre->name}}
%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}

@if(isset($book->package)) 
%0A_After {{$book->package->people_allowed}} people, every person is charged {{$book->package->extra_person_charge}}_
@else
%0A_After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_
@endif

@if(isset($book->pre_booking_remarks)) %0A _Remarks_%3A%20 {{$book->pre_booking_remarks}} @endif

@if(isset($book->partner_name)) %0A*{{$book->decoration->person1}}* %3A%20 {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A*{{$book->decoration->person2}}* %3A%20 {{$book->your_name}} @endif

%0A*Cake Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Msg*%20%3A%20{{$book->name_on_cake ?? 'NA'}}
%0A @if(($book->cake_amount ?? 0 ) > 0)*Price*%20%3A%20{{$book->cake_amount}} @endif
%0A @if(($book->cake_extra_amount ?? 0 ) > 0)*ExtraAmount*%20%3A%20{{$book->cake_extra_amount}} @endif

@if(isset($book->addons))
%0A*Addons*%0A @foreach($book->addons as $add)@if(($add->amount ?? 0) > 0){{$add->addon->name ??'NA'}}({{$add->amount}})@endif @endforeach
@endif

%0A*Amount*%20%3A%20{{$book->package->package_amount  ??$book->theatre->price}}
%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount ?? 'NA'}}

%0A*Booking%20({{$book->id}}) by%3A%20{{$book->payment_confirmed_by?? 'Online'}} on*  
%0A%20%3A%20{{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-M-d') ?? 'NA'}}
" 
class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp" id="whatsapp"
              value="Send WhatsApp" style="margin-top: 2px;">
              <span>Admin</span>
            </a>
            @if(Helper::isSlotsEligibleForCancel($book->date." ".$book->slot->start_time, $book->booking_status ?? 0))
            <a href="{{ route('admin.booking.edit.cancel', ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) &&$isDashboard == 1 ) ? 1 : 2]) }}"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
              style="margin-top: 2px;">
              <span>Cancel</span>
            </a>
            @endif
<!--"No Show"-->
            @if(Helper::isEligibleForNoShow($book->date." ".$book->slot->start_time, $book->booking_status ?? 0))
            <form action="{{ route('admin.booking.no_show', ['booking_id' => $book->id ]) }}" id="form_no_show"
              method="POST" onsubmit="return confirm('Are you sure you want to mark as no show ?');">
              @csrf
              <input type="hidden" name="booking_id" value="{{ $book->id }}" />
              <input type="submit" value="No Show"
                class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
                style="margin-top: 2px;" />
            </form>
            @endif
            @if(Helper::isEligibleForEdit($book->date." ".$book->slot->start_time, $book->booking_status ?? 0))
            <a href="{{ route('admin.booking.edit', ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) &&$isDashboard == 1 ) ? 1 : 2]) }}"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
              style="margin-top: 2px;">
              <span>Edit</span>
            </a>
            @endif
            @if(Helper::isEligibleForBilling($book->created_at, $book->date." ".$book->slot->start_time, $book->booking_status ?? 0))
            <a href="{{ route('admin.booking.billing.edit', ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) &&$isDashboard == 1 ) ? 1 : 2]) }}"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
              style="margin-top: 2px;">
                <i class="bi bi-receipt" style="font-size:14px;"></i><span>Bill</span></a>
            @endif
            @if(Helper::isEligibleForBilling($book->created_at, $book->date." ".$book->slot->start_time, $book->booking_status ?? 0))
            <a href="{{ route('admin.booking.billing.collect.amount', 
            ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) &&$isDashboard == 1 ) ? 1 : 2]) }}"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
              style="margin-top: 2px;"><i class="bi bi-qr-code" style="font-size:14px;"></i><span>Pay</span></a>
            @endif
            @if(Helper::isEligibleForRefundInitiate($book->booking_status ?? 0))
            <a href="{{ route('admin.booking.refund.initiate', ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) && $isDashboard == 1 ) ? 1 : 2]) }}"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
              style="margin-top: 2px;">
              <span class="text-nowrap">Start Refund</span>
            </a>
            @endif
            @if(Helper::isEligibleForRefundComplete($book->booking_status ?? 0))
            <form action="{{ route('admin.booking.refund.complete', ['booking_id' => $book->id ]) }}" id="form_refund_complete"
              method="POST" onsubmit="return confirm('Are you sure you want to mark as refund complete ?');">
              @csrf
              <input type="hidden" name="booking_id" value="{{ $book->id }}" />
              <input type="submit" value="Complete Refund"
                class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0"
                style="margin-top: 2px;" />
            </form>
            @endif
            @if(isset($isDashboard) && $isDashboard == 1)
            @endif
        <!--
        <button type="submit" class="btn btn-primary" name="services" id="services" value="Services"><i class="bi bi-files"></i> Manage Order</button><br><br>
        -->
        <!--
        <button type="submit" class="btn btn-warning" name="suspend" id="suspend" value="Suspend"><i class="bi bi-hand-thumbs-down"></i> Manage Refund</button> 
        -->
</td>
          