<?php

namespace App\Notifications;

use App\Models\Barang;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RestockItem extends Notification
{
    use Queueable;

    private Barang $barang;

    /**
     * Create a new notification instance.
     */
    public function __construct(Barang $barang)
    {
        $this->barang = $barang;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $amount = $this->barang->jumlah;
        $namaBarang = $this->barang->nama;

        return [
            'message' => "Stok <b>$namaBarang</b> Sudah <b>$amount</b>, Ayo restock barang anda!",
        ];
    }
}
