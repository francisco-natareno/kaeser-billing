<?php

namespace App\Events;

use App\File;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FileUploadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function fileCreated(File $file)
    {
        switch ($file->filename) {
            case "contracts.xlsx":
                (new \App\Imports\ContractsImport)->import(storage_path('app/uploads/contracts.xlsx'));
                Log::info("Contracts File Created");
            break;

            case "customers.xlsx":
                (new \App\Imports\CustomersImport)->import(storage_path('app/uploads/customers.xlsx'));
                Log::info("Customers File Created");
            break;

            case "equipments.xlsx":
                (new \App\Imports\MachinesImport)->import(storage_path('app/uploads/equipments.xlsx'));
                Log::info("Machines File Created");
            break;

            case "invoices.xlsx":
                (new \App\Imports\InvoicesImport)->import(storage_path('app/uploads/invoices.xlsx'));
                Log::info("Invoices File Created");
            break;

            case "orders.xlsx":
                (new \App\Imports\OrdersImport)->import(storage_path('app/uploads/orders.xlsx'));
                Log::info("Orders File Created");
            break;

            case "parts.xlsx":
                (new \App\Imports\PartsImport)->import(storage_path('app/uploads/parts.xlsx'));
                Log::info("Parts File Created");
            break;

            case "VF04_04.xlsx":
                Log::info("April File Created");
            break;

            case "VF04_05.xlsx":
                Log::info("May File Created");
            break;

            default:
                Log::info("File Created Event Fire: ".$file);
        }
    }

    public function fileUpdated(File $file)
    {
        switch ($file->filename) {
            case "contracts.xlsx":
                (new \App\Imports\ContractsImport)->import(storage_path('app/uploads/contracts.xlsx'));
                Log::info("Contracts File Updated");
            break;

            case "customers.xlsx":
                \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
                \Illuminate\Support\Facades\DB::table('customers')->truncate();
                (new \App\Imports\CustomersImport)->import(storage_path('app/uploads/customers.xlsx'));
                Log::info("Customers File Updated");
            break;

            case "equipments.xlsx":
                \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
                \Illuminate\Support\Facades\DB::table('machines')->truncate();
                (new \App\Imports\MachinesImport)->import(storage_path('app/uploads/equipments.xlsx'));
                Log::info("Machines File Updated");
            break;

            case "invoices.xlsx":
                (new \App\Imports\InvoicesImport)->import(storage_path('app/uploads/invoices.xlsx'));
                Log::info("Invoices File Updated");
            break;

            case "orders.xlsx":
                (new \App\Imports\OrdersImport)->import(storage_path('app/uploads/orders.xlsx'));
                Log::info("Orders File Updated");
            break;

            case "parts.xlsx":
                \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
                \Illuminate\Support\Facades\DB::table('parts')->truncate();
                (new \App\Imports\PartsImport)->import(storage_path('app/uploads/parts.xlsx'));
                Log::info("Parts File Updated");
            break;

            case "VF04_04.xlsx":
                Log::info("April File Updated");
            break;

            case "VF04_04.xlsx":
                Log::info("May File Updated");
            break;

            default:
                Log::info("File Updated Event Fire: ".$file);
        }
    }
}