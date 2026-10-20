@extends('includes.layout')
@section('title','Book Theatre/Package')

@section('content')
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Calendar Event Sync</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Calendar Event Sync
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">

        <div class="card card-success card-outline mb-4">
          <div class="card-header">
            <h3 class="card-title">Calendar Event Sync</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="container">
                @if($isAllSync == 1)
                <div class="p-5 bg-primary text-white rounded">
                  <h1>All events are in sync</h1>
                  <p> All bookings are in sync with calendar events. No Pending bookings.</p>
                </div>
                @elseif ($isEventsInserted == 1)
                <div class="p-5 bg-success text-white rounded">
                  <h1>Done</h1>
                  <p>{{ $isEventsInsertedCount }} Bookings are pushed to calendar events.</p>
                </div>
                @elseif (isset($errorData) && count($errorData) > 0)
                <div class="p-5 bg-danger text-white rounded">
                  <h1>Error</h1>
                  @foreach ($errorData as $error)
                  <p> {{ $error }} </p><br />
                  @endforeach
                </div>
                @endif
              </div>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->

      </div>
    </div><!-- row -->
  </div>
</div>
@endsection

