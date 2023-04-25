<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div style="display:flex">
    <div class="container-fluid py-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Dishes</h5>
                <p class="card-text">Total dishes for Today is: {{ \App\Models\Items::count() }}</p>
                <a href="#" class="btn btn-primary">Check</a>
            </div>
        </div>

    </div>

    @if(@Auth::user()->roles->role_name === 'superadmin' )
    <div class="container-fluid py-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Restaurants</h5>
                <p class="card-text">Total sale for Today is: {{ \App\Models\User::where('role',4)->count() }}</p>
                <a href="manageuser" class="btn btn-primary">Check</a>
            </div>
        </div>
    </div>
    @endif
    <div class="container-fluid py-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text">Total orders for Today is:{{ \App\Models\Order::count() }}</p>
                <a href="#" class="btn btn-primary">Check</a>
            </div>
        </div>

    </div>

    

    </div>
  
</div>
</div>
@push('js')
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>

@endpush