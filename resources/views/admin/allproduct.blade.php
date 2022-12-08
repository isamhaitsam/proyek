


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
        
            <div style="padding-bottom:20px;" class="container-fluid page-body-wrapper" >

                <div  class="container" align="center">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{session()->get('message')}}
                </div>


                @endif
                    <table>
                        <tr>
                            <td style="padding:20px;">Nama Produk</td>
                            <td style="padding:20px;">Deskripsi</td>
                            <td style="padding:20px;">Jumlah</td>
                            <td style="padding:20px;">Harga</td>
                            <td style="padding:20px;">Gambar</td>
                            <td style="padding:20px;">Update</td>
                            <td style="padding:20px;">Delete</td>


                        </tr>

                        @foreach($data as $product)

                        <tr style="background-color: black;" align="center">
                            <td style="padding:20px;">{{$product->nama_produk}}</td>
                            <td>{{$product->deskripsi_produk}}</td>
                            <td>{{$product->jumlah}}</td>
                            <td>{{$product->Harga}}</td>
                            <td style="padding:20px;"><img height="100" width="100" src="/productimage/{{$product->foto}}" alt=""></td>
                            <td><a class="btn btn-primary" href="{{url('updateproduct',$product->id)}}">Update</a></td>
                            <td><a class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')" href="{{url('deleteproduct',$product->id)}}">Delete</a></td>
                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>

            <!-- partial -->
        @include('admin.java')
    </body>
    </html>