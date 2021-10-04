@extends('layouts.app')
@section('title','PCF - PCF Create Request')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">PCF Request</h1>
                </div>

                <div class="">
                    <a href="{{ route('PCF.index') }}" class="btn btn-sm btn-light mr-2"><i class="fas fa-arrow-circle-left"></i> Back to index page</a>
                </div>
                <br>
                
                @include('PCF.sub.partials.items')
                @include('PCF.sub.partials.foc')
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('PCF.store') }}" method="post">
                                    @csrf
                                    <!-- Left Element -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pcf_no">PCF No.</label>
                                                <input type="text" class="form-control @error('pcf_no') is-invalid @enderror" name="pcf_no" id="pcf_no"
                                                    value="{{ old('pcf_no', $pcf_no) }}" required readonly>

                                                @error('pcf_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date"
                                                    value="{{ \Carbon\Carbon::now()->toDateString() }}" required readonly>

                                                @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institution">Institution</label>
                                                <textarea class="form-control @error('institution') is-invalid @enderror" name="institution" id="institution" cols="5"
                                                    rows="3" required>{{ old('institution') }}</textarea>

                                                @error('institution')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="5"
                                                    rows="3">{{ old('address') }}</textarea>

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contact_person">Contact Person</label>
                                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" id="contact_person"
                                                    value="{{ old('contact_person') }}" required>

                                                @error('contact_person')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation"
                                                    value="{{ old('designation') }}">

                                                @error('designation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="thru_duration_contract">Thru Designation</label>
                                                <input type="text" class="form-control @error('thru_designation') is-invalid @enderror" name="thru_designation" id="thru_duration_contract"
                                                    value="{{ old('thru_designation') }}">

                                                @error('thru designation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="institution">Supplier/Manufacturer</label>
                                                <input type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier" id="supplier"
                                                    value="{{ old('supplier') }}" required>

                                                @error('supplier')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="terms">Terms</label>
                                                <input type="text" class="form-control @error('terms') is-invalid @enderror" name="terms" id="terms"
                                                    value="{{ old('terms') }}" required>

                                                @error('terms')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="validity">Validity</label>
                                                <input type="text" class="form-control @error('validity') is-invalid @enderror" name="validity" id="validity"
                                                    value="{{ old('validity') }}" required>
                                                
                                                @error('validity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="delivery">Delivery</label>
                                                <input type="text" class="form-control @error('delivery') is-invalid @enderror" name="delivery" id="delivery"
                                                    value="{{ old('delivery') }}" required>

                                                @error('delivery')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="warranty">Warranty (For Machines Only)</label>
                                                <input type="text" class="form-control @error('warranty') is-invalid @enderror" name="warranty" id="warranty"
                                                    value="{{ old('warranty') }}">

                                                @error('warranty')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contract_duration">Duration of Contract</label>
                                                <input type="number" class="form-control @error('contract_duration') is-invalid @enderror" name="contract_duration" id="contract_duration"
                                                    value="{{ old('contract_duration') }}" required>

                                                @error('contract_duration')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bid_docs_price">Date Bidding</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="checkbox" id="dateBiddingCheckBox" aria-label="Checkbox for following date input">
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control @error('date_bidding') is-invalid @enderror" name="date_bidding" id="date_bidding"
                                                        value="{{ old('date_bidding') }}">
                                                    
                                                    @error('date_bidding')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bid_docs_price">Bid Docs Price</label>
                                                <input type="number" class="form-control @error('bid_docs_price') is-invalid @enderror" name="bid_docs_price" id="bid_docs_price"
                                                    value="{{ old('bid_docs_price') }}">

                                                @error('bid_docs_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="manager">Manager</label>
                                                <select class="form-control @error('manager') is-invalid @enderror" name="manager" id="manager" required>
                                                    <option value="" selected disabled>Select Manager</option>
                                                    <option value="Rachelle Anne Carrera">Rachelle Anne Carrera</option>
                                                    <option value="Gloria Cutang">Gloria Cutang</option>
                                                    <option value="Gilbert Gravata">Gilbert Gravata</option>
                                                </select>

                                                @error('manager')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="annual_profit">Annual Profit</label>
                                                <input type="text" class="form-control @error('annual_profit') is-invalid @enderror" name="annual_profit" id="annual_profit"
                                                    value="{{ old('annual_profit','0') }}" readonly required> 

                                                @error('annual_profit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="annual_profit_rate">Annual Profit Rate</label>
                                                <input type="text" class="form-control @error('annual_profit_rate') is-invalid @enderror" name="annual_profit_rate" id="annual_profit_rate"
                                                    value="{{ old('annual_profit_rate', '0') }}" readonly required>

                                                @error('annual_profit_rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Right Element -->
                                    <button type="submit" class="btn btn-primary float-right">{{ __('Add PCF Request') }}</button>
                                    <a href="{{ route('PCF.index') }}" class="btn btn-link float-right mr-2">{{ __('Cancel') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Modal Component -->

        <!-- End of Modal Component -->
        <!-- Footer -->
        @include('layouts.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('scripts')
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    //scripts for pcfList, starts here;
    document.addEventListener('DOMContentLoaded', function() {
        $('#pcfItem_datatable').DataTable({
            "stripeClasses": [],
            processing: false,
            serverSide: true,
            responsive: true,
            searchable: true,
            ordering: true,
            ajax: {
                url : "{{ route('PCF.sub.item_list', $pcf_no) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            columns: [
                { data: 'source.item_code' },
                { data: 'source.description' },
                { data: 'quantity' },
                { data: 'sales' },
                { data: 'total_sales' },
                { data: 'action' },
            ],
        });
        getGrandTotal();
    });

    //start of select2 function -- item_code
    $(function () {
        $('#source_item_code-i').select2({
            width: 'resolve',
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'Item code',
            ajax: {
                delay: 250,
                url: '{{ route("settings.source.source_search") }}',
                dataType: 'json',
            },
        });
    });

    $('#source_item_code-i').on('select2:select', function (e) {
        var data = e.params.data;
        var source_id = data.id
        if(source_id) {
            $.ajax({
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/settings.source/get-description/source=' + source_id,
                contentType: "application/json; charset=utf-8",
                cache: false,
                dataType: 'json',
            }).done(function(data) {
                document.getElementById("description-i").value = data.description;
                document.getElementById("currency_rate-i").value = data.currency_rate;
                document.getElementById("tp_php-i").value = data.tp_php;
                document.getElementById("cost_of_peripherals-i").value = data.cost_of_peripherals;

                document.getElementById("quantity-i").disabled = false;
                document.getElementById("sales-i").disabled = false;

                calculateOpex();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                Toast.fire({
                    icon: 'error',
                    title: 'Oops! Something went wrong.',
                    text: 'Please contact your system administrator.'
                })
                clearItemInputs();
            });
        }
    });

    $( "#source_item_code-i" ).on('change', function(e) {
        clearItemInputs();
        document.getElementById("quantity-i").disabled = true;
        document.getElementById("sales-i").disabled = true;
    });
    //end of select2 function

    const element = document.querySelectorAll('#sales-i, #quantity-i');
    element.forEach(i => {
        i.addEventListener('input', function() {
            calculateTotalSales();
            calculateNetSales();
            calculateGrossProfit();
            calculateTotalGrossProfit();
            calculateTotalNetSales();
            calculateProfitRate();
        });
    })

    //Total Sales Function
    function calculateTotalSales() {
        var quantity = $("#quantity-i").val();
        var sales = $("#sales-i").val();
        var total_sales = sales * quantity;
        $("#total_sales-i").val(total_sales.toFixed(2));
    }

    //Opex function
    function calculateOpex() {
        var currency_rate = $("#currency_rate-i").val();
        var transfer_price = $("#tp_php-i").val();
        var cost_of_peripherals = $("#cost_of_peripherals-i").val();
        
        if (parseInt(currency_rate) == 1 && cost_of_peripherals !== '') {
            var opex = transfer_price * 1.15 + parseFloat(cost_of_peripherals);
        } 
        else if (parseInt(currency_rate) == 1 && cost_of_peripherals == '') {
            var opex = transfer_price * 1.13 + 0;
        }
        else if (parseInt(currency_rate) !== 1 && cost_of_peripherals !== '') {
            var opex = transfer_price * 1.15 + parseFloat(cost_of_peripherals);
        } 
        else {
            var opex = transfer_price * 1.3 + 0;
        }

        $("#opex-i").val(opex.toFixed(2));
    }

    //Net Sales function
    function calculateNetSales() {
        var sales = $("#sales-i").val();
        var net_sales = sales / 1.12;

        $("#net_sales-i").val(net_sales.toFixed(2));
    }

    //Gross Profit Function
    function calculateGrossProfit() {
        var net_sales = $("#net_sales-i").val();
        var opex = $("#opex-i").val();

        var gross_profit = net_sales - opex;

        $("#gross_profit-i").val(gross_profit.toFixed(2));
    }

    //Total Gross Profit Function
    function calculateTotalGrossProfit() {
        var gross_profit = $("#gross_profit-i").val();
        var quantity = $("#quantity-i").val();
        
        var total_gross_profit = gross_profit * quantity;

        $("#total_gross_profit-i").val(total_gross_profit.toFixed(2));
    }

    //Total Net Sales Function
    function calculateTotalNetSales() {
        var total_sales = $("#total_sales-i").val();

        var total_net_sales = total_sales / 1.12;

        $("#total_net_sales-i").val(total_net_sales.toFixed(2));
    }

    //Profit Rate Function
    function calculateProfitRate() {
        var gross_profit = $("#gross_profit-i").val();
        var sales = $("#sales-i").val();

        var profit_rate = (gross_profit / sales) * 100;

        $("#profit_rate-i").val(profit_rate.toFixed(0));
    }

    function clearItemInputs() {
        $("#item_code-i").val("");
        $("#description-i").val("");
        $("#rate-i").val("");
        $("#tp_php-i").val("");
        $("#cost_periph-i").val("");
        $("#quantity-i").val("");
        $("#sales-i").val("");
        $("#total_sales-i").val("");
        $("#opex-i").val("");
        $("#net_sales-i").val("");
        $("#gross_profit-i").val("");
        $("#total_gross_profit-i").val("");
        $("#total_net_sales-i").val("");
        $("#profit_rate-i").val("");
    }

    //delete item from pcfList table
    let item_id;
    $('#pcfItem_datatable').on('click', '.pcfListDelete', function (e) {
        e.preventDefault();
        item_id = $(this).data('id');
        Swal.fire({
            title: 'Remove this item?',
            text: "This item will be removed from the current session",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: '/PCF.sub/ajax/delete/pcf-list/' + item_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function(response) {
                    $('#pcfItem_datatable').DataTable().ajax.reload();
                    getGrandTotal()
                    Toast.fire({
                        icon: 'success',
                        title: 'Removed',
                        text: 'The product has been removed from the current item listing.'
                    })
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Oops! Something went wrong.',
                        text: 'Please contact your system administrator.'
                    })
                });
            }
        })
    })
    </script>

    <script>
    //scripts for pcfInclusion, starts here;
    $(function() {
        $('#pcfFOC_dataTable').DataTable({
            "stripeClasses": [],
            processing: false,
            serverSide: true,
            responsive: true,
            searchable: true,
            ordering: true,
            ajax: {
                url : "{{ route('PCF.sub.foc_list', $pcf_no) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            columns: [
                { data: 'source.item_code' },
                { data: 'source.description' },
                { data: 'serial_no' },
                { data: 'type' },
                { data: 'quantity' },
                { data: 'action' },
            ],
        });
        getGrandTotal();
    });

    //start of select2 function -- machine item code;
    $(function () {
        $('#source_item_code-foc').select2({
            width: 'resolve',
            allowClear: true,
            minimumInputLength: 3,
            placeholder: 'Item code',
            ajax: {
                delay: 250,
                url: '{{ route("settings.source.source_search") }}',
                dataType: 'json',
            },
        });
    });

    $('#source_item_code-foc').on('select2:select', function (e) {
        var data = e.params.data;
        var source_id = data.id
        if(source_id) {
            $.ajax({
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/settings.source/get-description/source=' + source_id,
            contentType: "application/json; charset=utf-8",
            cache: false,
            dataType: 'json',
            }).done(function(data) {
                $('#description-foc').val(data.description);
                $("#tp_php-foc").val(data.tp_php);
                $("#cost_of_peripherals-foc").val(data.cost_of_peripherals);

                calculateOpexFOC();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                Toast.fire({
                    icon: 'error',
                    title: 'Oops! Something went wrong.',
                    text: 'Please contact your system administrator.'
                })
                clearFOCInputs();
            });
        }
    });

    $("#source_item_code-foc").on('change', function(e) {
        clearFOCInputs();
    });
    //end of select2 function;

    //FOC Opex Function
    function calculateOpexFOC()
    {
        var transfer_price = $("#tp_php-foc").val();
        var cost_of_peripherals = parseFloat($("#cost_of_peripherals-foc").val());

        if (isNaN(cost_of_peripherals)) {
            var opex = (transfer_price * 1.3) + 0;
        }
        else {
            var opex = (transfer_price * 1.13) + cost_of_peripherals;
        }

        $("#opex-foc").val(opex.toFixed(2));
    }

    // on quantity input, calculate total cost and yearly cost
    const foc_element = document.querySelectorAll('#quantity-foc');
    foc_element.forEach(i => {
        i.addEventListener('input', function() {
            calculateTotalCostandYearlyCost();
        });
    })

    //on type change, calculate total cost and yearly cost
    $("#type-foc").on('change', function(e) {
        calculateTotalCostandYearlyCost();
        var target = $("#type-foc").val();
        if (target == "MACHINE")
        {
            $("#depreciable_life-foc").val(5);
        }
        else if (target == "COGS")
        {
            $("#depreciable_life-foc").val(1);
        }
    });

    //Total Cost and Yearly Cost Function
    function calculateTotalCostandYearlyCost() {
        var quantity = $("#quantity-foc").val();
        var opex = $("#opex-foc").val();
        var total_cost = opex * quantity;
        var depreciation_life = 0;

        var target = $("#type-foc").val();

        if (target == "MACHINE"){
            depreciation_life = 5;
        }else if (target == "COGS"){
            depreciation_life = 1;
        }
        
        var cost_year = total_cost / depreciation_life;

        $("#total_cost-foc").val(total_cost.toFixed(2));
        $("#cost_year-foc").val(cost_year.toFixed(2));
    }

    function clearFOCInputs() {
        $("#item_code-foc").val("");
        $("#description-foc").val("");
        $("#type-foc").val("");
        $("#tp_php-foc").val("");
        $("#cost_of_peripherals-foc").val("");
        $("#opex-foc").val("");
        $("#serial_no-foc").val("N / A");
        $("#quantity-foc").val("");
        $("#cost_year-foc").val("");
        $("#total_cost-foc").val("");
        $("#depreciable_life-foc").val("");
    }

    let foc_id;
    $('#pcfFOC_dataTable').on('click', '.pcfInclusionDelete', function (e) {
        e.preventDefault();
        foc_id = $(this).data('id');
        Swal.fire({
            title: 'Remove this item?',
            text: "This item will be removed from the current session",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: '/PCF.sub/ajax/delete/pcf-foc/' + foc_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function(response) {
                    $('#pcfFOC_dataTable').DataTable().ajax.reload();
                    getGrandTotal();
                    Toast.fire({
                        icon: 'success',
                        title: 'Removed',
                        text: 'The product has been removed from the current item listing.'
                    })
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Oops! Something went wrong.',
                        text: 'Please contact your system administrator.'
                    })
                });
            }
        })
    })

    function getGrandTotal() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url : "{{ route('PCF.sub.get_grand_total', $pcf_no) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(response) {
            document.getElementById("annual_profit").value = response.annual_profit;
            document.getElementById("annual_profit_rate").value = response.annual_profit_rate;
        }).fail(function(jqXHR, textStatus, errorThrown) {
            Toast.fire({
                icon: 'error',
                title: 'Oops! Something went wrong.',
                text: 'Please contact your system administrator.'
            })
        });
    }
    </script>

    <script>
        var now = new Date(),
        minDate = now.toISOString().substring(0,10);

        $('#date_bidding').prop('min', minDate);
    </script>

    <script>
        $(function() {
            const ckbox = document.getElementById('dateBiddingCheckBox');
            ckbox.checked == true
                ? document.getElementById("date_bidding").disabled = true
                : document.getElementById("date_bidding").disabled = false
        });
    </script>
@endsection