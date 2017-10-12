<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;

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
        $transactions = Transaction::where('status_transaksi',2)->count();

        if ($transactions == null) {
            # code...
            $this->info('tak ada data');
        }
        else{
            $this->info('ada');
        }
        // $now =  Carbon::parse('2017-10-11 11:43:30');

        // echo $now->addMinutes(10);

        // foreach ($transactions as $transaction) {
        //     # code...
        //     $create = $transaction->create_at;
        //     $parse = Carbon::parse($create);
        //     $limit = $parse->addMinutes(30);
        //     $now = Carbon::now();
        //     $id = $Transaction->id_transaksi;

        //     if ($limit > $now) {
        //         Transaction::where('id_transaksi',$id)->update(['status_transaksi'=>2]);     
        //     }

        // }
    }
}
