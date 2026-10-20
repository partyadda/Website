@extends('includes.layout')
@section('title','Dashboard')

@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->


<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    @include('includes.inc_session_success')

    <div class="container-fluid">
        <!--begin::Row-->

        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actions to be performed</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i
                                    data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                    class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool"
                                data-lte-toggle="card-remove">
                                <i class="bi bi-x-lg"></i> </button> </div>
                    </div> <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </br>

        <!--begin::Row-->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Last 10 Bookings done through the website</h3>
                        <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i
                                    data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                    class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool"
                                data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button> </div>
                    </div> <!-- /.card-header -->
                    <div class="card-body">

                        @include('includes.inc_booking_table')

                        {{--
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th width="13%">Booking Details</th>
                    <th width="13%">Theatre Details</th>
                    <th width="13%">Dates</th>
                    <th width="13%">Amount</th>
                    <th width="13%">Add-Ons</th>
                    <th width="8%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($booking_bk as $book)
                  <tr>
                    <td>
                      {{$book->customer->customer_name ?? ''}}<br>
                        <a href="Https://wa.me/+91{{$book->customer->phone ?? ''}}">{{$book->customer->phone ??
                        ''}}</a><br>
                        <div id="table-sparkline-1"> ({{$book ->id}})#Guests : {{$book->No_people}}</div>
                        <span class="fs-8">{{$book->customer->email ?? ''}}</span><br>
                        <span class="fs-8">
                            {{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('d-M-y
                        h:m')}}</span><br>
                        <span class="fs-8 text-bg-warning">{{$book ->remarks_or_notes}}</span>
                        </td>

                        <td>
                            @if($book->package != null)
                            {{$book->package->package_name ?? ''}} Package <br>
                            @else
                            {{$book->theatre->name ?? 'NA'}}<br>

                            <span class="fs-8"> {{$book->decoration->name ?? 'No Decoration'}} </span><br>
                            @endif

                            <span class="fs-8">Cake:</span></br> {{$book->cake->cakename ?? ''}}</br>
                            <span class="fs-8">Name on Cake: </span><br>{{$book->name_on_cake}}

                        </td>

                        <td>
                            <span class="fs-8">Slot
                                Date:</span><br>{{\Carbon\Carbon::createFromTimestamp(strtotime($book->date))->format('d-M-y')}}
                            <br>


                            {{$book->slot->name}} <br>

                            @if($book->your_name != null)
                            <span class="fs-8"> {{$book->decoration->person1}} :</span><br>{{$book->your_name}}<br>
                            @endif
                            @if($book->partner_name != null)
                            <span class="fs-8"> {{$book->decoration->person1}} :</span><br>{{$book->partner_name}}<br>
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
                            <span class="fs-8"> {{$add->addon->name}}

                                @if(($add->amount ?? 0) > 0) {{$add->amount}}</b>@endif

                            </span>
                            </br>
                            @endforeach
                        </td>

                        <td>
                            <a target="_blank"
                                href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=
                                Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C
                                %0A%0AGreetings%20from%20*PartyAdda*
                                !%0A%0AWe%20are%20pleased%20to%20share%20the%20details%20of%20your%20booking%20.
                                
                                %0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d') ?? 'NA'}}
                                %0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}
                                %0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}
                                %0A*Event%20Date*%20%3A%20{{$book->date ?? 'NA'}}%20{{$book->slot->name ?? 'NA'}}
                                %0A*%20{{$book->package->package_name ?? ''}}
                                %0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'NA'}}%0A*Decoration*%20%3A%20Yes
                                %0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}
                                %0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}
                                %0A*Number%20People*%20%3A%20{{$book->No_people ?? 'NA'}}
                                %0A%0A*Addons%20%3A
                                *%0A @foreach($book->addons as $add) 

                                {{$add->addon->name ?? 'NA'}}
                                @if(($add->amount ?? 0) > 0) 
                                {{$add->amount}}
                                @endif 
                                
                                %0A @endforeach 

                                %0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount??'NA'}}
                                %0A*Balance*%20Amount%20%3A%20₹{{$book->final_price ?? 'NA'}}

                                %0A%0A*_Remarks%3A%20{{$book->remarks_or_notes?? 'None'}}_*
                                
                                %0A%0ACheers,%20
                                %0AThe%20PartyAdda%20Team"
                                type="submit" class="btn btn-default border border-success" name="whatsapp" id="whatsapp"
                                value="Send WhatsApp">
                                <span class="fs-8"><i class="bi bi-whatsapp"></i> Customer 2 </span></a></br></br>

                            <a target="_blank"
                                href="https://wa.me/919845740260?text=Dear%20Admin%2C%0APlease%20find%20your%20Customer%20booking's%20details.
                                
                                %0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d') ?? 'NA'}}%0A*Person%20Name*%20%3A%20{{$book->customer->customer_name ?? 'Customer'}}%0A*Contact*%20%3A%20%2B91{{$book->customer->phone ?? 'Customer'}}%0A%0A*Event*%20%3A%20{{$book->decoration->name ?? 'NA'}}%20%0A*Event%20Date*%20%3A%20{{$book->date ?? 'NA'}}%20{{$book->slot->name ?? 'NA'}}%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'NA'}}%0A*Peoples*%20%3A%20{{$book->No_people ?? 'NA'}}%0A%0A*Decoration*%20%3A%20Yes%0A%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'NA'}}%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'NA'}}%0A%0A*Addons%20%3A*%0A @foreach($book->addons as $add) {{$add->addon->name ?? 'NA'}}%0A @endforeach %0A*Advance%20Paid*%20%3A%20₹{{$book->payment->amount ?? 'NA'}}%0A*Balance*%20Amount%20%3A%20₹{{$book->final_price ?? 'NA'}}
                                

                                %0A%0A*_Remarks%3A%20{{$book->remarks_or_notes?? 'None'}}_*

                                %0A%0A*Thank%20you*.%0A%0ARegards%2C%0A*Party%C2%A0Adda%C2%A0Team*"
                                
                                class="btn btn-default border border-success" name="whatsapp" id="whatsapp"
                                value="Send WhatsApp">
                                <span class="fs-8"><i class="bi bi-whatsapp"></i> Admin</span></a><br>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                    --}}

                </div> <!-- /.card-body -->
                <!--   <div class="card-footer clearfix"> 
									<a href="{{ route('admin.view_theatres')}}" class="btn btn-sm btn-primary float-start">Manage Theatres</a> 
									<a href="{{ route('admin.booking')}}" class="btn btn-sm btn-secondary float-end">View All Orders</a>
								</div> <!-- /.card-footer -->


            </div> <!-- /.card -->

        </div> <!-- /.Start col -->
        <!-- Start col -->
        <div class="col-md-12">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 text-bg-warning"> <span class="info-box-icon"> <i class="bi bi-tag-fill"></i> </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Booking Theatre</span> <span
                        class="info-box-number">{{$theatreWithMaxBookings->name}} -
                        {{$theatreWithMaxBookings->total_bookings}}</span> </div> <!-- /.info-box-content -->
            </div> <!-- /.info-box -->
            <div class="info-box mb-3 text-bg-success"> <span class="info-box-icon"> <i class="bi bi-heart-fill"></i>
                </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Revenue Theatre</span> <span
                        class="info-box-number">{{$theatreWithMaxRevenue->name}} - &#8377;
                        {{$theatreWithMaxRevenue->total_revenue}}/-</span> </div> <!-- /.info-box-content -->
            </div> <!-- /.info-box -->
            <div class="info-box mb-3 text-bg-danger"> <span class="info-box-icon"> <i class="bi bi-cloud-download"></i>
                </span>
                <div class="info-box-content"> <span class="info-box-text">Highest Repeated Customers</span> <span
                        class="info-box-number">{{$theatreWithMaxCustomer->name}} -
                        {{$theatreWithMaxCustomer->total_bookings}}</span> </div> <!-- /.info-box-content -->
            </div> <!-- /.info-box -->
            <div class="info-box mb-3 text-bg-info"> <span class="info-box-icon"> <i class="bi bi-chat-fill"></i> </span>
                <div class="info-box-content"> <span class="info-box-text">Lowest Revenue Theatre</span> <span
                        class="info-box-number">{{$theatreWithLowserCustomer->name }} -
                        {{$theatreWithLowserCustomer->total_bookings}}</span> </div> <!-- /.info-box-content -->
            </div> <!-- /.info-box -->
            <!-- <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Support</h3>
                                    <div class="card-tools">Till 31st Dec 2025</div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-success fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
                                        <p class="d-flex flex-column text-end">partyadda.com@gmail.com<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-info fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
									<p class="d-flex flex-column text-end"> +91 821 757 5597<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <p class="text-danger fs-2"> <i class="nav-icon bi bi-box-seam-fill"></i></p>
                                                                                <p class="d-flex flex-column text-end">https://partyadda.com<span class="text-secondary">Email 24X7X365</span> </p>
                                    </div> 
                                </div>    -->

        </div>
    </div> <!-- /.col -->
</div> <!-- /.row (main row) -->



</div>
<!--end::Container-->
</div>
<!--end::App Content-->
@endsection