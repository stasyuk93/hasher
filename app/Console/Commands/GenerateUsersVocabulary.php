<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Services\File\UserVocabularyXml;

class GenerateUsersVocabulary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate xml file vocabulary users';

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
     * @return mixed
     */
    public function handle()
    {
        $service = new UserVocabularyXml();
        $service->generate();
    }
}
