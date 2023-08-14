<?php

namespace App\Listeners;

use App\Notifications\ExpiredItem;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Events\NotificationSending;

class CheckNotificationStatus
{
    /**
     * Handle the event.
     */
    public function handle(NotificationSending $event): bool
    {
        $willNotificationBeSent = true;

        if ($event->notification instanceof ExpiredItem) {
            $willNotificationBeSent = $this->handleNotifExpiredItem($event);
        }

        return $willNotificationBeSent;
    }

    public function handleNotifExpiredItem(NotificationSending $event): bool
    {
        $incomingItem = $event->notification->barang;
        $itemsNotified = $event->notifiable->notifications; // \App\Models\User->notifications

        $alreadyNotified = $itemsNotified
            ->whereBetween('created_at', [
                Carbon::now()->firstOfMonth()->toDateTimeString(),
                Carbon::now()->lastOfMonth()->hours(23)->minutes(59)->seconds(59)->toDateTimeString(),
            ])
            ->pluck('data.id_barang')
            ->contains($incomingItem->id);

        return !$alreadyNotified;
    }
}