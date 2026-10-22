<!DOCTYPE html>
<html lang="en">
<head>
  <title>Party Adda | Booking Confirmation</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <style>
    body {
      background: rgb(238, 235, 235);
    }
    page {
      background: white;
      display: block;
      margin: 0 auto;
      margin-bottom: 0.5cm;
      box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
      width: 21cm;
      height: auto;
      /* 29.7cm; */
      min-height: 29.7cm;
    }

    page[size="A4"][layout="landscape"] {
      width: 29.7cm;
      height: 21cm;
    }

    page[size="A3"] {
      width: 29.7cm;
      height: 42cm;
    }

    page[size="A3"][layout="landscape"] {
      width: 42cm;
      height: 29.7cm;
    }

    page[size="A5"] {
      width: 14.8cm;
      height: 26cm;
    }

    page[size="A5"][layout="landscape"] {
      width: 21cm;
      height: 14.8cm;
    }

    @media print {
      #print_form {
        padding: 0px;
      }

      body,
      page {
        background: white;
        margin: 0px;
        padding: 0px;
        box-shadow: 0 0 0 #FFFFFF;
      }
    }

    #print_form {
      padding: 16px;
    }
    body {
      font-family: Roboto;
      font-size: 10pt;
    }

    p {
      margin: 0pt;
    }

    table.items {
      border: 0.1mm solid #e7e7e7;
    }

    td {
      vertical-align: top;
    }

    .items td {
      border-left: 0.1mm solid #e7e7e7;
      border-right: 0.1mm solid #e7e7e7;
    }

    table thead td {
      text-align: center;
      border: 0.1mm solid #e7e7e7;
    }

    .items td.blanktotal {
      background-color: #EEEEEE;
      border: 0.1mm solid #e7e7e7;
      background-color: #FFFFFF;
      border: 0mm none #e7e7e7;
      border-top: 0.1mm solid #e7e7e7;
      border-right: 0.1mm solid #e7e7e7;
    }

    .items td.totals {
      text-align: right;
      border: 0.1mm solid #e7e7e7;
    }

    .items td.cost {
      text-align: "." center;
    }

    #logo img {
      float: left;
      margin-right: 16px;
    }
  </style>
</head>

