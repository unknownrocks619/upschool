<?php

namespace App\Console\Commands;

use App\Jobs\CategorySyncJob;
use Illuminate\Console\Command;

class SyncBookUploadCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:wp:category:book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Wordpredd Category for book upload.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CategorySyncJob::dispatch();
        return 1;
    }
}
