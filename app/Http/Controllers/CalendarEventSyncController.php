<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\booking;
use Google\Client;
use Exception;

class CalendarEventSyncController extends Controller
{
  protected $googleClient;

  const OAUTH2_TOKEN_URI      = 'https://accounts.google.com/o/oauth2/token';
  const CALENDAR_TIMEZONE_URI = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';
  const CALENDAR_LIST  = 'https://www.googleapis.com/calendar/v3/users/me/calendarList';
  const CALENDAR_EVENT = 'https://www.googleapis.com/calendar/v3/calendars/';
  const CALENDAR_SCOPE = 'https://www.googleapis.com/auth/calendar';
  const CALENDAR_ID    = '569a43dfc4a51e1baa44609a883f9e8e6a07df580a15ec830de94cf63c246a4e@group.calendar.google.com';
  const CALENDAR_CREATE_EVENT = self::CALENDAR_EVENT . self::CALENDAR_ID . '/events';

  public function __construct()
  {
    $this->googleClient = new Client();
  }

  public function index()
  {
    $calendarEventData = $this->getBookingCalendarEventArray();

    $isAllSync = $calendarEventData['isAllSync'];
    $eventsData = $calendarEventData['eventsData'];
    $isEventsInserted = 0;
    $isEventsInsertedCount = 0;
    $errorData = array();

    if (isset($eventsData) && count($eventsData) > 0) {
      $googleServiceAccountCredentials = Storage::path('google_calendar/party_adda_google_service_account.json');

      $this->googleClient->setAuthConfig($googleServiceAccountCredentials);
      $this->googleClient->addScope(self::CALENDAR_SCOPE);
      $this->googleClient->useApplicationDefaultCredentials();
      $this->googleClient->fetchAccessTokenWithAssertion();
      $this->googleClient->authorize();

      $token = $this->googleClient->getAccessToken();
      $access_token = $token['access_token'];

      foreach ($eventsData as $event) {
        $booking_id = $event['booking_id'];
        $calEventId = NULL;
        try {
          $eventResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $access_token
          ])->post(self::CALENDAR_CREATE_EVENT, $event['event']);

          if ($eventResponse->successful()) {
            $calEvent = json_decode($eventResponse->body());
            $calEventId = $calEvent->id;
            $bookingUpdate = ['cal_event_id' => $calEventId];
            booking::where('id', $booking_id)->update($bookingUpdate);

            $isEventsInserted = 1;
            $isEventsInsertedCount++;
          } else {
            //echo json_encode($eventResponse->body());
            $errorData[] = $eventResponse->body();
          }
        } catch (Exception $e) {
        }
      }
    }

    $data['isAllSync'] = $isAllSync;
    $data['isEventsInserted'] = $isEventsInserted;
    $data['isEventsInsertedCount'] = $isEventsInsertedCount;
    $data['errorData'] = $errorData;

    //echo json_encode($data);
    return view('calendar_event_manage', $data);
  }

  function getBookingCalendarEventArray()
  {
    $startDate = date('Y-m-d', strtotime('2025-12-01'));
    //$startDate = date('Y-m-d', strtotime('2025-04-25'));

    $bookings = Booking::with(['customer', 'theatre.branchs', 'cake', 'slot', 'decoration', 'payment', 'addons.addon'])->where('date', '>=', $startDate)->where('booking_status', '=', 1)->whereNull('cal_event_id')->orderByDesc('date')->get();

    $isAllSync = 0;
    if (isset($bookings) && count($bookings) > 0) {
      $isAllSync = 0;
    } else {
      $isAllSync = 1;
    }

    $event_timezone = "Asia/Kolkata";

    $events = array();

    foreach ($bookings as $book) {
      $calendarEvent = array();

      $calendarEvent['summary'] = ($book->decoration->name ?? "") . " - " . $book->theatre->name . " Theatre";
      $calendarEvent['location'] = $book->theatre->name . "," . $book->theatre->branchs->branch_name;
      $calendarEvent['description'] = $htmlData = view('cal_event_detail', compact('book'))->render();

      $startDateTime = date("Y-m-d H:i:s", strtotime($book->date . " " . $book->slot->start_time));
      $addDurationMinutes = "+ " . $this->getDuationMinutes($book->slot->duration) . " minutes";
      $endDateTime = date('Y-m-d H:i:s', strtotime($addDurationMinutes, strtotime($startDateTime)));

      $startDateTimeEvent =  date("Y-m-d\TH:i:s", strtotime($startDateTime));
      $endDateTimeTimeEvent = date("Y-m-d\TH:i:s", strtotime($endDateTime));

      $calendarEvent['start'] = array('dateTime' => $startDateTimeEvent, 'timeZone' => $event_timezone);
      $calendarEvent['end'] = array('dateTime' => $endDateTimeTimeEvent, 'timeZone' => $event_timezone);

      $eventsData['event'] =  $calendarEvent;
      $eventsData['booking_id'] = $book->id;

      $events[] = $eventsData;
    }

    $data['isAllSync'] = $isAllSync;
    $data['eventsData'] = $events;

    return $data;
  }

  function getDuationMinutes($durtion)
  {
    $time = explode(':', $durtion);
    return ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
  }
}