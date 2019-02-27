<?php


namespace SmallRuralDog\Store\Commands;


use Illuminate\Console\Command;
use SmallRuralDog\Store\Models\StoreTablesSeeder;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the store package';

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

        $this->call('vendor:publish --tag=store --force');


        $this->call('migrate');



        $this->info('开始更新');


        $this->call('db:seed', ['--class' => StoreTablesSeeder::class]);

        $this->info('更新成功');
    }
}
