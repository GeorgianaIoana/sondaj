<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use League\Csv\Writer;

class ExportAppointments extends Command
{
    protected $signature = 'appointments:export';
    protected $description = 'Export appointments to a CSV file';

    public function handle()
    {
        $filePath = storage_path('app/export_appointments.csv');

        $csv = Writer::createFromPath($filePath, 'w+');
        $csv->insertOne(['user_id', 'date', 'status', 'notes']);

        $appointments = Appointment::all();

        foreach ($appointments as $appointment) {
            $csv->insertOne([
                $appointment->user_id,
                $appointment->date,
                $appointment->status,
                $appointment->notes,
            ]);
        }

        $this->info('Appointments exported successfully to ' . $filePath);
    }
}
