<!DOCTYPE html>
<html>
<head>
  <title>Party Adda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    @if($isAllSync == 1)
      <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>All events are in sync</h1> 
        <p> All bookings are in sync with calendar events. No Pending bookings.</p>
      </div>
    @elseif ($isEventsInserted == 1)
      <div class="mt-4 p-5 bg-success text-white rounded">
        <h1>Done</h1> 
        <p>{{ $isEventsInsertedCount }} Bookings are pushed to calendar events.</p>
      </div>
    @elseif (isset($errorData) && count($errorData) > 0)
      <div class="mt-4 p-5 bg-danger text-white rounded">
        <h1>Error</h1> 
          @foreach ($errorData as $error)
          <p> {{  $error }} </p><br/>
          @endforeach
      </div>
    @endif
  </div>
</body>
</html>
