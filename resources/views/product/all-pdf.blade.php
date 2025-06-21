<h2>All Product List</h2>
<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="background:#eee;">No</th>
            <th style="background:#eee;">Name</th>
            <th style="background:#eee;">Price</th>
            <th style="background:#eee;">Description</th>
            <th style="background:#eee;">Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $i => $product)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>