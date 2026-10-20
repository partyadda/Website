<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function view()
    {
        $customers = customer::where("enabled", 1)->get();
        return view("view_customers", compact("customers"));
    }
}