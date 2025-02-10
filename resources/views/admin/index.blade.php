<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            margin: 0; /* Menghilangkan margin default */
        }
        .sidebar {
            position: fixed; /* Mengatur posisi sidebar menjadi tetap */
            min-width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh; /* Memastikan sidebar memenuhi tinggi viewport */
            padding-top: 20px;
            overflow-y: auto; /* Menambahkan scroll jika konten sidebar melebihi tinggi */
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px; /* Memberikan margin kiri untuk konten agar tidak tertutup sidebar */
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php
    // dd($slides); // Ini akan menampilkan isi dari $slides
    ?>
    <div class="sidebar">
        <h2 class="text-center">Logo</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalSlide">Kelola Slide</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalBerita">Kelola Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalFileUnduh">Kelola File Unduh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#modalArtikel">Kelola Artikel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#modalAgenda">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalFoto">Foto</a>
            </li>

        </ul>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Dashboard Pengguna</h1>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <p>Selamat datang, {{ auth()->check() ? Auth::user()->name : 'Guest' }}!</p>
        {{-- ----------------------------------------------------------------table slide------------------------------------------------------------------ --}}
        <h1>Konten slide</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Background</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>
                       <img src="{{ Storage::url($slide->path) }}" alt="{{ $slide->title }}" width="100">
                    </td>
                    <td>{{ $slide->title }}</td>
                    <td>
                       <a href="{{ $slide->link }}" class="btn btn-link">Link</a>
                    </td>
                    <td>
                       <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditSlide{{ $slide->id }}">Edit</button>
                       <form action="{{ route('user.slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus slide ini?')">Hapus</button>
                       </form>
                    </td>
                </tr>
                <!-- Modal Edit Slide -->
                <div class="modal fade" id="modalEditSlide{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditSlideLabel{{ $slide->id }}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title" id="modalEditSlideLabel{{ $slide->id }}">Edit Slide</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
                       <div class="modal-body">
                          <form action="{{ route('user.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             @method('PUT')
                             <div class="form-group">
                                 <label>Background (Gambar Baru, kosongkan jika tidak ingin diubah):</label>
                                 <input type="file" name="background" class="form-control" accept="image/*">
                             </div>
                             <div class="form-group">
                                 <label>Judul:</label>
                                 <input type="text" name="title" class="form-control" value="{{ $slide->title }}">
                             </div>
                             <div class="form-group">
                                 <label>Link:</label>
                                 <input type="url" name="link" class="form-control" value="{{ $slide->link }}">
                             </div>
                             <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                       </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </tbody>
        </table>
{{-- -----------table berita --------------------------------------------------------------------------------------------------------------------------------------- --}}
<h1>Konten berita </h1>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Link</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($beritas as $berita)
            <tr>
                <td>{{ $berita->id }}</td>
                <td><img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" width="100"></td>
                <td>{{ $berita->title }}</td>
                <td><a href="{{ route('user.berita.show', $berita->id) }}">Lihat</a></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditBerita{{ $berita->id }}">Edit</button>
                    <form action="{{ route('user.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit Berita -->
            <div class="modal fade" id="modalEditBerita{{ $berita->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditBeritaLabel{{ $berita->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditBeritaLabel{{ $berita->id }}">Edit Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Judul Berita:</label>
                                    <input type="text" name="title" class="form-control" value="{{ $berita->title }}" >
                                </div>
                                <div class="form-group">
                                    <label>Isi Berita:</label>
                                    <textarea name="isi" class="form-control" >{{ $berita->isi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar (kosongkan jika tidak ingin mengubah):</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
{{-- --------------------------------------------------------------------------------------------------------------- --}}
<h1>Konten File Unduh</h1>
<table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama File</th>
        <th>Deskripsi</th>
        <th>File</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fileUnduhs as $file)
      <tr>
        <td>{{ $file->id }}</td>
        <td>{{ $file->nama }}</td>
        <td>{{ $file->deskripsi }}</td>
        <td>{{ $file->path }}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditFileUnduh{{ $file->id }}">Edit</button>
          <form action="{{ route('user.file_unduh.destroy', $file->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus file ini?')">Hapus</button>
          </form>
        </td>
      </tr>
      <!-- Modal Edit File Unduh -->
      <div class="modal fade" id="modalEditFileUnduh{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditFileUnduhLabel{{ $file->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="modalEditFileUnduhLabel{{ $file->id }}">Edit File Unduh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <div class="modal-body">
                <form action="{{ route('user.file_unduh.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                   <div class="form-group">
                       <label>Nama File:</label>
                       <input type="text" name="nama" class="form-control" value="{{ $file->nama }}" required>
                   </div>
                   <div class="form-group">
                       <label>Deskripsi File:</label>
                       <textarea name="deskripsi" class="form-control" required>{{ $file->deskripsi }}</textarea>
                   </div>
                   <div class="form-group">
                       <label>File (Path/URL):</label>
                       <input type="file" name="path" class="form-control">
                   </div>
                   <button type="submit" class="btn btn-primary">Update</button>
                </form>
             </div>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
  <h1>Konten artikel</h1>
  <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Jumlah Pelihat</th>
            <th>Tanggal</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($artikels as $artikel)
        <tr>
            <td>{{ $artikel->id }}</td>
            <td>{{ $artikel->title }}</td>
            <td>{{ $artikel->view }}</td>
            <td>{{ $artikel->created_at->format('d-m-Y') }}</td>
            <td>{{ $artikel->isi }}</td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditArtikel{{ $artikel->id }}">Edit</button>
                <form action="{{ route('user.artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                </form>
            </td>
        </tr>

        <!-- MODAL EDIT ARTIKEL -->
        <div class="modal fade" id="modalEditArtikel{{ $artikel->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditArtikelLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditArtikelLabel{{ $artikel->id }}">Edit Artikel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.artikel.update', $artikel->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul:</label>
                                <input type="text" name="title" class="form-control" value="{{ $artikel->title }}" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pelihat:</label>
                                <input type="number" name="view" class="form-control" value="{{ $artikel->view }}" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Artikel:</label>
                                <textarea name="isi" class="form-control" required>{{ $artikel->isi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
<h1>konten agenda</h1>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agendas as $agenda)
        <tr>
            <td>{{ $agenda->id }}</td>
            <td>{{ $agenda->tanggal }}</td>
            <td>{{ $agenda->title }}</td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditAgenda{{ $agenda->id }}">Edit</button>
                <form action="{{ route('user.agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus agenda ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<h1>Foto</h1>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fotos as $foto)
        <tr>
            <td>{{ $foto->id }}</td>
            <td>
                <img src="{{ Storage::url($foto->path) }}" alt="{{ $foto->title }}" width="100">
            </td>
            <td>{{ $foto->created_at->format('d-m-Y') }}</td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditFoto{{ $foto->id }}">Edit</button>
                <form action="{{ route('user.foto.destroy', $foto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</button>
                </form>
            </td>
        </tr>

        <!-- MODAL EDIT FOTO -->
        <div class="modal fade" id="modalEditFoto{{ $foto->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditFotoLabel{{ $foto->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditFotoLabel{{ $foto->id }}">Edit Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Gambar:</label>
                                <input type="file" name="path" class="form-control" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
{{-- ------------------------------------------------------------------------- batas modal --------------------------------------------------------------------------}}
    <!-- MODAL SLIDE -->
    <div class="modal fade" id="modalSlide" tabindex="-1" role="dialog" aria-labelledby="modalSlideLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalSlideLabel">Manajemen Slide</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             @if(session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
             @endif

             @if(session('error'))
                 <div class="alert alert-danger">
                     {{ session('error') }}
                 </div>
             @endif

             <!-- Form Tambah Slide -->
             <button class="btn btn-success mb-3" data-toggle="collapse" data-target="#formTambahSlide">Tambah Slide</button>
             <div id="formTambahSlide" class="collapse">
               <form action="{{ route('user.slides.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                   <label>Background (Gambar):</label>
                   <input type="file" name="path" class="form-control" accept="image/*" >
                    @error('path')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                 <div class="form-group">
                   <label>Judul:</label>
                   <input type="text" name="title" class="form-control" >
                    @error('title')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Simpan</button>
               </form>
             </div>
             <!-- Tabel List Slide -->
             <table class="table table-bordered mt-3">
                 <thead>
                     <tr>
                         <th>ID</th>
                         <th>Background</th>
                         <th>Title</th>
                         <th>Link</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($slides as $slide)
                     <tr>
                         <td>{{ $slide->id }}</td>
                         <td>
                            <img src="{{ Storage::url($slide->path) }}" alt="{{ $slide->title }}" width="100">
                         </td>
                         <td>{{ $slide->title }}</td>
                         <td>
                            <a href="{{ $slide->link }}" class="btn btn-link">Link</a>
                         </td>
                         <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditSlide{{ $slide->id }}">Edit</button>
                            <form action="{{ route('user.slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus slide ini?')">Hapus</button>
                            </form>
                         </td>
                     </tr>
                     <!-- Modal Edit Slide -->
                     <div class="modal fade" id="modalEditSlide{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditSlideLabel{{ $slide->id }}" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                               <h5 class="modal-title" id="modalEditSlideLabel{{ $slide->id }}">Edit Slide</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                            </div>
                            <div class="modal-body">
                               <form action="{{ route('user.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                      <label>Background (Gambar Baru, kosongkan jika tidak ingin diubah):</label>
                                      <input type="file" name="background" class="form-control" accept="image/*">
                                  </div>
                                  <div class="form-group">
                                      <label>Judul:</label>
                                      <input type="text" name="title" class="form-control" value="{{ $slide->title }}">
                                  </div>
                                  <div class="form-group">
                                      <label>Link:</label>
                                      <input type="url" name="link" class="form-control" value="{{ $slide->link }}">
                                  </div>
                                  <button type="submit" class="btn btn-primary">Update</button>
                               </form>
                            </div>
                         </div>
                       </div>
                     </div>
                     @endforeach
                 </tbody>
             </table>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL BERITA -->
    <div class="modal fade" id="modalBerita" tabindex="-1" role="dialog" aria-labelledby="modalBeritaLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalBeritaLabel">Manajemen Berita</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  @if(session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

                  @if(session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif

                  <!-- Form Tambah Berita -->
                  <button class="btn btn-success mb-3" data-toggle="collapse" data-target="#formTambahBerita">Tambah Berita</button>
                  <div id="formTambahBerita" class="collapse">
                    <form action="{{ route('user.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Gambar Berita:</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Judul Berita:</label>
                            <input type="text" name="title" class="form-control" >
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Isi Berita:</label>
                            <textarea name="isi" class="form-control" ></textarea>
                            @error('isi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Penting:</label>
                            <input type="checkbox" name="penting" value="1">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </div>
  
                  <!-- Tabel Daftar Berita -->
                  <table class="table table-bordered mt-3">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Gambar</th>
                              <th>Judul</th>
                              <th>Link</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($beritas as $berita)
                              <tr>
                                  <td>{{ $berita->id }}</td>
                                  <td><img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" width="100"></td>
                                  <td>{{ $berita->title }}</td>
                                  <td><a href="{{ route('user.berita.show', $berita->id) }}">Lihat</a></td>
                                  <td>
                                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditBerita{{ $berita->id }}">Edit</button>
                                      <form action="{{ route('user.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                                      </form>
                                  </td>
                              </tr>
  
                              <!-- Modal Edit Berita -->
                              <div class="modal fade" id="modalEditBerita{{ $berita->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditBeritaLabel{{ $berita->id }}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="modalEditBeritaLabel{{ $berita->id }}">Edit Berita</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <form action="{{ route('user.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="form-group">
                                                      <label>Judul Berita:</label>
                                                      <input type="text" name="title" class="form-control" value="{{ $berita->title }}" >
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Isi Berita:</label>
                                                      <textarea name="isi" class="form-control" >{{ $berita->isi }}</textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Gambar (kosongkan jika tidak ingin mengubah):</label>
                                                      <input type="file" name="image" class="form-control" accept="image/*">
                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Update</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  

    <!-- MODAL FILE UNDUH -->
    <div class="modal fade" id="modalFileUnduh" tabindex="-1" role="dialog" aria-labelledby="modalFileUnduhLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modalFileUnduhLabel">Manajemen File Unduh</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             @if(session('success'))
                 <div class="alert alert-success">
                     {{ session('success') }}
                 </div>
             @endif

             @if(session('error'))
                 <div class="alert alert-danger">
                     {{ session('error') }}
                 </div>
             @endif

             <!-- Form Tambah File Unduh -->
             <button class="btn btn-success mb-3" data-toggle="collapse" data-target="#formTambahFileUnduh">Tambah File Unduh</button>
             <div id="formTambahFileUnduh" class="collapse">
               <form action="{{ route('user.file_unduh.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                   <label>Nama File:</label>
                   <input type="text" name="nama" class="form-control" required>
                 </div>
                 <div class="form-group">
                   <label>Deskripsi File:</label>
                   <textarea name="deskripsi" class="form-control" required></textarea>
                 </div>
                 <div class="form-group">
                   <label>File (Path/URL):</label>
                   <input type="file" name="path" class="form-control" required>
                 </div>
                 <button type="submit" class="btn btn-primary">Simpan</button>
               </form>
             </div>
  
             <!-- Tabel List File Unduh -->
             <table class="table table-bordered mt-3">
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Nama File</th>
                   <th>Deskripsi</th>
                   <th>File</th>
                   <th>Aksi</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($fileUnduhs as $file)
                 <tr>
                   <td>{{ $file->id }}</td>
                   <td>{{ $file->nama }}</td>
                   <td>{{ $file->deskripsi }}</td>
                   <td>{{ $file->path }}</td>
                   <td>
                     <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditFileUnduh{{ $file->id }}">Edit</button>
                     <form action="{{ route('user.file_unduh.destroy', $file->id) }}" method="POST" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus file ini?')">Hapus</button>
                     </form>
                   </td>
                 </tr>
                 <!-- Modal Edit File Unduh -->
                 <div class="modal fade" id="modalEditFileUnduh{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditFileUnduhLabel{{ $file->id }}" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="modalEditFileUnduhLabel{{ $file->id }}">Edit File Unduh</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form action="{{ route('user.file_unduh.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                  <label>Nama File:</label>
                                  <input type="text" name="nama" class="form-control" value="{{ $file->nama }}" required>
                              </div>
                              <div class="form-group">
                                  <label>Deskripsi File:</label>
                                  <textarea name="deskripsi" class="form-control" required>{{ $file->deskripsi }}</textarea>
                              </div>
                              <div class="form-group">
                                  <label>File (Path/URL):</label>
                                  <input type="file" name="path" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                           </form>
                        </div>
                     </div>
                   </div>
                 </div>
                 @endforeach
               </tbody>
             </table>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL ARTIKEL -->
    <div class="modal fade" id="modalArtikel" tabindex="-1" role="dialog" aria-labelledby="modalArtikelLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalArtikelLabel">Daftar Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Daftar Artikel</h2>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Jumlah Pelihat</th>
                                <th>Tanggal</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artikels as $artikel)
                            <tr>
                                <td>{{ $artikel->id }}</td>
                                <td>{{ $artikel->title }}</td>
                                <td>{{ $artikel->view }}</td>
                                <td>{{ $artikel->created_at->format('d-m-Y') }}</td>
                                <td>{{ $artikel->isi }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditArtikel{{ $artikel->id }}">Edit</button>
                                    <form action="{{ route('user.artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- MODAL EDIT ARTIKEL -->
                            <div class="modal fade" id="modalEditArtikel{{ $artikel->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditArtikelLabel{{ $artikel->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditArtikelLabel{{ $artikel->id }}">Edit Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.artikel.update', $artikel->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Judul:</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $artikel->title }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Pelihat:</label>
                                                    <input type="number" name="view" class="form-control" value="{{ $artikel->view }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Isi Artikel:</label>
                                                    <textarea name="isi" class="form-control" required>{{ $artikel->isi }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH AGENDA -->

<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="modalAgendaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgendaLabel">Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- TOMBOL UNTUK MENAMPILKAN MODAL TAMBAH AGENDA -->
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modalTambahAgenda">Tambah Agenda</button>

                <!-- TABEL DAFTAR AGENDA -->
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendas as $agenda)
                        <tr>
                            <td>{{ $agenda->id }}</td>
                            <td>{{ $agenda->tanggal }}</td>
                            <td>{{ $agenda->title }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditAgenda{{ $agenda->id }}">Edit</button>
                                <form action="{{ route('user.agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus agenda ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH AGENDA -->
<div class="modal fade" id="modalTambahAgenda" tabindex="-1" role="dialog" aria-labelledby="modalTambahAgendaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAgendaLabel">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.agenda.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal:</label>
                        <input type="date" name="tanggal" class="form-control" required>
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Judul:</label>
                        <input type="text" name="title" class="form-control" required>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT AGENDA -->
@foreach($agendas as $agenda)
<div class="modal fade" id="modalEditAgenda{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditAgendaLabel{{ $agenda->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditAgendaLabel{{ $agenda->id }}">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.agenda.update', $agenda->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tanggal:</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $agenda->tanggal }}" required>
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Judul:</label>
                        <input type="text" name="title" class="form-control" value="{{ $agenda->title }}" required>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

    <!-- MODAL FOTO -->
    <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="modalFotoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFotoLabel">Daftar Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Daftar Foto</h2>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fotos as $foto)
                            <tr>
                                <td>{{ $foto->id }}</td>
                                <td>
                                    <img src="{{ Storage::url($foto->path) }}" alt="{{ $foto->title }}" width="100">
                                </td>
                                <td>{{ $foto->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditFoto{{ $foto->id }}">Edit</button>
                                    <form action="{{ route('user.foto.destroy', $foto->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- MODAL EDIT FOTO -->
                            <div class="modal fade" id="modalEditFoto{{ $foto->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditFotoLabel{{ $foto->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditFotoLabel{{ $foto->id }}">Edit Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Gambar:</label>
                                                    <input type="file" name="path" class="form-control" accept="image/*">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH FOTO -->
    <div class="modal fade" id="modalTambahFoto" tabindex="-1" role="dialog" aria-labelledby="modalTambahFotoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahFotoLabel">Tambah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.foto.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" name="path" class="form-control" accept="image/*" required>
                            @error('path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" name="title" class="form-control" required>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" required>
                            @error('tanggal')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap (jQuery, Popper, dan JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html> 