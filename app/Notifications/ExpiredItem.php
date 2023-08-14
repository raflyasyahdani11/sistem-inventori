<?php

namespace App\Notifications;

use App\Models\Barang;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExpiredItem extends Notification
{
    use Queueable;

    public Barang $barang;

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
        $namaBarang = $this->barang->nama;
        $idBarang = $this->barang->id;

        return [
            'id_barang' => $idBarang,
            'message' => "<b>$namaBarang</b> Sudah kadaluarsa !",
        ];
    }
}
