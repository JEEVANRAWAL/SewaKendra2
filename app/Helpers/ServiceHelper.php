<?php

namespace App\Helpers;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceHelper
{
  public static function getFrequentlyBookedServices($limit = 5)
  {
      // Calculate a time-decayed booking count
      $frequentlyBookedServices = DB::table('bookings')
          ->select('service_id', DB::raw('SUM(1 / POW(TIMESTAMPDIFF(DAY, booked_at, NOW()) + 1, 2)) as weighted_booking_count'))
          ->groupBy('service_id')
          ->orderByDesc('weighted_booking_count')
          ->limit($limit)
          ->get();
  
      // Get the service details for the frequently booked services
      $serviceIds = $frequentlyBookedServices->pluck('service_id');
      $services = Service::whereIn('id', $serviceIds)->get();
  
      // Combine the weighted booking count with the service details
      $result = [];
      foreach ($frequentlyBookedServices as $bookingService) {
          $service = $services->where('id', $bookingService->service_id)->first();
          if ($service) {
              $result[] = [
                  'service' => $service,
                  'weighted_booking_count' => $bookingService->weighted_booking_count,
              ];
          }
      }
  
      return $result;
  }
  
}
