<?php

namespace App\Helpers;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceHelper
{
    public static function getFrequentlyBookedServices($limit = 5)
    {
         // Calculate the frequency of bookings for each service
          $frequentlyBookedServices = DB::table('bookings')
          ->select('service_id', DB::raw('COUNT(*) as booking_count'))
          ->groupBy('service_id')
          ->orderByDesc('booking_count')
          ->limit($limit)
          ->get();

         // Get the service details for the frequently booked services
          $serviceIds = $frequentlyBookedServices->pluck('service_id');
          $services = Service::whereIn('id', $serviceIds)->get();

         // Combine the booking count with the service details
          $result = [];
          foreach ($frequentlyBookedServices as $bookingService) {
            $service = $services->where('id', $bookingService->service_id)->first();
            if ($service) {
              $result[] = [
              'service' => $service,
              'booking_count' => $bookingService->booking_count,
             ];
            }
         }

          return $result;
    }
}
