<?php

namespace App\Console\Commands;

use App\Jobs\OrganisationSyncJob;
use Illuminate\Console\Command;

class SyncWPOrganisation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:wp:organisations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports All Projects from wordpress to larave.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        OrganisationSyncJob::dispatch();
        return 1;
    }
}
