<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Party Adda | Invoice</title>

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
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {  
      width: 21cm;
      height: auto; /* 29.7cm; */
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
      body, page {
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
  <page size="A4">
    <div id="print_form">
      <table width="100%" style="font-family: Roboto; font-size: 16px;" cellpadding="10">
        <tr>
          <td width="100%" style="padding: 0px; line-height: 22px">
            <div id="logo">
              <p>
                <img src="https://partyadda.com/public/assets/img/logo.webp" style="width: 15%; max-width: 150px;"/>
              <br />
              Party Adda<br />
              3rd Floor, AECS Layout - C Block, AECS Layout,<br />
              Brookefield, Bengaluru, Karnataka 560037
              </p>
            </div>
          </td>
        </tr>
      </table>
      <table width="100%" style="font-family: Roboto;" cellpadding="10">
        <tr>
          <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
            INVOICE
          </td>
        </tr>
        <tr>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" style="font-family: Roboto;" cellpadding="10">
        <tr>
          <td width="49%" style="border: 0.1mm solid #eee; line-height: 22px; font-size: 14px;">
            @php
              $startTime = date('h:i a', strtotime($booking->slot->start_time));
              $endTime = date('h:i a', strtotime($booking->slot->end_time));
            @endphp
            Theatre Name : <strong> {{ $booking->theatre->name }} </strong><br />
            Slot Timing : <strong> {{ $startTime }} - {{ $endTime }} </strong><br />
            Occassion : <strong> {{ $booking->decoration->name ?? '' }} </strong>
          </td>
          <td width="2%">&nbsp;</td>
          <td width="49%" style="border: 0.1mm solid #eee; text-align: right; line-height: 22px; font-size: 14px;">
            <strong> {{ $booking->customer->customer_name }} </strong><br />
            {{ $booking->customer->phone }}<br />
            {{ $booking->customer->email }}
          </td>
        </tr>
      </table>
      <br>
      <table width="100%" style="font-family: Roboto; font-size: 14px;">
        <tr>
          <td>
            <table width="60%" align="left" style="font-family: Roboto; font-size: 14px;">
              <tr>
                <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
              </tr>
            </table>
            <table width="40%" align="right" style="font-family: Roboto; font-size: 14px;">
              <tr>
                <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">
                  <strong>Invoice No</strong>
                </td>
                <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"># {{ $booking->id }}</td>
              </tr>
              <tr>
                <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">
                  <strong>Date</strong>
                </td>
                <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">
                  @php
                    $dateFormatted = date('d M, Y', strtotime($booking->date));
                  @endphp
                  {{ $dateFormatted }}
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <br>
      <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="10">
        <thead>
          <tr>
            <td width="10%" style="text-align: left;"><strong>#</strong></td>
            <td width="50%" style="text-align: left;"><strong>Detail</strong></td>
            <td width="20%" style="text-align: left;"><strong>Amount</strong></td>
          </tr>
        </thead>
        <tbody>
          @php($sl_no=1)

          <!-- ITEMS HERE -->
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no  }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($is_package)
               Package
              @else
              Theatre
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
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no  }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              Extra Person ({{ ($booking->No_people - $booking->theatre->peopleallowed) }} * {{ $booking->theatre->extra_person_price }})
            </td>
            <td style="padding: 2px 7px; line-height: 20px;">
              ₹ {{ $amountData->extra_person_amount ?? '' }}
            </td>
          </tr>
          @endif
          
          @php($sl_no++)
          <tr>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no  }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">Decoration</td>
            <td style="padding: 2px 7px; line-height: 20px;">
              @if($is_package) 
              ₹ 0 
              @else
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
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no  }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">Cake</td>
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
            <td style="padding: 2px 7px; line-height: 20px;">{{ $sl_no  }}</td>
            <td style="padding: 2px 7px; line-height: 20px;"><strong>AddOns</strong></td>
            <td style="padding: 2px 7px; line-height: 20px;"></td>
           </tr>
           @foreach ($booking->addons as $addon)
           <tr>
            <td style="padding: 2px 7px; line-height: 20px;"></td>
            <td style="padding: 2px 7px; line-height: 20px;">{{ $addon->addon->name ?? '' }}</td>
            <td style="padding: 2px 7px; line-height: 20px;">₹ {{ $addon->amount ?? '' }}</td>
           </tr>
           @endforeach
          @endif
        </tbody>
      </table>
      <br>
      <table width="100%" style="font-family: Roboto; font-size: 14px;">
        <tr>
          <td>
            <table width="50%" align="right" style="font-family: Roboto; font-size: 14px;">
              <tr>
                <td width="50%" style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Total Amount</strong>
                </td>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  ₹ {{ $amountData->sub_total }}
                </td>
              </tr>
              <tr>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Advance Paid</strong>
                </td>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  - ₹ {{ $booking->payment->amount }}
                </td>
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
              <tr>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>Balance</strong>
                </td>
                <td style="border: 1px #eee solid; padding: 2px 7px; line-height: 20px;">
                  <strong>₹ {{ $amountData->balance_amount }} </strong>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </page>

  <script>
    window.print();
  </script>
</body>

</html>