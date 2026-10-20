@extends('includes.layout')
@section('title','Gallery')
@section('content')
<style>
  {{-- body {
     padding: 0;
     margin: 0;
   } --}}
 
   #swarupGallery {
     width: 100%;
     height: auto;
   }
 
   #swarupGallery ul {
     width: 100%;
     height: auto;
     padding: 0;
     margin: 0;
     list-style: none;
   }
 
   #swarupGallery ul li {
     -webkit-transition: all .2s ease-in;
     -moz-transition: all .2s ease-in;
     -o-transition: all .2s ease-in;
     -ms-transition: all .2s ease-in;
     transition: all .2s ease-in;
   }
 
   #swarupGallery ul li:hover {
     opacity: 0.4;
     filter: alpha(opacity=40);
   }
 
   #swarupGallery #sscsworld {
     width: 100%;
     height: auto;
     display: block;
   }
 
   #swarupGallery .gallary-row {
     width: 100%;
     height: auto;
   }

   #sscsworld a {
    border-radius: 8px;
    background: #0000002a;
   }

   #sscsworld a img{
    padding: 5px;
    border-radius: 8px;
   }
 
   #swarupGallery #navHolder {
     width: 100%;
     height: 30px;
     line-height: 30px;
     padding: 0;
     margin: 0;
     {{-- position: absolute; --}}
   }

   .spacer {
     width: 100%;
     height: 0px;
     margin: 0;
     padding: 0;
     clear: both;
     display: block;
   }
 
   .swa-nav {
     width: auto;
     display: inline-block;
     height: 0px;
     position: absolute;
     cursor: pointer;
     padding: 0 5px;
   }
 
   #next-swa {
     right: 0px;
     top: 0px;
   }
 
   #prev-swa {
     left: 0px;
     top: 0px;
   }
 
   .kkk {
     display: none
   }
 </style>

<div class="container">
  <br>
  <div class="row justify-content-center">
    <div class="col-lg-12"><div class="fs-5 fw-bold mb-4">Gallery</div></div>
    <br>
    <div class="col-lg-12">
      <div id="swarupGallery">
          <ul>
            @foreach($theatres as $theatre)
            
              @foreach($theatre->theatre_assets as $asset)
              <li>
                <a href="{{ $asset->image_url }}">
                  <img src="{{ $asset->image_url }}" width="300px" height="300px" alt="{{ $asset->description}}" /></a>
              </li>
              @endforeach
              
            @endforeach
          </ul>
        <div id="navHolder" style="display:none;"></div>
      </div>
    </div>
  </div>
</div>
@endsection


