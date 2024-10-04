<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use League\Csv\Reader;

class ImportAppointments extends Command
{
    protected $signature = 'appointments:import';
    protected $description = 'Import appointments from a CSV file';

    public function handle()
    {
        $filePath = storage_path('app/import_appointments.csv');

        if (!file_exists($filePath)) {
            $this->error('File not found: ' . $filePath);
            return 1;
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            Appointment::create([
                'user_id' => $row['user_id'],
                'date' => $row['date'],
                'status' => $row['status'],
                'notes' => $row['notes'],
            ]);
        }

        $this->info('Appointments imported successfully!');

        return 0;
    }
}
