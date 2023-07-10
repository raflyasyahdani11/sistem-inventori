<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Supplier</th>
            <th>Jumlah</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Expired</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['kode_barang'] }}</td>
                <td>{{ $item['nama_barang'] }}</td>
                <td>{{ $item['nama_supplier'] }}</td>
                <td>{{ $item['jumlah_barang'] }}</td>
                <td>{{ $item['tanggal_masuk'] }}</td>
                <td>{{ $item['tanggal_expired'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>