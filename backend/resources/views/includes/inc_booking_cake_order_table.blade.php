@php
    $isEmail = isset($isMailTemplate) && $isMailTemplate == 1;
    $specialPackages = ['16', '17', '25', '26', '45', '46'];
    $cakeBookings = $booking
        ->where('booking_status', 1)
        ->sortBy(fn ($book) => $book->cake->cakename ?? '')
        ->filter(fn ($book) => !empty($book->cake));

    $cakeOrderLines = [];
    $orderDate = null;

    foreach ($cakeBookings as $cakeBooking) {
        if ($cakeBooking->cake->id == 6) {
            continue;
        }

        $weight = in_array((string) $cakeBooking->package_id, $specialPackages, true)
            ? '1 kg'
            : '500 grams';

        $cakeOrderLines[] = (count($cakeOrderLines) + 1) . ' '
            . $cakeBooking->cake->cakename . ' - ' . $weight;

        if ($orderDate === null && !empty($cakeBooking->date)) {
            $orderDate = \Carbon\Carbon::parse($cakeBooking->date)->format('d M, D');
        }
    }

    $cakeDetails = implode("\n", $cakeOrderLines);
    $orderMessage = 'Cake Order for: ' . ($orderDate ?? ($dateRange ?? ''))
        . "\n\n*Before:* 11:00 AM -- *Change time*\n\n"
        . $cakeDetails;
    $whatsappUrl = 'https://wa.me/917625047600?text=' . rawurlencode($orderMessage);

    $cellStyle = "padding:4px 6px;border:1px solid #d3d3d3;vertical-align:top;"
        . "font-family:Montserrat,Arial,sans-serif;font-size:13px;line-height:1.4;";
@endphp

<div class="table-responsive" style="font-family:Montserrat,Arial,sans-serif;font-size:13px;line-height:1.4;">
    @if ($isEmail)
        <div style="margin:0 0 6px;font-size:14px;font-weight:700;">
            Cake Order Details From - {{ $dateRange ?? '' }}
        </div>
    @endif

    <table
        @if (!$isEmail) id="myTable" class="table table-sm" @endif
        cellspacing="0"
        cellpadding="0"
        width="100%"
        style="width:100%;margin:0 0 8px;border-collapse:collapse;border:1px solid #d3d3d3;font-family:Montserrat,Arial,sans-serif;font-size:13px;line-height:1.4;"
    >
        <thead>
            <tr>
                @foreach (['#', 'Cake Flavour', 'Name On Cake', 'Time Before', 'Theatre', 'Amount'] as $heading)
                    <th scope="col" style="{{ $cellStyle }}text-align:left;font-weight:700;">{{ $heading }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($cakeBookings as $book)
                <tr>
                    <td style="{{ $cellStyle }}">
                        {{ $loop->iteration }}
                        <a href="https://partyadda.com/backend/public/admin/booking/invoice/{{ $book->id }}"
                           target="_blank" rel="noopener noreferrer">({{ $book->id }})</a>
                    </td>
                    <td style="{{ $cellStyle }}">
                        {{ $book->cake->cakename ?? '-' }}
                        @if (($book->package_id ?? 0) > 0)
                            <small style="font-size:11px;">(Pckg)</small>
                        @endif
                    </td>
                    <td style="{{ $cellStyle }}">{{ $book->name_on_cake ?? '-' }}</td>
                    <td style="{{ $cellStyle }}">{{ $book->new_starttime ?? $book->slot->name ?? '-' }}</td>
                    <td style="{{ $cellStyle }}">{{ $book->theatre->name ?? 'NA' }}</td>
                    <td style="{{ $cellStyle }}">
                        @if (($book->cake_amount ?? 0) > 0)
                            <span>Price: {{ $book->cake_amount }}</span>
                        @endif
                        @if (($book->cake_extra_amount ?? 0) > 0)
                            <span>Extra: {{ $book->cake_extra_amount }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="{{ $cellStyle }}text-align:center;">No cake orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (count($cakeOrderLines) > 0)
        <a href="{{ $whatsappUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           class="btn btn-primary btn-outline-dark rounded-pill border border-success"
           name="whatsapp"
           id="whatsapp"
           style="display:inline-block;margin:0;padding:7px 12px;font-family:Montserrat,Arial,sans-serif;font-size:13px;line-height:1.4;text-decoration:none;">
            Generate Cake Order Message
        </a>
    @endif
</div>
