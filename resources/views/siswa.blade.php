<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Laravel</title>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{Route("tambah_siswa")}}" method="post">
                        @csrf
                        <input type="number" name="nis" placeholder="nis" class="form-control">
                        <input type="text" name="nama" placeholder="nama" class="form-control">
                        <input type="number" name="umur" placeholder="umur" class="form-control">
                        <input type="text" name="jk" placeholder="jk" class="form-control">
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
        <table cellpadding="4" cellspacing="0" border="1" class="table">
            <tr>
                <th>nis</th>
                <th>nama</th>
                <th>umur</th>
                <th>jk</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data_siswa as $item)
            <tr>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->umur}}</td>
                <td>{{$item->jk}}</td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUpdate-{{$item->nis}}">Update</button>
                    <form action="{{Route("delete_data", $item->nis)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete Data</button>
                    </form>
                </td>
                <div class="modal fade" id="modalUpdate-{{$item->nis}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{Route("update_data")}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $item->nis }}" name="nis_asli" placeholder="nis" class="form-control">
                                <input type="number" value="{{ $item->nis }}" name="nis" placeholder="nis" class="form-control">
                                <input type="text" value="{{$item->nama}}" name="nama" placeholder="nama" class="form-control">
                                <input type="number" value="{{$item->umur}}" name="umur" placeholder="umur" class="form-control">
                                <input type="text" value="{{$item->jk}}" name="jk" placeholder="jk" class="form-control">
                                <button class="btn btn-primary" type="submit">Update Data</button>

                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </table>
        <script>

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
