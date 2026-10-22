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
      height: 21cm;
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
      <table width="100%" style="border: 1px solid black; font-family: Roboto; font-size: 16px ;" cellpadding="10">
        <tr>
          <td width="100%" style="padding: 0px; line-height: 22px">
            <div id="logo">
              <p>
                <img src="https://partyadda.com/public/assets/img/logo.png" style="width: 15%; max-width: 150px;" />
              </p>
              <span style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">Party Adda</span>
              </br>
              <span style="text-align: right; font-size: 14px; font-weight: bold; padding: 0px;">Booking
                Confirmation</span>
              <p style="text-centre">9845740260 | 8217575597</p>
            </div>
          </td>
        </tr>
      </table>
      </br>
      <table width="100%" style="font-family: Roboto;border: 1px solid black; " cellpadding="10">
        @php
        $startTime = date('h:i a', strtotime($booking->new_starttime ?? $booking->slot->start_time));
        $endTime = date('h:i a', strtotime($booking->new_endttime ??$booking->slot->end_time));
        @endphp

        <tr style="padding: 2px 7px; line-height: 20px;">
          <td width="20%" style="padding: 2px 7px; line-height: 20px;">Theatre Name</td>
          <td style="padding: 2px 7px; line-height: 20px;"> <strong> {{ $booking->theatre->name }} </strong><br /></td>
          <td width="23%" style="padding: 2px 7px; line-height: 20px;">Booking Person:</td>
          <td style="padding: 2px 7px; line-height: 20px;"><strong> {{ $booking->customer->customer_name }} </strong>
          </td>
        </tr>
        <tr style="padding: 2px 7px; line-height: 20px;">
          <td style="padding: 2px 7px; line-height: 20px;">Slot Date</td>
          <td style="padding: 2px 7px; line-height: 20px;"><strong>{{date('d M, Y',
              strtotime($booking->date))}}</strong><br /></td>
          <td style="padding: 2px 7px; line-height: 20px;">Contact</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{ $booking->customer->phone }}</td>
        </tr>

        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Slot Timing</td>

          <td style="padding: 2px 7px; line-height: 20px;"><strong><strong>{{ $startTime }} - {{ $endTime }}
              </strong><br /></td>


          <td style="padding: 2px 7px; line-height: 20px;">Booking #</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->id }} </td>
        </tr>

        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Occassion</td>
          <td style="padding: 2px 7px; line-height: 20px;"><strong><strong>{{ $booking->decoration->name ?? '' }}
              </strong><br /></td>
          <td style="padding: 2px 7px; line-height: 20px;">Booking Date</td>
          <td style="padding: 2px 7px; line-height: 20px;"> @php
            $dateFormatted = date('d M, Y', strtotime($booking->created_at));
            @endphp
            {{ $dateFormatted }}
          </td>
        </tr>
        <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Name on Cake</td>
          <td style="padding: 2px 7px; line-height: 20px;"><strong><strong>{{$booking->name_on_cake}}</td>
          <td style="padding: 2px 7px; line-height: 20px;">Guests</td>
          <td style="padding: 2px 7px; line-height: 20px;">{{$booking->No_people}}</td>
        </tr>
        {{-- <tr>
          <td style="padding: 2px 7px; line-height: 20px;">Name on Cake</td>
          <td style="padding: 2px 7px; line-height: 20px;"> <strong><strong>{{$booking->name_on_cake}} </strong><br />
          </td>
          <td>Guests</td>
          <td>{{$booking->No_people}}</td>
        </tr> --}}
      </table>
      <br>
      <strong>Booking Details</strong>

      <table class="items" width="100%" style="font-size: 14px;border: 1px solid black;" cellpadding="10">
        <thead>
          <tr>
            <td width="5%" style="text-align: left;"><strong>#</strong></td>
            <td width="70%" style="text-align: left;"><strong>Detail</strong></td>
            <td width="15%" style="text-align: left;"><strong>Amount</strong></td>
          </tr>
        </thead>
        <tbody>
          @php($sl_no=1)

          <!-- ITEMS HERE -->
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($is_package)
              {{ $booking->package->package_name ?? '' }} Package
              @else
              {{ $booking->theatre->name }} Theatre
              @endif
            </td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($is_package)
              ₹ {{ $booking->package->package_amount ?? '' }}
              @else
              ₹ {{ $booking->theatre->price ?? '' }}
              @endif
            </td>
          </tr>

          @if($amountData->extra_person_amount > 0)
          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              Extra Person ({{ ($booking->No_people - $booking->theatre->peopleallowed) }} * {{
              $booking->theatre->extra_person_price }})
            </td>
            <td style="padding: 2px 7px; line-height: 20px;">
              ₹ {{ $amountData->extra_person_amount ?? '' }}
            </td>
          </tr>
          @endif

          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no }}</td>
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
              ₹ {{ $booking->theatre->branch_data->decoration_amount ?? '' }}
              @endif
              @else
              -
              @endif
              @endif
            </td>
          </tr>

          @if(isset($booking->cake_id) && $booking->cake_id != NULL && $booking->cake_id > 0 )
          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">{{$booking->cake->cakename}} Cake</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($is_package)
              ₹ {{ $booking->cake_extra_amount ?? '' }}
              @else
              ₹ {{ $branch_cake->price ?? '' }}
              @endif
            </td>
          </tr>
          @endif

          @if(isset($booking->addons) && count($booking->addons) > 0)
            @php($sl_no++)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no }}</td>
              <td style="padding: 2px 7px; line-height: 20px;"><strong>AddOns</strong></td>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
            </tr>
            @foreach ($booking->addons as $addon)
            @if($addon->amount > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">{{ $addon->addon->name ?? '' }}</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $addon->amount ?? '' }}</td>
            </tr>
            @endif
            @endforeach
            @if(isset($addOnsWithZeroAmount) && count($addOnsWithZeroAmount) > 0)
            <tr>
              <td style="padding: 2px 7px; line-height: 20px;"></td>
              <td style="padding: 2px 7px; line-height: 20px;">{{ implode(', ', $addOnsWithZeroAmount) }}</td>
              <td style="padding: 2px 7px; line-height: 20px;">₹ 0</td>
            </tr>
            @endif
          @endif
        </tbody>
      </table>

      <table width="100%" style="font-family: Roboto; font-size: 14px;">
        <tr>
          <td>
            <table style="font-family: Roboto; font-size: 14px;">
              <tr>
                <td width="35%" style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Total Amount</strong>
                </td>
                <td width="35%" style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Advance Paid</strong>
                </td>
                @if($amountData->discount_amount > 0)
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Coupon</strong> <small>({{ $booking->promocode ?? '' }})</small>
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

                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  - ₹ {{ $amountData->discount_amount }}
                </td>
                @endif
              </tr>

              @if($amountData->discount_amount > 0)
              <tr>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Coupon</strong> <small>({{ $booking->promocode ?? '' }})</small>
                </td>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  - ₹ {{ $amountData->discount_amount }}
                </td>
              </tr>
              @endif

            </table>
          </td>
        </tr>
      </table>

      <strong>Notes</strong>
      <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;"cellpadding="10">
        <tbody>
          <tr>
            <td width="20%" style="text-align: left;">{{ $booking->payment_screenshot ?? '' }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </page>

  <script>
    window.print();
  </script>
</body>

</html>