<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\User;
use App\Contest;

class choseTheChosenOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chosethechosenone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that checks the winner of contests that are ended';

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
      $contestsWithoutWinner = Contest::all()->where('winner_id', NULL);

      foreach ($contestsWithoutWinner as $contest) {
        $now = Carbon::now();
        $end_date = Carbon::parse($contest->end_date);

        if ($now->gte($end_date)) {
        $winner = Contest::find($contest->id)->users()->inRandomOrder()->first();
        $winner_id = Contest::find($contest->id)->users()->inRandomOrder()->first()->id;

        $contest->winner_id = $winner_id;
        $contest->save();

        }
      }
    }
}
