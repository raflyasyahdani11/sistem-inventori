<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if (auth()->user()->unreadNotifications->count() > 0)
            <span class="badge badge-danger badge-counter">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @else
            <span class="badge badge-danger badge-counter"></span>
        @endif
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notifikasi
        </h6>
        @if (auth()->user()->notifications->isNotEmpty())
            @foreach (auth()->user()->notifications as $item)
                <a href="" @class(['dropdown-item', 'd-flex', 'align-items-center']) @style([
                    'background-color: rgba(165, 255, 165, 0.22)' => $item->read_at == null,
                ])>
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div @class(['font-weight-bold' => $item->read_at == null])>
                        <div class="small text-gray-500">{{ $item->created_at }}</div>
                        {{ $item->data['message'] }}
                    </div>
                </a>
            @endforeach
        @else
            <div class="dropdown-item d-flex align-items-center" href="#">
                <div class="w-100 p-3">
                    <p class="mb-0 text-center text-black-50">Opss.. Notifikasi Kosong</p>
                </div>
            </div>
        @endif
        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
            </div>
        </a> --}}
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All
            Alerts</a>
    </div>
</li>
