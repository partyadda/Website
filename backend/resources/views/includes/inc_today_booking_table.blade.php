<div class="table-responsive">
  @if(isset($isMailTemplate) && $isMailTemplate == 1)
  <br />
  <div><b>Booking Details From - {{ $dateRange ?? '' }}</b></div>
  <br />
  <table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0" cellpadding="8" width="100%">
    @else
    <table id="myTable" style="margin:20px auto" class="table table-striped table-responsive table-sm">
      @endif
      <thead>
        <tr>
          <th width="1%">#</th>
          <th width="20%">Booking Details</th>
          <th width="18%">Theatre Details</th>
          <th width="18%">Cake</th>
          <th width="9%">Dates</th>
          <th width="9%">Slot</th>
          <th width="12%">Amount</th>
          <th>Add-Ons</th>
          <th>Booking</th>
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <th width="10%">Remarks</th>
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
            
             </td>
          <!--Theatre Start -->
          <td>
            @if($book->package != null)
            {{ $book->package->package_name ?? '' }} Package ({{ $book->package->package_amount ?? '' }})<br>
            @else
            {{ $book->theatre->name ?? 'NA' }} ({{ $book->theatre->price ?? '' }})<br>
            <span class="fs-8"> {{$book->decoration->name ?? 'No Decoration'}} </span><br>
            @endif
            
          </td>
          <!--Theatre Emd -->
          <td>
              
            <span class="fs-8"></span>{{$book->cake->cakename ?? ''}} ({{ $book->cake_extra_amount }})</br>
            <span class="fs-8">cakeMsg:</span>{{ $book->name_on_cake }}  
            </br>
            Led  @if($book->partner_name != null)
            <span class="fs-8"> 1 :</span>{{$book->partner_name}}
            @endif
            @if($book->your_name != null)
            <span class="fs-8"> 2 :</span>  | {{$book->your_name}}
            @endif
            
          </td>
          
          
          <td>
           {{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('d-M-y')}}
            </td>
    
        <td>    
            @if(isset($book->new_starttime))
                <span class="text-success">{{$book->new_starttime}} - {{$book-> new_endttime}}</span>
            @else
                {{$book->slot->start_time}} - {{$book->slot->end_time}}
            @endif
        
         
          </td>
          <td>
            <div id="table-sparkline-1">
              Total : &#8377;{{$book->final_price+ $book->payment->amount ?? 0 }}<br>
              <span class="fs-8">
                Advance:&#8377;{{$book->payment->amount ?? 0}}
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
          <td>
            <div id="table-sparkline-1"> 
              @if(isset($book->payment_confirmed_by))
              @if($book->payment_confirmed_by == 1)
              Krishna
              @elseif($book->payment_confirmed_by == 3)
              Supriya
              @elseif($book->payment_confirmed_by == 4)
              Kausik
              @elseif($book->payment_confirmed_by == 5)
              Mahesh
              else
              Siddu
              @endif
              @else
              Web
              @endif
            </div>
            #ppl:{{$book->No_people}}
            <a href="https://partyadda.com/backend/public/admin/booking/invoice/{{$book ->id}}" target="_blank" rel="noopener noreferrer">({{$book ->id}})</a>
          </td>
          
          @if(isset($isMailTemplate) && $isMailTemplate == 1)
          @else
          <td>
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
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
</div> <!-- /.table-responsive -->