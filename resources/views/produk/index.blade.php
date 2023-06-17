@extends('parsial.main')

@section('content')
   <div class="content-body" style="min-height: 768px;">

  <div class="container-fluid">

       <div class="row">
           <div class="col-lg-12 mb-4 order-0">

<div class="card">
   <h5 class="card-header">Data Kecamatan</h5>

   <div class="table-responsive text-nowrap">
   <a href="produk/create" class="btn btn-primary ms-3 mb-2" style="padding-left:20px;">Tambah data</a>
           
           <div class="d-flex align-items-center justify-content-between">
           
           
             <!-- Modal -->
            <form method="GET" action="/produk">
                     <div class="md-3 input-group col-3 input-group-merge ">
                       <span class="input-group-text border-0 shadow-none" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                       <input
                         type="text"
                         name="search"
                         class="form-control border-0 shadow-none"
                         placeholder="Cari Sesuatu..."
                         aria-label="Cari Sesuatu..."
                         value="{{ request('search') }}"
                         aria-describedby="basic-addon-search31"
                       />
                     </div>   
              </form> 
            </div>   
     <table class="table table-hover">
       <thead>
         <tr>
           <th>#</th>
           <th>Nama</th>
           <th>Deskripsi</th>
           <th>Foto</th>
           <th>Stok</th>
           <th>harga</th>
           <th>aksi</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
        @if(count($produks)>0)
           @foreach ($produks as $produk)
         <tr>
           <input type="hidden" class="delete_id" value="{{ $produk->id }}">
           <td>{{ $loop->iteration }}</td>
           <td>{{ $produk->nama }}</td>
           <td>{{ $produk->deskripsi }}</td>
           <td>{{ $produk->foto }}</td>
           <td>{{ $produk->harga}}</td>
           <td>
             <div class="dropdown text-center">
               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                 <i class="bx bx-dots-vertical-rounded"></i>
               </button>
               <div class="dropdown-menu">
                 <a href="/produk/{{ $produk->nama }}/edit" class="dropdown-item " 
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a
                 >
                 <form action="produk/{{ $produk->id }}" method="post" >
                   @method('delete')
                   @csrf
                 <button class="dropdown-item btndelete"
                   ><i class="bx bx-trash me-1"></i> Delete</button>
                 </form>
               </div>
             </div>
           </td>
           @endforeach
           @else
           <td colspan="4">
            <h5 class="text-center">Tidak ada data</h5>
           </td>
          @endif
         </tr>
       </tbody>
     </table>
     <div class="container mt-2">
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
 <!--/ Hoverable Table rows -->
   {{-- @include('pegawai.create')
   @include('pegawai.edit') --}}
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <script>
     $(document).ready(function () {
 
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
 
         $('.btndelete').click(function (e) {
             e.preventDefault();
 
             var deleteid = $(this).closest("tr").find('.delete_id').val();
 
             swal({
                     title: "Apakah anda yakin?",
                     text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
                     icon: "warning",
                     buttons: true,
                     dangerMode: true,
                 })
                 .then((willDelete) => {
                     if (willDelete) {
 
                         var data = {
                             "_token": $('input[name=_token]').val(),
                             'id': deleteid,
                         };
                         $.ajax({
                             type: "DELETE",
                             url: 'kecamatan/' + deleteid,
                             data: data,
                             success: function (response) {
                                 swal(response.status, {
                                         icon: "success",
                                     })
                                     .then((result) => {
                                         location.reload();
                                     });
                             }
                         });
                     }
                 });
         });
 
     });
 
 </script>
 @endsection