<!--Customer message option not required if the slot is completed 
Admin should be able to cancel the booking and not limited with the 72 hours clause
-->
<div class="table-responsive">
  @if(isset($isMailTemplate) && $isMailTemplate == 1)
  <div><b>Booking Details From - {{ $dateRange ?? '' }}</b></div>
  <table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0"
    cellpadding="3" width="100%">
    @else
    <table id="myTable" border="3" style="auto" class="table table-striped table-responsive table-sm">
      @endif
      <thead>
        <tr>
          <th width="1%">#</th>
          <th width="10%">Person</th>
          <th width="8%">DateDetails</th>
          <th>__Theatre__Package___</th>
          <th width="9%">EventDeta</th>
          <th width="11%">AddOns</th>
          <th width="8%">Amount...</th>
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <th>ActionSeq</th>
          @endif
        </tr>
      </thead>
      <tbody class="fs-6">
        @foreach($booking as $book)
   
        <tr>
        <td>{{ $loop->iteration }}</td>
          <!--Person Starts-->
          <td  style="margin-left: -24px;">
            <span>
              {{$book->customer->customer_name ?? ''}}
              </br>
              <a href="Https://wa.me/+91{{$book->customer->phone ?? ''}}">
                {{$book->customer->phone ?? ''}}
              </a>
              <br>
              <span class="fs-8">
              <div id="table-sparkline-1">
                #ppl: {{$book->No_people}}
                </span>
                </br>
                  <a href="https://partyadda.com/backend/public/admin/booking/invoice/{{$book ->id}}" target="_blank" rel="noopener noreferrer">({{$book ->id}})</a>
              </div>
                @if(($book->booking_status ?? 0) == Helper::BOOKING_STATUS_CANCEL)
                  <span class="text-bg-danger">Cancelled
                  </span>
                  @endif
                  @if(($book->booking_status ?? 0) == Helper::BOOKING_STATUS_RE_SCHEDULED)
                  <span class="text-bg-info">Re-Scheduled</span>
                  @endif
                  @if(($book->booking_status ?? 0) == Helper::BOOKING_STATUS_NO_SHOW)
                  <span class="text-bg-warning" >No Show
                  </span>
                  @endif
                  @if(($book->booking_status ?? 0) == Helper::BOOKING_STATUS_REFUND_INIT)
                  <span class="text-bg-info" >Refund Initiated
                  </span>
                  @endif
                  @if(($book->booking_status ?? 0) == Helper::BOOKING_STATUS_REFUND_COMPLETE)
                  <span class="text-bg-info">Refund Complete(&#8377;{{ $book->refund_amount ?? '-'}})</span>
                  @endif
                  @if(isset($book->discountid))
                  <span class="text-bg-warning">{{$book->promocode}}</span>
                  @endif
              </span>
          </td>
          <!--Person Ends -->
          
          <!--Date Details Starts -->
        <td>
            {{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('d M, D')}}
            @if(isset($book->new_starttime))
                </br> <span class="text-success">{{$book->new_starttime}} - {{$book-> new_endttime}}</span>
            @else
                 <br><span  class="text-nowrap">{{$book->slot->name}}</span>
            @endif
            <br> <span class="fs-8">On:
            {{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('d-M-y')}}
            </br>
            @if(isset($book->payment_confirmed_by))
                  {{$book->payment_confirmed_by}} @else Online @endif 
            </span>
          </td>
          <!--Date Details Ends -->
                <!--Theatre Starts -->
          <td>
            <span>
            @if($book->package != null)
                {{ $book->package->package_name ?? '' }}<br>
            @else
                {{ $book->theatre->name ?? 'NA' }} ({{$book->decoration->name ?? 'No'}}) Decor <br>
            @endif
            </span>
            @if(isset($book->pre_booking_remarks))
            (<span class="text-bg-info fs-8">{{$book->pre_booking_remarks}})
            </span>
            @endif
            
            @if(isset($book->billing?->drive_link))
            <br>
            <span class="text-bg-warning fs-8">
            <a href="https://drive.google.com/drive/u/3/folders/{{$book->billing?->drive_link}}" target="_blank" rel="noopener noreferrer">Check Photos</a>
            </span>
            @endif
          </td>
          <!--Theatre Ēnds -->
          <!--Event Starts -->
          <td>
            @if($book->cake != null)  
            <span class="text-nowrap">
            {{$book->cake->cakename ?? ''}} 
            </span></br>
            <span>Msg:</span> {{ $book->name_on_cake }}
            <br>
             @endif
            @if($book->partner_name != null)
            <span>{{$book->decoration->person1}}:</span>{{$book->partner_name}}
            <br>
            @endif
            @if($book->your_name != null)
            <span>{{$book->decoration->person2}}:</span>{{$book->your_name}}
            <br>
            </span>
            @endif
          </td>
          <!--Event Ends -->
            <td>
                @php
                $addontotalAmount = 0; 
                @endphp
                @foreach($book->addons as $add)
                    @if(($add->amount ?? 0) > 0)
                        <span style="display: none"> {{ $addontotalAmount = $addontotalAmount + $add->amount}}</span>
                        <span class="fs-8">{{$add->addon->name}}({{ $add->amount }})</span> </br>
                    @endif
                @endforeach
            
              @if(isset($book->payment_screenshot))
              
               <a href="{{ env('APP_URL') }}{{ Storage::url($book->payment_screenshot) }}" target="_blank">
                 <img src="{{ env('APP_URL') }}{{ Storage::url($book->payment_screenshot) }}" alt="Screenshot" width="90">
               </a>
               @endif
            
            </td>
             <td>
            @php
              $totalAmount = 0; 
              $advPaid = $book->payment?->amount ?? 0;
              if(($book->total_amount ?? 0 ) > 0) {
                $totalAmount = $book->total_amount + $book->billing_total_amount ?? 0;
              } else {
                $totalAmount = $book->final_price + $advPaid + $book->cake_extra_amount;
              }
              $balance = $totalAmount - $advPaid - ($book->discount_amount ?? 0) - ($book->billing?->special_discount_amount ?? 0) - ($book->billing_paid_amount ?? 0) - ($book->short_duration_discount_amount ?? 0);
              $caketotal = $book->cake_amount + $book->cake_extra_amount;
            @endphp
            <div id="table-sparkline-1">
            <span>Tot:</span>{{ $totalAmount }}</br>
            <span>Bas:</span>@if($book->package != null) {{ $book->package->package_amount ?? '' }} @else {{ $book->theatre->price ?? '' }} @endif
            </br>
            @if(($book->cake_amount ?? 0 ) > 0)
            <span>ckAt:</span> {{$book->cake_amount}}
            @endif
            @if(($book->cake_extra_amount ?? 0 ) > 0)
             <span>ckext:</span>{{ $book->cake_extra_amount }}
            @endif
            @if(($addontotalAmount ?? 0 ) > 0)
             <span>Addon:</span>{{ $addontotalAmount }}</br>
            @endif
             
              {{-- @if(($book->booking_status ?? 0) == 1) --}}
              @if(isset($book->payment) && Helper::isPaymentStatusSuccess($book->payment->status ?? 0))
              <span class="text-success">Adv: </span><span class="text-success">{{ $advPaid }} </span>
              @else
              <span class="text-danger">Adv Failed</span>
              @endif
              
               @if($book->billing_paid_amount != 0)
               </br>Paid: {{$book->billing_paid_amount}}
               @endif
               
              </br><span>Bal:</span>{{ $balance }}
              
          </td>
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <td class="fs-8">
            {{-- @if(($book->booking_status ?? 0) == 1) --}}
            @if(isset($book->payment) && Helper::isPaymentStatusSuccess($book->payment->status ?? 0))
            <a target="_blank" 
            href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=
Dear *{{$book->customer->customer_name ?? 'Customer'}}*%2C
%0A
%0AWe are pleased to confirm your booking.
%0AContact%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
%0A
%0AEvent:%20{{$book->decoration->name ?? 'NA'}} 
%0ADate:%20{{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('Y-M-d') ?? 'NA'}} 
%0ATime:%20 
@if(isset($book->new_starttime))
{{$book->new_starttime}} to {{$book->new_endttime}}
@else
{{$book->slot->name ?? 'NA'}}
@endif

%0ALocation: {{$book->theatre->branchs->branch_name ?? ''}} Branch
%0A
@if(isset($book->package)) 
    %0APackage: {{$book->package->package_name}} 
    %0AGuests: {{$book->No_people ?? 'NA'}}
    %0AExtra guests beyond {{ $book->package->people_allowed }} will be charged {{ $book->package->extra_person_charge }} each.
@else
    %0ATheatre: {{$book->theatre->name}}
    %0AGuests: {{$book->No_people ?? 'NA'}}
    %0AExtra guests beyond {{ $book->theatre->peopleallowed }} will be charged {{ $book->theatre->extra_person_price }} each.
@endif

%0A @if(isset($book->partner_name)) %0A{{$book->decoration->person1}} %3A {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A{{$book->decoration->person2}} %3A {{$book->your_name}} @endif
%0ACake Flavor: {{$book->cake->cakename ?? 'NA'}}
%0AMsg: {{$book->name_on_cake ?? 'NA'}}

@if(isset($book->addons))
%0AAddons:@foreach($book->addons as $add)@if(($add->amount ?? 0) > 0){{$add->addon->name ??'NA'}}({{$add->amount}})@endif @endforeach
@endif
%0A
%0ABase Price%20%3A%20{{$book->package->package_amount  ??$book->theatre->price}}
@if(($book->cake_amount ?? 0 ) > 0)%0A*CakePrice*%20%3A%20{{$book->cake_amount}} @endif
@if(($book->cake_extra_amount ?? 0 ) > 0)%0A*CakeExtraAmount*%20%3A%20{{$book->cake_extra_amount}} @endif
%0AAdvance%20Paid%20%3A%20₹{{$book->payment->amount ?? 'NA'}}
@if(isset($book->pre_booking_remarks)) %0A_Note_%3A{{$book->pre_booking_remarks}} %0A @endif

%0APlease review our terms: https://wa.me/p/24894710386893450/918217575597
%0A
%0AThanks
%0APartyAdda Team
%0ABookingId({{$book->id}})
%0ABranch Phone: +91{{$book->theatre->branchs->contactnumber ?? ''}}
%0ALocation: {{$book->theatre->branchs->gmap_loc ?? ''}}
" type="submit"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp"
              id="whatsapp" value="Send WhatsApp">
              <span>Custmr</span>
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
%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}} on {{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('Y-M-d') ?? 'NA'}}
@if(isset($book->new_starttime))
({{$book->new_starttime}} to {{$book->new_endttime}})
@else
({{$book->slot->name ?? 'NA'}})
@endif
@if(isset($book->package)) 
    %0A*Package* : {{$book->package->package_name}}
    %0A*People* : {{$book->No_people ?? 'NA'}}
    %0A_After {{$book->package->people_allowed}} people, every person is charged {{$book->package->extra_person_charge}}_