<body>
  <page size="A5">
    <div id="print_form">
      <table width="100%" style="border: 1px solid #e7e7e7; border-radius:5px; font-family: Roboto; font-size: 16px ;" cellpadding="10">
        <tr>
          <td width="100%" style="padding: 0px; line-height: 22px">
            <div id="logo">
              <p>
                <img src="https://partyadda.com/public/assets/img/logo.png" style="width: 10%; max-width: 120px;" />
              </p>
              <h2 style="text-align: center; font-size: 20px; font-weight: bold; padding: 0; margin: 0;">
                Party Adda</h2>
                <span style="text-align: left; font-size: 16px; font-weight: bold; padding: 0px;">Booking Details</span>
                </div>
          </td>
          <td>
              <span style="display: block; width: 100%; text-align: right; font-size: 12px; font-weight: bold; padding: 0;">
                9845740260 8217575597
            </span>
          </td>
        </tr>
      </table>
      </br>
      
      <table width="100%" style="font-family: Roboto; border: 0.1mm solid #e7e7e7; border-radius:2px" cellpadding="10">
        @php
        $startTime = date('h:i a', strtotime($booking->new_starttime ?? $booking->slot->start_time));
        $endTime = date('h:i a', strtotime($booking->new_endttime ??$booking->slot->end_time));
        @endphp
        <tr style="padding: 2px 7px; line-height: 20px;">
          <td width="20%" style="padding: 2px 7px; line-height: 20px;">Theatre Name</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $booking->theatre->name }} <br /></td>
          <td style="padding: 2px 7px; line-height: 20px;">Booking #</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->id }} </td>
        </tr>

        <tr style="padding: 2px 7px; line-height: 20px;">
          <td style="padding: 2px 7px; line-height: 20px;">Slot Date</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{date('d M, Y',strtotime($booking->date))}}<br /></td>
               
          <td width="23%" style="padding: 2px 7px; line-height: 20px;">Booking Person:</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $booking->customer->customer_name }}</td>
        </tr>

        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Slot Timing</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $startTime }} - {{ $endTime }}<br/></td>
          <td style="padding: 2px 7px; line-height: 20px;">Contact</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $booking->customer->phone }}</td>
        </tr>
        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Occassion</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $booking->decoration->name ?? '' }}<br/></td>
          <td style="padding: 2px 7px; line-height: 20px;">Booking Date</td>
          <td style="padding: 2px 7px; line-height: 20px;"> @php
            $dateFormatted = date('d M, Y', strtotime($booking->created_at));
            @endphp
            {{ $dateFormatted }}
          </td>
        </tr>
        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Name on Cake</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->name_on_cake}}</td>
          <td style="padding: 2px 7px; line-height: 20px;">Guests</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->No_people}}</td>
        </tr>
        {{-- 
        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Name on Cake</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->name_on_cake}}<br />
          </td>
          <td>Guests</td>
          <td>{{$booking->No_people}}</td>
        </tr> 
        --}}
      </table>
      <div style="margin-top: 8px;"><strong>Booking Details</strong></div>
      <table class="items" width="100%" style="font-size: 12px; border: 0.1mm solid #e7e7e7; border-radius:2px; margin-top: 8px;" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <td width="3%" style="text-align: center;"><strong>#</strong></td>
            <td width="70%" style="text-align: left;"><strong>Detail</strong></td>
            <td width="15%" style="text-align: left;"><strong>Amount</strong></td>
          </tr>
        </thead>
        <tbody>
          @php($sl_no=1)
          <!-- ITEMS HERE -->
          <tr>
            <td style="padding: 2px 2px; line-height: 20px; text-align: center;" width=3%>{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;" width=87%>
              @if($is_package)
              {{ $booking->package->package_name ?? '' }} Package  
              @else
              {{ $booking->theatre->name }} Theatre
              @endif
            </td>
            <td style="padding: 2px 7px; line-height: 20px;" width=15%>
              ₹ {{ $amountData->base_amount ?? '' }}
              {{-- @if($is_package)
              ₹ {{ $booking->package->package_amount ?? '' }}
              @else
              ₹ {{ $booking->theatre->price ?? '' }}
              @endif --}}
            </td>
          </tr>

          @if($amountData->extra_person_amount > 0)
          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px; text-align: center;">{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              Extra Person ({{ ($booking->No_people - $amountData->persons_allowed) }} 
              * {{$amountData->extra_person_price }})
          </td>
            <td style="padding: 2px 7px; line-height: 20px;">
              ₹ {{ $amountData->extra_person_amount ?? '' }}
            </td>
          </tr>
          @endif

          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px; text-align: center;">{{ $sl_no }}</td>
            @if($is_package)
            <td style="padding: 2px 7px; line-height: 20px;">Ballon Decoration</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              ₹ 0
              @else
            <td style="padding: 2px 7px; line-height: 20px;">Ballon Decoration</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($booking->decoration_id != NULL)
              @if($booking->theatre->decoration_included == 1 )
              Free
              @else
              ₹ {{ $amountData->decoration_amount ?? '' }}
              @endif
              @else
              -
              @endif
              @endif
            </td>
          </tr>

          @if($amountData->cake_amount > 0 || (isset($booking->cake_id) && $booking->cake_id != NULL && $booking->cake_id > 0) )
          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px; text-align: center;">{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              {{$booking->cake?->cakename ?? '-'}} Cake
              @if($booking->cake_extra_amount ?? 0 > 0)
              <br/>
              <small>Customized Cake Charge</small>
              @endif
            </td>
            <td style="padding: 2px 7px; line-height: 20px;">
              ₹ {{ $amountData->cake_amount }}
              {{-- 
              @if($is_package)
              ₹ {{ $booking->cake_extra_amount ?? '' }}
              @else
              ₹ {{ $branch_cake->price ?? '' }}
              @endif 
              --}}
              @if($booking->cake_extra_amount ?? 0 > 0)
                <br/>
                ₹ {{ $booking->cake_extra_amount }}
              @endif
            </td>
          </tr>
          @endif

          @if(isset($booking->addons) && count($booking->addons) > 0)
            @php($sl_no++)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px; text-align: center;">{{ $sl_no }}</td>
              <td style="padding: 2px 7px; line-height: 20px;"><strong>AddOns</strong></td>
              <td style="padding: 2px 7px; line-height: 20px;"><strong>₹ {{ $amountData->billing->addon_total_amount ?? '' }}</strong></td>
            </tr>
            @foreach ($booking->addons as $addon)
            @if($addon->amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">{{ $addon->addon->name ?? '' }}</td>
              <td style="padding: 2px 7px; line-height: 20px;">{{ $addon->amount ?? '' }}</td>
            </tr>
            @endif
            @endforeach
            @if(isset($addOnsWithZeroAmount) && count($addOnsWithZeroAmount) > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">{{ implode(', ', $addOnsWithZeroAmount) }}</td>
              <td style="padding: 2px 7px; line-height: 20px;">0</td>
            </tr>
            @endif
          @endif


          @if($amountData->isOtherBillingExist)
            @php($sl_no++)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px; text-align: center;">{{ $sl_no }}</td>
              <td style="padding: 2px 7px; line-height: 20px;"><strong> Other Billing Details</strong></td>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
            </tr>
            @if($amountData->billing->extra_person_amount_overloaded > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Extra Persons Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->extra_person_amount_overloaded }}</td>
            </tr>
            @endif
            @if($amountData->billing->extra_time_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Extra Time Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->extra_time_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->upgrade_charge_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Upgrade Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->upgrade_charge_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->cold_drink_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Cold Drink ({{ $amountData->billing->cold_drink_qty }} * {{ $amountData->billing->cold_drink_unit_price }})</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->cold_drink_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->water_bottle_250_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Water Bottle 250ml ({{ $amountData->billing->water_bottle_250_qty }} * {{ $amountData->billing->water_bottle_250_unit_price }})</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->water_bottle_250_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->water_bottle_500_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Water Bottle 500ml ({{ $amountData->billing->water_bottle_500_qty }} * {{ $amountData->billing->water_bottle_500_unit_price }})</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->water_bottle_500_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->water_bottle_1000_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Water Bottle 1000ml ({{ $amountData->billing->water_bottle_1000_qty }} * {{ $amountData->billing->water_bottle_1000_unit_price }})</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->water_bottle_1000_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->photo_print_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Photo Print Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->photo_print_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->cleaning_charge_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Cleaning Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->cleaning_charge_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->food_total_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Food</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->food_total_amount }}</td>
            </tr>
            @endif
            @if($amountData->billing->extra_charge_amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">Other Charge</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing->extra_charge_amount }}</td>
            </tr>
            @endif
          @endif

        </tbody>
      </table>
      
      <table width="100%" style="font-size: 14px; border: 1px solid #e7e7e7; border-radius:2px; margin-top: 8px;" cellpadding="10" cellspacing="0">
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;"  colspan="3">Sub Amount</td>
          <td style="padding: 2px 7px; line-height: 20px;" width=15%>₹ {{ $amountData->sub_total }} </td>
        </tr>
        
        @if($amountData->discount_amount > 0)
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;"  colspan="3">Discount
           @if($amountData->discount_amount > 0)
             <small>(Coupon - {{ $booking->promocode ?? '' }} )</small>
           @endif
          </td>
          <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->discount_amount ?? 0 }}</td>
        </tr>
         @endif

        @if($amountData->short_duration_discount_amount > 0)
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;"  colspan="3"><strong>Short Duration Discount</strong></td>
          <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->short_duration_discount_amount }}</td>
        </tr>
        @endif
        
        @if($amountData->billing?->special_discount_amount > 0)
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;"  colspan="3"><strong>Spl Discount</strong></td>
          <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $amountData->billing?->special_discount_amount }}</td>
        </tr>
        @endif
        
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;" colspan="3">Total</td>
          <td style="padding: 2px 7px; line-height: 20px;">₹ <strong>{{ $amountData->total }}</strong></td>
        </tr>
        
        <tr>
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;" colspan="3"><span style="color: green;">Adv Paid</span></td>
          <td style="padding: 2px 7px; line-height: 20px;"><span style="color: green;">₹ {{ $booking->payment->amount }}</span></td>
        </tr>
        
        <tr>
           <td style="padding: 0px 0px; line-height: 2px;" colspan="3">
            <hr style="border: none; border-top: 1px dashed #e7e7e7;" >
           </td>
        </tr>
        
        <tr>
            @if($amountData->collected_amount > 0)
              <td style="padding: 2px 7px; line-height: 20px; text-align: right;" >Collected by {{ $booking->amount_confirmed_by }} 
              ({{ $booking->payment_reference }})</td>
              <td style="padding: 2px 7px; line-height: 20px;"><span style="color: blue;"> ₹<b> {{ $amountData->collected_amount }} </b></span></td>
            @endif
            
          <td style="padding: 2px 7px; line-height: 20px; text-align: right;">
            Balance</td>
          <td style="padding: 2px 7px; line-height: 20px; font-size: 16px">
          <strong style="color: orange;">₹ {{ $amountData->balance_amount }}</strong>
          </td>
        </tr>
        
         <tr>
           <td style="padding: 0px 0px; line-height: 2px;" colspan="3">
            <hr style="border: none; border-top: 1px dashed #e7e7e7;" >
           </td>
        </tr>
      </table>

      {{-- <table width="100%" style="font-family: Roboto; font-size: 12px; margin-top: 8px; border: 0.1mm solid #e7e7e7; border-radius:2px;">
        <tr>
          <td>
            <table style="font-family: Roboto; font-size: 12px;">
              <tr>
                <td width="35%" style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Total Amount</strong>
                </td>
                <td width="35%" style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Advance Paid</strong>
                </td>
                @if($amountData->discount_amount > 0)
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  Coupon<small>({{ $booking->promocode ?? '' }})</small>
                </td>
                @endif
              </tr>

              <tr>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  ₹ {{ $amountData->sub_total }}
                </td>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  - ₹ {{ $booking->payment->amount }}
                </td>
                @if($amountData->discount_amount > 0)
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;"> - ₹ {{ $amountData->discount_amount }}
                </td>
                @endif
              </tr>
            </table>
          </td>
        </tr>
      </table> --}}

 <table width="100%" style="border: 1px solid #e7e7e7; border-radius:5px; font-family: Roboto; font-size: 16px ;" cellpadding="10">
    <tr>
        <td width="50%">
            <div style="margin-top: 8px;"><strong>Notes :</strong></div>
            <!--  <span style="white-space:pre-wrap;">{{ $booking->pre_booking_remarks ?? '' }}</span>-->
             <span style="white-space:pre-wrap;">{{ $booking->remarks_or_notes ?? '' }}</span>
        </td>
    
    @if(isset($booking->payment_screenshot))
        <td>
            <a href="{{ env('APP_URL') }}{{ Storage::url($booking->payment_screenshot) }}" target="_blank">
            <img src="{{ env('APP_URL') }}{{ Storage::url($booking->payment_screenshot) }}" 
            title="{{$booking->payment_reference}}"
            alt="Screenshot" height="140px"  style="transform: rotate(90deg);" >
            </a>
        </td>
@endif
</tr>

</table>
      
      

    </div>
  </page>
  <script>
  //  window.print();
  </script>
</body>
</html>