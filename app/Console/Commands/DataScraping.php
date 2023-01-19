<?php

namespace App\Console\Commands;

use Log;
use App\Http\Controllers\Admin\ScraperController;
use Illuminate\Console\Command;

class DataScraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datascraping:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scraping from another website.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Weekly data scraping from another websites.');
    }
}