@else
    %0A*Theatre* : {{$book->theatre->name}}
    %0A*People* : {{$book->No_people ?? 'NA'}}
    %0A_After {{$book->theatre->peopleallowed}} people, every person is charged {{$book->theatre->extra_person_price}}_
@endif
@if(isset($book->pre_booking_remarks)) %0A_Remarks_%3A {{$book->pre_booking_remarks}} @endif
%0A @if(isset($book->partner_name)) %0A*{{$book->decoration->person1}}* %3A {{$book->partner_name}} @endif
@if(isset($book->your_name)) %0A*{{$book->decoration->person2}}* %3A {{$book->your_name}} @endif
%0A*Cake Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
%0A*Msg*%20%3A%20{{$book->name_on_cake ?? 'NA'}}
@if(isset($book->addons))
%0AAddons: @foreach($book->addons as $add)@if(($add->amount ?? 0) > 0){{$add->addon->name ??'NA'}}({{$add->amount}})@endif @endforeach
@endif
%0A%0A*Base Price*%20%3A%20{{$book->package->package_amount  ??$book->theatre->price}}
@if(($book->cake_amount ?? 0 ) > 0)%0A*CakePrice*%20%3A%20{{$book->cake_amount}} @endif
@if(($book->cake_extra_amount ?? 0 ) > 0)%0A*CakeExtraAmount*%20%3A%20{{$book->cake_extra_amount}} @endif
%0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount ?? 'NA'}}
%0A%0ABooking%20({{$book->id}}) by {{$book->payment_confirmed_by?? 'Online'}} on {{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-M-d') ?? 'NA'}}
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
        <a target="_blank" 
href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=
Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
%0A
%0AThis is a friendly reminder for your {{$book->decoration->name ?? 'NA'}} celebration of 
%0A{{$book->partner_name}} on {{$book->date ?? 'NA'}}
@if(isset($book->new_starttime))
({{$book->new_starttime}} - {{$book->new_endttime}})
@else
({{$book->slot->name ?? 'NA'}})
@endif
%0A{{$book->theatre->name ?? 'NA'}} Theatre, {{$book->theatre->branchs->branch_name ?? ''}} Branch 
%0AFor {{$book->No_people ?? 'NA'}} guests
@if(optional($book->cake)->id != 6)
 with {{ $book->cake->cakename ?? 'No' }} cake and message on cake as {{ $book->name_on_cake ?? 'NA' }}
@endif
@if((($book->cake_extra_amount ?? 0 ) + ($book->cake_amount ?? 0 )) > 0) and cake amount%20%3A%20{{(($book->cake_extra_amount ?? 0 ) + ($book->cake_amount ?? 0 ))}} @endif 
%0A
%0ARefer to our guidelines for a pleasant visit:https://wa.me/p/27978501191774263/918217575597
%0ABest regards,
%0A{{$book->theatre->branchs->branch_name ?? ''}}
%0ABranch phone: +91{{$book->theatre->branchs->contactnumber ?? ''}}
%0ALocation: {{$book->theatre->branchs->gmap_loc ?? ''}}
" type="submit"
              class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp"
              id="whatsapp" value="Send WhatsApp">
              <span>Reminder</span>
            </a>
            
            
            
            <a href="{{ route('admin.booking.edit', 
            ['booking_id' => $book->id, 'nav_type' => (isset($isDashboard) &&$isDashboard == 1 ) ? 1 : 2]) }}"
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
             
             
<a target="_blank" 
href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
%0A
%0AThanks for celebrating your {{$book->decoration->name ?? 'NA'}} with us on {{$book->date ?? 'NA'}} at our  {{$book->theatre->branchs->branch_name ?? ''}} Branch 
%0A
%0AHere’s your event photos link : https://drive.google.com/drive/folders/{{$book->billing?->drive_link}}
%0A
%0APlease download within 7 days, photos will be removed and link will expire after that.
%0ANeed help? Reply or call
%0A+91{{$book->theatre->branchs->contactnumber ?? ''}}
" type="submit"
class="btn btn-sm btn-outline-dark rounded-pill border border-success px-2 py-0" name="whatsapp"
id="whatsapp" value="Send WhatsApp">
<span>Drive Link</span>
</a>
              
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
          @endif
        </tr>
<!--        <tr>
          <td colspan="8">
                @if(isset($book->pre_booking_remarks))
            (<span class="text-bg-info">{{$book->pre_booking_remarks}})
            </span>
            @endif
          </td>
      </tr>   
      -->
        @endforeach
      </tbody>
    </table>
</div> <!-- /.table-responsive -->