
    <!DOCTYPE html>
    <html lang="en">
    <head>
        @include('admin.css')
    </head>
    <body>

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="container" align="center">

                <table>
                    <tr style="background-color: grey;">
                        <td style="padding: 20px;">Customer name</td>
                        <td style="padding: 20px;"> phone</td>
                        <td style="padding: 20px;">alamat</td>
                        <td style="padding: 20px;">nama produk</td>
                        <td style="padding: 20px;">harga</td>
                        <td style="padding: 20px;">jumlah</td>
                        <td style="padding: 20px;">status</td>
                        <td style="padding: 20px;">action</td>
                    </tr>

                    @foreach($order as $orders)

                    <tr align="center" style="background-color: black;">
                        <td style="padding: 20px;">{{$orders->name}}</td>
                        <td style="padding: 20px;">{{$orders->phone}}</td>
                        <td style="padding: 20px;">{{$orders->alamat}}</td>
                        <td style="padding: 20px;">{{$orders->product_tittle}}</td>
                        <td style="padding: 20px;">{{$orders->harga}}</td>
                        <td style="padding: 20px;">{{$orders->jumlah}}</td>
                        <td style="padding: 20px;">{{$orders->status}}</td>
                        <td style="padding: 20px;">
                            <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Terkirim</a>
                        </td>
                    </tr>

                    @endforeach

                </table>
        @include('admin.body')
            <!-- partial -->
        @include('admin.java')
    </body>
    </html>