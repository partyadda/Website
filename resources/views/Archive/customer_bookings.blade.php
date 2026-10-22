@@extends('includes.layout')

@section('title','Private Theaters for Celebration and Surprises')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')
@section('content')

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">All Theatre Bookings</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Bookings
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!-- Start col -->
                        <div class="col-lg-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Booking Orders</h3>
                                </div> <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" style="margin:20px auto" class="table table-striped" >
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="20%">Booking Name</th>
                                                    <th width="20%">Theatre Details</th>
                                                    <th width="20%">Date & Commercials</th>
                                                    <th width="20%">Services</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no =1;
                                                @endphp
                                                @foreach($booking as $book)
                                                <tr>
                                                    <td> {{$no}} </td>
                                                    <td>
                                                        {{$book->customer->customer_name}}<br>
                                                        {{$book->customer->email}}<br>
                                                        {{$book->customer->phone}}
                                                    </td>
                                                    <td>
                                                        {{$book->theatre->name ?? 'Data not found'}}, {{$branch->branch_name ?? 'Data not found'}};<br>
                                                        {{$branch->business_name}}<br>
                                                        {{$branch->email}}<br>
                                                        {{$branch->contactnumber}}
                                                    </td>
                                                    <td> Booking On {{\Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d')}} <br>
                                                        Show on {{$book->date}}<br>
                                                        Slot : {{$book->slot->name}}<br>
                                                        Advance: {{$branch->advance_amount}}<br>
                                                        Balance: {{$book->final_price}}<br>
                                                        <!--- Decoration : Yes Or Price -->
                                                    </td>
                                                    <td>{{$book->decoration->name}}<br>
                                                        @if($book->your_name != null)
                                                            {{$book->decoration->person1}} :{{$book->your_name}}<br>
                                                        @endif
                                                        @if($book->partner_name != null)
                                                            {{$book->decoration->person1}} :{{$book->partner_name}}<br>
                                                        @endif
                                                        Cake: {{$book->cake->cakename}}<br>
                                                        Name on Cake: {{$book->name_on_cake}}<br><br>
                                                        Addon:<br>
                                                        @foreach($book->addons as $add)
                                                            {{$add->addon->name}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="https://wa.me/91{{$book->customer->phone ?? ''}}?text=Dear%20{{$book->customer->customer_name ?? 'Customer'}}%2C%0A%0AGreetings%20from%20*PartyAdda*!%0A%0APlease%20find%20your%20Private%20theatre%20booking's%20details.%0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d') ?? 'Data not found'}}%0A*Event*%20%3A%20{{$book->decoration->name ?? 'Data not found'}}%20%0A*Event%20Date*%20%3A%20{{$book->date ?? 'Data not found'}}%20{{$book->slot->name ?? 'Data not found'}}%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'Data not found'}}%0A%0A*Decoration*%20%3A%20Yes%0A%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'Data not found'}}%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'Data not found'}}%0A%0A*Addons%20%3A*%0A @foreach($book->addons as $add) {{$add->addon->name ?? 'Data not found'}}%0A @endforeach %0A*Advance%20Paid*%20%3A%20₹{{$branch->advance_amount ?? 'Data not found'}}%0A*Balance*%20Amount%20%3A%20₹{{$book->final_price ?? 'Data not found'}}%0A%0A*Thank%20you*.%0A%0ARegards%2C%0A*Party%C2%A0Adda%C2%A0Team*" type="submit" class="btn btn-default border border-success" name="whatsapp" id="whatsapp" value="Send WhatsApp"><i class="bi bi-whatsapp"></i> Message to Customer</a><br>
                                                        <a target="_blank" href="https://wa.me/919845740260?text=Dear%20Admin%2C%0APlease%20find%20your%20Customer%20booking's%20details.%0A%0A*Booking%20Date*%20%3A%20{{ \Carbon\Carbon::createFromTimestamp(strtotime($book->created_at))->format('Y-m-d') ?? 'Data not found'}}%0A*Event*%20%3A%20{{$book->decoration->name ?? 'Data not found'}}%20%0A*Event%20Date*%20%3A%20{{$book->date ?? 'Data not found'}}%20{{$book->slot->name ?? 'Data not found'}}%0A*Theatre%20Name*%20%3A%20%20{{$book->theatre->name ?? 'Data not found'}}%0A%0A*Decoration*%20%3A%20Yes%0A%0A*Cake%20Flavor*%20%3A%20{{$book->cake->cakename ?? 'Data not found'}}%0A*Name%20on%20Cake*%20%3A%20{{$book->name_on_cake ?? 'Data not found'}}%0A%0A*Addons%20%3A*%0A @foreach($book->addons as $add) {{$add->addon->name ?? 'Data not found'}}%0A @endforeach %0A*Advance%20Paid*%20%3A%20₹{{$branch->advance_amount ?? 'Data not found'}}%0A*Balance*%20Amount%20%3A%20₹{{$book->final_price ?? 'Data not found'}}%0A%0A*Thank%20you*.%0A%0ARegards%2C%0A*Party%C2%A0Adda%C2%A0Team*" type="submit" class="btn btn-default border border-success" name="whatsapp" id="whatsapp" value="Send WhatsApp"><i class="bi bi-whatsapp"></i> Message to Admin</a><br>                                                        
            											<button type="submit" class="btn btn-primary" name="services" id="services" value="Services"><i class="bi bi-files"></i> Manage Order</button><br><br>
            											<button type="submit" class="btn btn-warning" name="suspend" id="suspend" value="Suspend"><i class="bi bi-hand-thumbs-down"></i> Manage Refund</button> 
                									</td>
                                                </tr>
                                                @php
                                                $no++;
                                                @endphp
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->
                                </div> <!-- /.card-body -->
        <!--                        <div class="card-footer clearfix"> -->
								<!--	<a href="javascript:void(0)" class="btn btn-sm btn-primary float-start">Manage Theatre</a> -->
								<!--	<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-end">View All Orders</a>-->
								<!--</div> -->
								<!-- /.card-footer -->
                            </div> <!-- /.card -->

                        </div> <!-- /.Start col --> <!-- Start col -->
                        
                    </div> <!-- /.row (main row) -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        @endsection