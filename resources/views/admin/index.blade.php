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
        }
        .sidebar {
            min-width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
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
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalGallery">Kelola Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#modalAgenda">Agenda</a>
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
        
        <h2>Berita Terbaru</h2>
        <ul>
            @foreach($beritaTerbaru as $berita)
            <li>
                <a href="{{ $berita->link_berita }}">{{ $berita->judul_berita }}</a>
                <p>{{ $berita->kutipan_berita }}</p>
            </li>
            @endforeach
        </ul>

        <h2>Slides</h2>
        <ul>
            @foreach($slides as $slide)
            <li>
                <img src="{{ asset('storage/slides/' . $slide->background) }}" alt="{{ $slide->title }}" width="100">
                <p>{{ $slide->title }}</p>
                <a href="{{ $slide->link }}">Link</a>
            </li>
            @endforeach
        </ul>

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
                               {{-- <form action="{{ route('user.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                      <label>Background (Gambar Baru, kosongkan jika tidak ingin diubah):</label>
                                      <input type="file" name="background" class="form-control" accept="image/*">
                                  </div>
                                  <div class="form-group">
                                      <label>Judul:</label>
                                      <input type="text" name="title" class="form-control" value="{{ $slide->title }}" >
                                  </div>
                                  <div class="form-group">
                                      <label>Link:</label>
                                      <input type="url" name="link" class="form-control" value="{{ $slide->link }}" >
                                  </div>
                                  <button type="submit" class="btn btn-primary">Update</button>
                               </form> --}}
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
                   <td>{{ $file->fileName }}</td>
                   <td>{{ $file->deskripsiFile }}</td>
                   <td>{{ $file->file }}</td>
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
                                  <input type="text" name="nama" class="form-control" value="{{ $file->fileName }}" required>
                              </div>
                              <div class="form-group">
                                  <label>Deskripsi File:</label>
                                  <textarea name="deskripsi" class="form-control" required>{{ $file->deskripsiFile }}</textarea>
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
             <h5 class="modal-title" id="modalArtikelLabel">Manajemen Artikel</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <!-- Form Tambah Artikel -->
             <button class="btn btn-success mb-3" data-toggle="collapse" data-target="#formTambahArtikel">Tambah Artikel</button>
             <div id="formTambahArtikel" class="collapse">
               {{-- <form action="{{ route('user.artikel.store') }}" method="POST">
                 @csrf
                 <div class="form-group">
                   <label>Tanggal:</label>
                   <input type="date" name="tanggal" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label>Jumlah Pelihat:</label>
                   <input type="number" name="jumlah_pelihat" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label>Judul Artikel:</label>
                   <input type="text" name="title_artikel" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label>Kutipan:</label>
                   <input type="text" name="kutipan" class="form-control" >
                 </div>
                 <div class="form-group">
                   <label>Link Artikel:</label>
                   <input type="text" name="link_artikel" class="form-control" >
                 </div>
                 <button type="submit" class="btn btn-primary">Simpan</button>
               </form> --}}
             </div>
             <!-- Tabel List Artikel -->
             <table class="table table-bordered mt-3">
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Tanggal</th>
                   <th>Jumlah Pelihat</th>
                   <th>Judul Artikel</th>
                   <th>Kutipan</th>
                   <th>Link Artikel</th>
                   <th>Aksi</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($artikels as $artikel)
                 <tr>
                   <td>{{ $artikel->id }}</td>
                   <td>{{ $artikel->tanggal }}</td>
                   <td>{{ $artikel->jumlah_pelihat }}</td>
                   <td>{{ $artikel->title_artikel }}</td>
                   <td>{{ $artikel->kutipan }}</td>
                   <td>{{ $artikel->link_artikel }}</td>
                   <td>
                     <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditArtikel{{ $artikel->id }}">Edit</button>
                     {{-- <form action="{{ route('user.artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <button type="submit" onclick="return confirm('Yakin ingin menghapus artikel ini?')" class="btn btn-danger btn-sm">Hapus</button>
                     </form> --}}
                   </td>
                 </tr>
                 <!-- Modal Edit Artikel -->
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
                           {{-- <form action="{{ route('user.artikel.update', $artikel->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                  <label>Tanggal:</label>
                                  <input type="date" name="tanggal" class="form-control" value="{{ $artikel->tanggal }}" >
                              </div>
                              <div class="form-group">
                                  <label>Jumlah Pelihat:</label>
                                  <input type="number" name="jumlah_pelihat" class="form-control" value="{{ $artikel->jumlah_pelihat }}" >
                              </div>
                              <div class="form-group">
                                  <label>Judul Artikel:</label>
                                  <input type="text" name="title_artikel" class="form-control" value="{{ $artikel->title_artikel }}" >
                              </div>
                              <div class="form-group">
                                  <label>Kutipan:</label>
                                  <input type="text" name="kutipan" class="form-control" value="{{ $artikel->kutipan }}" >
                              </div>
                              <div class="form-group">
                                  <label>Link Artikel:</label>
                                  <input type="text" name="link_artikel" class="form-control" value="{{ $artikel->link_artikel }}" >
                              </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                           </form> --}}
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

    <!-- Script Bootstrap (jQuery, Popper, dan JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html> 