<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pelapor</title>
  </head>
  <body>
    <h1 class="text-center">Data Pelapor</h1>
    <div class="container">
    <a href="/tambah" class="btn btn-success">Tambah Pelapor +</a>
    <div class="row mt-3">
      <div class="col-auto">
        <form action="/pelapor" method="GET">
          <input type="search" name="search" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        </form>
      </div>
      <div class="col-auto">
        <a href="/exportpdf" class="btn btn-info">Export PDF</a>
      </div>
    </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($data as $index=>$row)
                    <tr>
                        <th scope="row">{{$index + $data->firstitem()}}</th>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->umur}}</td>
                        <td>{{$row->alamat}}</td>
                        <td>{{$row->notelp}}</td>
                        <td>
                          <img src="{{asset('tambahfoto/'.$row->foto)}}" alt="" style="width: 50px">
                        </td>
                        <td>
                        <a href="/tampildata/{{$row->id}}" class="btn btn-warning">ubah</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click( function(){
      var pelaporid= $(this).attr("data-id");
      swal({
        title: "apakah kamu yakin menghapus",
        text: "kamu akan menghpus data dengan id "+pelaporid+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location ="/hapusdata/"+pelaporid+" ";
          swal("berhasil menghapus data", {
            icon: "success",
          });
        } else {
          swal("tidak jadi menghapus");
        }
      });
    });
  </script>
</html>