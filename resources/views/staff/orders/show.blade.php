<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | Staff</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body { margin:0; font-family:Arial,Helvetica,sans-serif; background:linear-gradient(135deg,#f2fbfa 0%,#f7fcfc 50%,#e9f6f5 100%); color:#234344; min-height:100vh; }
        .staff-navbar { background:linear-gradient(135deg,#0b4f50,#126968,#18817d); box-shadow:0 5px 18px rgba(0,80,80,.12); }
        .brand { color:#fff !important; text-decoration:none; font-size:17px; font-weight:700; }
        .brand-icon { width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,.13); display:inline-flex; align-items:center; justify-content:center; }
        .brand-subtitle { display:block; font-size:10px; color:rgba(255,255,255,.70); }
        .logout-btn { border:none; border-radius:9px; font-size:12px; font-weight:700; padding:8px 13px; }
        .page-wrapper { min-height:calc(100vh - 70px); padding:35px 15px 45px; }
        .page-container { max-width:950px; margin:0 auto; }
        .page-header { display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:20px; }
        .page-header h1 { margin:0; font-size:27px; font-weight:700; color:#126968; }
        .page-header p { margin:5px 0 0; color:#789090; font-size:12px; }
        .header-buttons { display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .back-btn { display:inline-flex; align-items:center; gap:6px; padding:9px 13px; border:1px solid #d6e7e5; border-radius:9px; background:#fff; color:#08716e; text-decoration:none; font-size:11px; font-weight:700; cursor:pointer; }
        .back-btn:hover { background:#eff8f7; color:#075c59; }
        .order-card { background:#fff; border:1px solid #d9ecea; border-radius:18px; overflow:hidden; box-shadow:0 7px 22px rgba(0,90,90,.07); }
        .order-card-header { padding:20px 22px; background:linear-gradient(135deg,#e3f5f3,#f5fcfb); border-bottom:1px solid #d9ecea; display:flex; align-items:center; gap:12px; }
        .header-icon { width:46px; height:46px; border-radius:12px; background:#fff; color:#08716e; display:flex; align-items:center; justify-content:center; font-size:20px; box-shadow:0 3px 10px rgba(0,90,90,.06); }
        .order-card-header h3 { margin:0; font-size:17px; font-weight:700; }
        .order-card-header p { margin:3px 0 0; font-size:11px; color:#789090; }
        .order-card-body { padding:25px; }
        .info-box { height:100%; padding:17px; border:1px solid #e1efed; border-radius:13px; background:#fbfefe; }
        .info-label { font-size:10px; text-transform:uppercase; letter-spacing:.4px; color:#829898; font-weight:700; margin-bottom:5px; }
        .info-value { font-size:15px; font-weight:700; color:#294949; }
        .amount-value { color:#08716e; font-size:19px; }
        .status-box { padding:18px; border-radius:13px; background:#f0faf9; border:1px solid #d5ece9; margin-top:20px; }
        .status-box-title { font-size:12px; font-weight:700; color:#476969; margin-bottom:9px; }
        .status-badge { display:inline-flex; align-items:center; gap:6px; padding:7px 11px; border-radius:20px; font-size:10px; font-weight:700; }
        .status-pending { background:#fff3d8; color:#a16207; }
        .status-confirmed { background:#e3f1ff; color:#2563a6; }
        .status-preparing { background:#eee7ff; color:#6542a5; }
        .status-out { background:#e2f4f7; color:#08716e; }
        .status-delivered { background:#e5f7ed; color:#19734a; }
        .status-cancelled { background:#ffe9e9; color:#c62828; }
        .update-section { margin-top:20px; padding-top:20px; border-top:1px solid #edf3f2; }
        .form-label { font-size:12px; font-weight:700; color:#476969; margin-bottom:7px; }
        .form-select { min-height:44px; border:1px solid #d5e8e6; border-radius:10px; background:#fbfefe; font-size:13px; }
        .form-select:focus { border-color:#66aaa6; box-shadow:0 0 0 .2rem rgba(24,129,125,.10); }
        .update-btn { margin-top:10px; border:none; border-radius:9px; background:linear-gradient(135deg,#0b6d6a,#18817d); color:#fff; padding:10px 17px; font-size:12px; font-weight:700; }
        .update-btn:hover { background:linear-gradient(135deg,#095b59,#126e6b); color:#fff; }
        .cancelled-notice,.printed-notice { margin:0; padding:15px 17px; border-radius:11px; font-size:12px; line-height:1.5; }
        .cancelled-notice { border:1px solid #f2c7c7; background:#fff4f4; color:#a52a2a; }
        .printed-notice { border:1px solid #bde5d0; background:#f0fbf5; color:#19734a; }
        .cancelled-notice-title,.printed-notice-title { font-weight:700; margin-bottom:3px; }
        .print-note { margin-top:15px; font-size:10px; color:#789090; }
        .custom-alert { border:none; border-radius:11px; font-size:12px; }
        @media (max-width:767px){ .page-wrapper{padding:25px 12px 35px}.page-header{align-items:flex-start;flex-direction:column}.header-buttons{width:100%}.back-btn{width:auto;justify-content:center}.order-card-body{padding:18px} }
        @media (max-width:480px){ .header-buttons{flex-direction:column;align-items:stretch}.back-btn{width:100%} }
    </style>
</head>
<body>

<nav class="navbar staff-navbar">
    <div class="container-fluid px-3 px-md-4">
        <a href="{{ route('staff.dashboard') }}" class="brand d-flex align-items-center gap-2">
            <span class="brand-icon"><i class="bi bi-droplet-fill"></i></span>
            <span>Water Station<span class="brand-subtitle">Staff Panel</span></span>
        </a>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-light logout-btn">
                <i class="bi bi-box-arrow-right me-1"></i>
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="page-wrapper">
    <div class="page-container">

        <div class="page-header">
            <div>
                <h1>Order Details</h1>
                <p>Review the customer order and update its status.</p>
            </div>

            <div class="header-buttons">
                <button type="button" class="back-btn" onclick="goBackToOrders()">
                    <i class="bi bi-arrow-left"></i>
                    Back to Orders
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success custom-alert mb-3">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger custom-alert mb-3">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger custom-alert mb-3">
                <strong>Please check the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="order-card">
            <div class="order-card-header">
                <div class="header-icon"><i class="bi bi-receipt"></i></div>
                <div>
                    <h3>Order #{{ $order->id }}</h3>
                    <p>Customer order information</p>
                </div>
            </div>

            <div class="order-card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="info-box">
                            <div class="info-label">Order ID</div>
                            <div class="info-value">#{{ $order->id }}</div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="info-box">
                            <div class="info-label">Customer</div>
                            <div class="info-value">{{ $order->customer_name }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Product</div>
                            <div class="info-value">{{ $order->product_name }}</div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Quantity</div>
                            <div class="info-value">{{ $order->quantity }}</div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Total Amount</div>
                            <div class="info-value amount-value">
                                ₱{{ number_format($order->total_amount ?? $order->total_price ?? 0, 2) }}
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $status = strtolower(trim($order->status ?? 'pending'));
                    $isCancelled = in_array($status, ['cancelled','canceled']);
                    $isPrinted = (bool) ($order->is_printed ?? false);
                @endphp

                <div class="status-box">
                    <div class="status-box-title">Current Order Status</div>

                    @if($status === 'pending')
                        <span class="status-badge status-pending"><i class="bi bi-clock"></i>Pending</span>
                    @elseif($status === 'confirmed')
                        <span class="status-badge status-confirmed"><i class="bi bi-check-circle"></i>Confirmed</span>
                    @elseif($status === 'preparing')
                        <span class="status-badge status-preparing"><i class="bi bi-box-seam"></i>Preparing</span>
                    @elseif($status === 'out_for_delivery' || $status === 'out for delivery' || $status === 'out')
                        <span class="status-badge status-out"><i class="bi bi-truck"></i>Out for Delivery</span>
                    @elseif($status === 'delivered')
                        <span class="status-badge status-delivered"><i class="bi bi-check-circle-fill"></i>Delivered</span>
                    @elseif($isCancelled)
                        <span class="status-badge status-cancelled"><i class="bi bi-x-circle"></i>Cancelled</span>
                    @else
                        <span class="status-badge status-pending">{{ ucfirst(str_replace('_',' ',$status)) }}</span>
                    @endif
                </div>

                <div class="update-section">
                    @if($isCancelled)
                        <div class="cancelled-notice">
                            <div class="cancelled-notice-title">
                                <i class="bi bi-lock-fill me-1"></i>
                                Order Cancelled
                            </div>
                            <div>This order was cancelled by the customer and can no longer be updated by staff.</div>
                        </div>
                    @elseif($isPrinted)
                        <div class="printed-notice">
                            <div class="printed-notice-title">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                Order Already Printed
                            </div>
                            <div>This order has already been printed. It is now read-only and can no longer be updated by staff.</div>
                        </div>
                    @else
                        <form action="{{ route('staff.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-2">
                                <label for="status" class="form-label">Update Order Status</label>

                                <select name="status" id="status" class="form-select" required>
                                    <option value="Pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Confirmed" {{ $status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="Preparing" {{ $status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                                    <option value="Out for Delivery" {{ in_array($status,['out for delivery','out_for_delivery','out']) ? 'selected' : '' }}>Out for Delivery</option>
                                    <option value="Delivered" {{ $status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </div>

                            <button type="submit" class="update-btn">
                                <i class="bi bi-arrow-repeat me-1"></i>
                                Update Status
                            </button>
                        </form>
                    @endif
                </div>

                @if($isPrinted)
                    <div class="print-note">
                        <i class="bi bi-info-circle me-1"></i>
                        This order has already been printed and is now read-only.
                    </div>
                @elseif($status === 'delivered')
                    <div class="print-note">
                        <i class="bi bi-info-circle me-1"></i>
                        This order is delivered. You can print the receipt from the Orders page.
                    </div>
                @elseif($isCancelled)
                    <div class="print-note">
                        <i class="bi bi-info-circle me-1"></i>
                        This order is cancelled and no further status updates are allowed.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function goBackToOrders() {
    if (window.history.length > 1) {
        window.history.back();
        return;
    }

    window.location.replace("{{ route('staff.orders.index') }}");
}
</script>

</body>
</html>
