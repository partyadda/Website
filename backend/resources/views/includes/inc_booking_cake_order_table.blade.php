<div class="table-responsive">
  @if(isset($isMailTemplate) && $isMailTemplate == 1)
  <br />
  <div><b>Cake Order Details From - {{ $dateRange ?? '' }}</b></div>
  <br />
  <table border="1" style="border-collapse: collapse; border-color: #D3D3D3; border-width:1px;" cellspacing="0"
    cellpadding="8" width="100%">
    @else
    <table id="myTable" style="margin:20px auto" class="table table-responsive table-sm"> @endif
      <thead>
        <tr>
          <th>#</th>
          <th>Cake Flavour</th>
          <th>Name On Cake</th>
          <th>Time Before</th>
          <th>Theatre</th>
          <th>Amount</th>
        </tr>
      </thead>
      @foreach($booking as $book)
      @isset($book->cake)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $book->cake->cakename ?? '-'}} 
          @if(isset($book->package_id) && $book->package_id > 0)
           <small>(Pckg)</small>
          @endif
        </td>
        <td>{{ $book->name_on_cake ?? '-'}}</td>
        
        <td> 
         @if(isset($book->new_starttime))
               {{$book->new_starttime}}
        @else
            {{ $book->slot->name}}
        @endif
            </td>
        
        
        <td>{{ $book->theatre->name ?? 'NA' }}</td>
        <td>
          @if(isset($book->package_id) && $book->package_id > 0)
          {{ $book->cake_extra_amount ?? '-'}}
          @else
            @if(isset($book->branch_cake))
            {{ $book->branch_cake->price ?? '-'}}
            @endif
          @endif
        </td>
        
      </tr>
      @endisset
      @endforeach
    </table>
</div> <!-- /.table-responsive -->