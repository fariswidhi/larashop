<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use Carbon\Carbon;

class UpdateTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Update transactions';

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
        //
        $transactions = Transaction::where('status_transaksi',0)->get();
        

             
        foreach ($transactions as $transaction) {
            # code...
            $create = $transaction->created_at;
            $parse = Carbon::parse($create);
            $limit = $parse->addMinutes(30);
            $now = Carbon::now();
            $id = $transaction->id_transaksi;


            if ($now > $limit) {
                Transaction::where('id_transaksi',$id)->update(['status_transaksi'=>2]);     
                $this->info('ok');
            }
            else{
            $this->info('tidak ada');
            }



        }
    }
}
