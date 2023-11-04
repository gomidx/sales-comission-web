<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;

class DailyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sales report email of the day to each seller.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailService = new EmailService();

        $emailService->sendToAllSellers();
    }
}
