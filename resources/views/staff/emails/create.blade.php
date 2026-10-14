<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent Emails | Staff</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f9f8;
            color: #234344;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #0b4f50, #126968 55%, #18817d);
            color: white;
            z-index: 3000;
            overflow-y: auto;
            transition: .3s ease;
            box-shadow: 6px 0 22px rgba(0, 78, 79, .16);
        }

        .sidebar.hidden {
            left: -260px;
        }

        .sidebar-header {
            height: 70px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,.16);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(255,255,255,.14);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.18);
            font-size: 20px;
        }

        .close-sidebar {
            width: 34px;
            height: 34px;
            border: none;
            background: transparent;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 19px;
            border-radius: 8px;
        }

        .close-sidebar:hover,
        .logout-link:hover {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar-menu {
            padding: 18px 12px;
        }

        .menu-title {
            padding: 8px 12px;
            margin-bottom: 5px;
            color: rgba(255,255,255,.58);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: rgba(255,255,255,.88);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar a i,
        .logout-link i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.15);
            color: white;
            transform: translateX(2px);
        }

        .logout-link {
            width: 100%;
            border: none;
            background: transparent;
            color: rgba(255,255,255,.88);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            min-height: 100vh;
            transition: .3s ease;
        }

        .main.expanded {
            margin-left: 0;
        }

        /* TOPBAR */
        .topbar {
            height: 68px;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid #d8eceb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 2500;
            box-shadow: 0 3px 15px rgba(0,100,100,.05);
        }

        .menu-btn {
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 9px;
            background: #e2f5f3;
            color: #08716e;
            font-size: 21px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .menu-btn:hover {
            background: #d2efec;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-image,
        .profile-placeholder {
            width: 38px;
            height: 38px;
            border-radius: 50%;
        }

        .profile-image {
            object-fit: cover;
            border: 2px solid #b9dfdc;
        }

        .profile-placeholder {
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .profile-name {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
            color: #234344;
        }

        .profile-role {
            margin: 2px 0 0;
            color: #08716e;
            font-size: 10px;
        }

        /* PAGE CONTENT */
        .content {
            padding: 35px 28px 110px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            padding-bottom: 24px;
            border-bottom: 1px solid #d8eceb;
            margin-bottom: 28px;
        }

        .page-heading h2 {
            color: #126968;
            font-size: 29px;
            font-weight: 700;
            margin: 0 0 8px;
        }

        .page-heading p {
            color: #668080;
            margin: 0;
            font-size: 15px;
        }

        .history-title {
            color: #126968;
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .history-card {
            background: white;
            border: 1px solid #d5e8e6;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 6px 18px rgba(0,90,90,.07);
        }

        .history-card .table {
            margin-bottom: 0;
        }

        .history-card thead th {
            background: #eaf7f6;
            color: #567575;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .3px;
            font-weight: 700;
            padding: 14px;
            border-bottom: 1px solid #d8ecea;
            white-space: nowrap;
        }

        .history-card tbody td {
            padding: 15px 14px;
            font-size: 13px;
            vertical-align: middle;
            color: #526f6f;
        }

        .history-card tbody tr {
            border-color: #e8f0ef;
        }

        .sent-badge {
            display: inline-block;
            background: #dff5e8;
            color: #187343;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .message-preview {
            max-width: 260px;
            overflow-wrap: anywhere;
        }

        .view-email-btn {
            border: 1px solid #b9dfdc;
            background: #effaf9;
            color: #08716e;
            border-radius: 8px;
            padding: 7px 11px;
            font-size: 12px;
            font-weight: 700;
        }

        .view-email-btn:hover {
            background: #dff3f1;
        }

        /* FIXED COMPOSE BUTTON */
        .compose-floating {
            position: fixed;
            right: 28px;
            bottom: 28px;
            z-index: 2000;
            border: none;
            border-radius: 50px;
            padding: 16px 28px;
            background: #d9e9ff;
            color: #0753a5;
            font-size: 16px;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(0,70,140,.15);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: .2s ease;
        }

        .compose-floating:hover {
            background: #c6ddff;
            color: #06488f;
            transform: translateY(-2px);
        }

        /* MODALS - ALWAYS ABOVE SIDEBAR */
        .modal-backdrop {
            z-index: 4990 !important;
        }

        .modal {
            z-index: 5000 !important;
        }

        .modal-dialog {
            max-width: 850px;
        }

        .modal-content {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.2);
        }

        .modal-header {
            background: #f2f7ff;
            border-bottom: 1px solid #e0e8f0;
            padding: 20px 28px;
        }

        .modal-title {
            color: #34515a;
            font-size: 18px;
            font-weight: 700;
        }

        .modal-body {
            padding: 25px 30px;
        }

        .compose-label {
            color: #456064;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .compose-control {
            border: none;
            border-bottom: 1px solid #d9e2e7;
            border-radius: 0;
            padding: 13px 7px;
            font-size: 15px;
            box-shadow: none !important;
        }

        .compose-control:focus {
            border-bottom: 2px solid #18817d;
        }

        .compose-message {
            min-height: 230px;
            resize: vertical;
        }

        .compose-note {
            color: #829397;
            font-size: 12px;
            padding-top: 14px;
            border-top: 1px solid #e2e9ed;
            margin-top: 15px;
        }

        .send-email-btn {
            background: #126968;
            border: none;
            color: white;
            border-radius: 9px;
            padding: 10px 22px;
            font-weight: 700;
        }

        .send-email-btn:hover {
            background: #0b4f50;
            color: white;
        }

        .email-view-label {
            color: #789092;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .email-view-value {
            color: #263f42;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        .email-view-message {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            line-height: 1.7;
            min-height: 150px;
            padding-top: 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.open {
                left: 0;
            }

            .main {
                margin-left: 0;
            }

            .content {
                padding: 25px 20px 100px;
            }

            .topbar {
                padding: 0 20px;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 22px 13px 100px;
            }

            .topbar {
                height: 62px;
                padding: 0 14px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .page-heading h2 {
                font-size: 24px;
            }

            .history-card {
                padding: 12px;
            }

            .compose-floating {
                right: 16px;
                bottom: 18px;
                padding: 14px 21px;
            }

            .modal-body {
                padding: 20px 18px;
            }

            .modal-header {
                padding: 17px 18px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>
                <div>Water Station</div>
            </div>

            <button type="button" class="close-sidebar" id="closeSidebar" title="Close Sidebar">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="menu-title">Main Menu</div>

            <a href="{{ route('staff.dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <a href="{{ route('staff.orders.index') }}"
               class="{{ request()->routeIs('staff.orders.*') ? 'active' : '' }}">
                <i class="bi bi-cart-check-fill"></i> Orders
            </a>

            <a href="{{ route('staff.products.index') }}"
               class="{{ request()->routeIs('staff.products.*') ? 'active' : '' }}">
                <i class="bi bi-droplet-fill"></i> Products
            </a>

            <a href="{{ route('staff.inventory.index') }}"
               class="{{ request()->routeIs('staff.inventory.*') ? 'active' : '' }}">
                <i class="bi bi-boxes"></i> Inventory
            </a>

            <a href="{{ route('staff.deliveries.index') }}"
               class="{{ request()->routeIs('staff.deliveries.*') ? 'active' : '' }}">
                <i class="bi bi-truck"></i> Deliveries
            </a>

            <a href="{{ route('staff.emails.create') }}"
               class="{{ request()->routeIs('staff.emails.*') ? 'active' : '' }}">
                <i class="bi bi-envelope-fill"></i> Email Notifications
            </a>

            <div class="menu-title mt-3">Account</div>

            <a href="{{ route('staff.account') }}">
                <i class="bi bi-person-circle"></i> My Account
            </a>

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="logout-link">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main" id="main">

        <!-- TOPBAR -->
        <nav class="topbar">
            <button type="button" class="menu-btn" id="menuButton" title="Open Sidebar">
                <i class="bi bi-list"></i>
            </button>

            <div class="profile">
                @if(auth()->user()->profile_picture)
                    <img
                        src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                        alt="Profile"
                        class="profile-image"
                    >
                @else
                    <div class="profile-placeholder">
                        <i class="bi bi-person-fill"></i>
                    </div>
                @endif

                <div>
                    <p class="profile-name">{{ auth()->user()->name }}</p>
                    <p class="profile-role">Staff</p>
                </div>
            </div>
        </nav>

        <!-- PAGE CONTENT -->
        <main class="content">

            

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please check the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- SENT EMAIL HISTORY -->
            <h4 class="history-title">
                <i class="bi bi-clock-history me-2"></i>
                Sent Email History
            </h4>

            <div class="history-card">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    

                    <span class="badge text-bg-success px-3 py-2">
                        {{ $sentEmails->count() }} Sent
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Recipient</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date Sent</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($sentEmails as $email)
                                <tr>
                                    <td>
                                        <strong>{{ $email->recipient_name }}</strong><br>
                                        <small class="text-muted">{{ $email->recipient_email }}</small>
                                    </td>

                                    <td>{{ $email->subject }}</td>

                                    <td>
                                        <div class="message-preview">
                                            {{ \Illuminate\Support\Str::limit($email->message, 55) }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $email->sent_at
                                            ? \Carbon\Carbon::parse($email->sent_at)->format('M d, Y h:i A')
                                            : '—' }}
                                    </td>

                                    <td>
                                        <span class="sent-badge">Sent</span>
                                    </td>

                                    <td>
                                        <button
                                            type="button"
                                            class="view-email-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewEmailModal"
                                            data-recipient="{{ $email->recipient_name }}"
                                            data-recipient-email="{{ $email->recipient_email }}"
                                            data-subject="{{ $email->subject }}"
                                            data-message="{{ $email->message }}"
                                            data-date="{{ $email->sent_at
                                                ? \Carbon\Carbon::parse($email->sent_at)->format('M d, Y h:i A')
                                                : '—' }}"
                                        >
                                            <i class="bi bi-envelope-open me-1"></i> View
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-envelope-open" style="font-size:32px;"></i>
                                        <p class="mt-2 mb-1">No sent emails yet.</p>
                                        <small>Your sent email records will appear here.</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- FIXED COMPOSE BUTTON -->
    <button
        type="button"
        class="compose-floating"
        data-bs-toggle="modal"
        data-bs-target="#composeModal"
    >
        <i class="bi bi-pencil-square"></i>
        Compose
    </button>

    <!-- COMPOSE EMAIL MODAL -->
    <div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="composeModalLabel">
                        <i class="bi bi-pencil-square me-2"></i>
                        New Message
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('staff.emails.send') }}" method="POST">
                    @csrf

                    <div class="modal-body">

                        <div class="mb-4">
                            <label for="customer_id" class="compose-label">To</label>

                            <select
                                name="customer_id"
                                id="customer_id"
                                class="form-select compose-control"
                                required
                            >
                                <option value="">Choose a customer</option>

                                @foreach($customers as $customer)
                                    <option
                                        value="{{ $customer->id }}"
                                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}
                                    >
                                        {{ $customer->name }} — {{ $customer->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="compose-label">Subject</label>

                            <input
                                type="text"
                                name="subject"
                                id="subject"
                                class="form-control compose-control"
                                placeholder="Enter email subject"
                                value="{{ old('subject') }}"
                                maxlength="255"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="message" class="compose-label">Message</label>

                            <textarea
                                name="message"
                                id="message"
                                class="form-control compose-control compose-message"
                                placeholder="Write your email message here..."
                                maxlength="5000"
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="compose-note">
                            <i class="bi bi-info-circle me-2"></i>
                            This email will be sent to the selected customer's registered email address.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="btn send-email-btn"
                            {{ $customers->isEmpty() ? 'disabled' : '' }}
                        >
                            <i class="bi bi-send-fill me-2"></i>
                            Send Email
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- VIEW SENT EMAIL MODAL -->
    <div class="modal fade" id="viewEmailModal" tabindex="-1" aria-labelledby="viewEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="viewEmailModalLabel">
                        <i class="bi bi-envelope-open me-2"></i>
                        Sent Message
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <div class="email-view-label">TO</div>
                        <div class="email-view-value" id="viewRecipient"></div>
                        <div class="text-muted small" id="viewRecipientEmail"></div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="email-view-label">SUBJECT</div>
                        <div class="email-view-value fw-semibold" id="viewSubject"></div>
                    </div>

                    <hr>

                    <div class="mb-2">
                        <div class="email-view-label">MESSAGE</div>
                        <div class="email-view-message" id="viewMessage"></div>
                    </div>

                    <hr>

                    <div class="text-muted small">
                        <i class="bi bi-clock me-1"></i>
                        Sent: <span id="viewDate"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');
        const menuButton = document.getElementById('menuButton');
        const closeSidebar = document.getElementById('closeSidebar');

        // SIDEBAR TOGGLE
        menuButton.addEventListener('click', function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.add('open');
            } else {
                sidebar.classList.toggle('hidden');
                main.classList.toggle('expanded');
            }
        });

        closeSidebar.addEventListener('click', function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.remove('open');
            } else {
                sidebar.classList.add('hidden');
                main.classList.add('expanded');
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 991) {
                sidebar.classList.remove('open');
            }
        });

        // SHOW SENT EMAIL DETAILS
        const viewEmailModal = document.getElementById('viewEmailModal');

        viewEmailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            document.getElementById('viewRecipient').textContent =
                button.getAttribute('data-recipient') || '';

            document.getElementById('viewRecipientEmail').textContent =
                button.getAttribute('data-recipient-email') || '';

            document.getElementById('viewSubject').textContent =
                button.getAttribute('data-subject') || '';

            document.getElementById('viewMessage').textContent =
                button.getAttribute('data-message') || '';

            document.getElementById('viewDate').textContent =
                button.getAttribute('data-date') || '';
        });

        // REOPEN COMPOSE MODAL IF VALIDATION HAS ERRORS
        @if($errors->any())
            const composeModal = new bootstrap.Modal(document.getElementById('composeModal'));
            composeModal.show();
        @endif
    </script>

</body>
</html>