<table class="table table-bordered">
  <tr>
    <td width="85%">Thtr/Pkg Base Price</td>
    <td width="15%">{{ $billing->base_amount }} </td>
  </tr>
  @if($billing->extra_person_amount ?? 0 > 0)
  <tr>
    <td>Extra Person ({{ $billing->extra_persons }} * {{ $billing->extra_person_price }})</td>
    <td>{{ $billing->extra_person_amount }}</td>
  </tr>
  @endif
  <tr>
    <td>Decoration</td>
    <td>{{ $billing->decoration_amount }}</td>
  </tr>
 <tr>
    <td>
      Cake
      @if($billing->cake_extra_amount ?? 0 > 0)
      <br>
      <small>Customized Cake Charge</small>
      @endif
    </td>
    <td>
      {{ $billing->cake_amount }}
      @if($billing->cake_extra_amount ?? 0 > 0)
        <br/>
        {{ $billing->cake_extra_amount }}
      @endif
    </td>
  </tr>
  @if(
    (isset($billing->add_on_data?->addOnsWithAmount) && count(($billing->add_on_data?->addOnsWithAmount ?? 0)) > 0) || 
    (isset($billing->add_on_data?->addOnsWithZeroAmount) && count(($billing->add_on_data?->addOnsWithZeroAmount ?? 0)) > 0)
  )
  <tr>
    <th>AddOns</th>
    <td></td>
  </tr>
  @endif
  @if(isset($billing->add_on_data?->addOnsWithAmount) && count(($billing->add_on_data?->addOnsWithAmount ?? 0)) > 0)
  <tr>
    <td>{{ implode(', ', $billing->add_on_data?->addOnsWithAmount) }}</td>
    <td>{{ $billing->addon_total_amount }}</td>
  </tr>
  @endif
   @if(isset($billing->add_on_data?->addOnsWithZeroAmount) && count(($billing->add_on_data?->addOnsWithZeroAmount ?? 0)) > 0)
    <tr>
      <td>{{ implode(', ', $billing->add_on_data?->addOnsWithZeroAmount) }}</td>
      <td>0</td>
    </tr>
  @endif

  <tr>
    <td>Extra Persons Charge</td>
    <td>{{ $billing->billing_data?->extra_person_amount_overloaded }}</td>
  </tr>
  <tr>
    <td>Extra Time Charge</td>
    <td>{{ $billing->billing_data?->extra_time_amount }}</td>
  </tr>
  <tr>
    <td>Upgrade Charge</td>
    <td>{{ $billing->billing_data?->upgrade_charge_amount }}</td>
  </tr>
  <tr>
    <td>Cold Drink ({{ $billing->billing_data?->cold_drink_qty }} * {{ $billing->billing_data?->cold_drink_unit_price }})
    </td>
    <td>{{ $billing->billing_data?->cold_drink_amount }}</td>
  </tr>
  <tr>
    <td>Water Bottle 250ml ({{ $billing->billing_data?->water_bottle_250_qty }} *
      {{ $billing->billing_data?->water_bottle_250_unit_price }})</td>
    <td>{{ $billing->billing_data?->water_bottle_250_amount }}</td>
  </tr>
   @if($billing->billing_data?->water_bottle_500_qty ?? 0 > 0)
  <tr>
    <td>Water Bottle 500ml ({{ $billing->billing_data?->water_bottle_500_qty }} *
      {{ $billing->billing_data?->water_bottle_500_unit_price }})</td>
    <td>{{ $billing->billing_data?->water_bottle_500_amount }}</td>
  </tr>
     @endif
 
      @if($billing->billing_data?->water_bottle_1000_qty ?? 0 > 0)
       <tr>
        <td>Water Bottle 1000ml ({{ $billing->billing_data?->water_bottle_1000_qty }} *
          {{ $billing->billing_data?->water_bottle_1000_unit_price }})</td>
        <td>{{ $billing->billing_data?->water_bottle_1000_amount }}</td>
        </tr>
     @endif
  
  <tr>
    <td>Photo Print Charge</td>
    <td>{{ $billing->billing_data?->photo_print_amount }}</td>
  </tr>
  <tr>
    <td>Cleaning Charge</td>
    <td>{{ $billing->billing_data?->cleaning_charge_amount }}</td>
  </tr>
  <tr>
    <td>Food</td>
    <td>{{ $billing->billing_data?->food_total_amount }}</td>
  </tr>
  <tr>
    <td>Other Charge</td>
    <td>{{ $billing->billing_data?->extra_charge_amount }}</td>
  </tr>
  
  
  @if($billing->sub_total!= $billing->total)
  
  <tr class="table-success">
    <th>Sub Total</th>
    <td><strong>{{ $billing->sub_total }}</strong></td>
  </tr>
  @endif
  
  @if($billing->discount_amount ?? 0 > 0)
  <tr>
    <th>Discount</th>
    <td>{{ $billing->discount_amount }}</td>
  </tr>
  @endif
  
  @if($billing->short_duration_discount_amount ?? 0 > 0)
  <tr>
    <th>Short Duration Discount</th>
    <td>{{ $billing->short_duration_discount_amount }}</td>
  </tr>
  @endif
  
  @if($billing->billing_data?->special_discount_amount ?? 0 > 0)
  <tr>
    <th>Spl. Discount</th>
    <td>{{ $billing->billing_data?->special_discount_amount }}</td>
  </tr>
 @endif
  
  <tr class="table-success">
    <th>Total</th>
    <td><strong>{{ $billing->total }}</strong></td>
  </tr>
  <tr>
    <th>Adv. Paid</th>
    <td>{{ $billing->advance_amount }}</td>
  </tr>
  <tr>
    <th>Collected Amount</th>
    <td>{{ $billing->collected_amount }}</td>
  </tr>
  <tr class="table-warning">
    <th>Balance Amount</th>
    <td><strong>{{ $billing->balance_amount }}</strong></td>
  </tr>
</table>