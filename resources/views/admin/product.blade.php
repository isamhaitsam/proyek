


    <!DOCTYPE html>
    <html lang="en">
    <head>
        @include('admin.css')

        <style>

            .title{
                color:white; padding-top:25px; font-size:25px
            }
            label{
                display: inline-block;
                width: 200px;
            }
        </style>
    </head>
    <body>

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
            <!-- partial -->

            <div class="container-fluid page-body-wrapper">

                <div class="container">
                    <h1 class="title">Tambah Produk</h1>


                    <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
                        @if(session()->has('message'))

                            <div class="alert alert-success">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{session()->get('message')}}
                            </div>


                        @endif

                        @csrf
                        <div style="padding:15px;">
                            <label for="">Nama Produk</label>

                            <input style="color:black;" type="text" name="nama_produk" placeholder="Beri Nama Produk" required>

                        </div>

                        
                        <div style="padding:15px;">
                            <label for="">Harga</label>

                            <input style="color:black;" type="number" name="Harga" placeholder="Beri Harga Produk" required>

                        </div>
                        <div style="padding:15px;">
                            <label for="">Deskripsi</label>

                            <input style="color:black;" type="text" name="des" placeholder="Beri Deskripsi Produk" required>

                        </div>
                        <div style="padding:15px;">
                            <label for="">Jumlah Produk</label>

                            <input style="color:black;" type="text" name="jumlah" placeholder="jumlah Produk" required>

                        </div>
                        
                        <div style="padding:15px;">
                            <input type="file" name="file">

                        </div>

                        
                        <div style="padding:15px;">
                            <input type="submit" class="btn btn-success">

                        </div>
                    </form>

                </div>





            </div>
        
            <!-- partial -->
        @include('admin.java')
    </body>
    </html>