<!DOCTYPE html>
<html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    </head>
   <body>
      <div id="app">
         <main class="py-4">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-3 col-md-offset-6">
                     @if($message = Session::get('error'))
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                     </div>
                     @endif
                     @if($message = Session::get('success'))
                     <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                     </div>
                     @endif
                     <form action="{{ route('razorpay-store') }}" method="POST" >
                      {{ $rzr_order_id }}
                      {{ env('RAZOR_API_KEY') }}
                      val key = {{ env('RAZOR_API_KEY') }}
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                           data-key="{{ env('RAZOR_API_KEY') }}"
                           data-amount="101" 
                           data-currency="INR"
                           data-order_id= "{{ $rzr_order_id ?? NULL }}"
                           data-buttontext="Pay 1.01 INR"
                           data-name="Partyadda"
                           data-description="Razerpay"
                           data-image="https://cybercollege.info/wp-content/uploads/2021/06/cropped-logo.png"
                           data-prefill.name="name"
                           data-prefill.email="email"
                           data-theme.color="#F37254"></script>
                     </form>
                     <div class="card card-default">
                        
                        <div class="card-body text-center">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>
   </body>
</html>