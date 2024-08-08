<table class="table align-middle table-striped">
    <thead class="table-secondary">
        <tr>
            <th>Invoice No.</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Services</th>
            <th>Inv Date</th>
            <th>Amount</th>
            <th>Payment Id</th>
            <th>Payment Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($result as $list)
            <tr>
                <td>#{{ $list['inv_id'] }}</td>
                <td>{{ $list['cust_name'] }}</td>
                <td>{{ $list['address'] }}</td>
                <td>{{ $list['service_name'] }}</td>
                <td>{{ date('d-m-Y', strtotime($list['inv_date'])) }}</td>
                <td>Rs. {{ $list['inv_total_amt'] }}</td>
                <td>{{ $list['payment_type'] ? $list['payment_type'] : '--' }}</td>
                <td>{{ $list['payment_status'] }}</td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('admin.texts.no_data') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
