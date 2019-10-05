<?php

namespace App\Console\Commands;

use App\Models\AdminNotification;
use App\Models\User;
use App\Notifications\SendPushNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendPushNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sending admin notification pushs';

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
        $users = User::query()->get();

        $now = Carbon::now();

        $model = AdminNotification::query()->where('date', $now);
        if($model) {
            foreach ($users as $user) {
                $user->notify(new SendPushNotification($model));
            }
        }
    }
}
