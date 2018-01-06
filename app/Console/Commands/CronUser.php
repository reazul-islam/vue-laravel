<?php

namespace App\Console\Commands;

use App\Events\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CronUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronUser:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user= new User();
        $user->where('id',1);
        event(new Event($user));
       /* $json = file_get_contents('https://jsonplaceholder.typicode.com/posts');
        DB::table('users')
            ->where('id', 1)
            ->update(['name' => str_random(10), 'json_data' => $json,'updated_at'=>Carbon::now()]);*/

        $this->info('User Name Change Successfully!');
    }
}
