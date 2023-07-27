<?php

namespace App\Events;

use App\Models\TransaksiKeluar;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class TransactionOutSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public TransaksiKeluar $transactionOut;

    /**
     * Create a new event instance.
     */
    public function __construct(TransaksiKeluar $transactionOut)
    {
        $this->transactionOut = $transactionOut;
    }
    
}
