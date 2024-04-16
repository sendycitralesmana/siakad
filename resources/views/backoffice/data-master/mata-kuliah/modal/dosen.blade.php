<div class="modal fade" id="dosen-{{ $matkul->user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Data Dosen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" text-center">
                    <label for="foto">Foto</label>
                    @if ($matkul->user->foto)
                        <img src="{{ asset('storage/images/user/'.$matkul->user->foto) }}" 
                        class="gambarPreviewuser img-fluid d-block" alt=""
                        style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                    @else
                        <img src="{{ asset('images/profile.png') }}" class="gambarPreviewuser img-fluid mb-3 d-block" alt=""
                        style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                    @endif
                </div>
                <hr>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Nama:</b> 
                    </p>
                    <p>
                        {{ $matkul->user->nama }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Email:</b> 
                    </p>
                    <p>
                        {{ $matkul->user->email }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Jenis kelamin:</b> 
                    </p>
                    <p>
                        @if ($matkul->user->jenis_kelamin == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->user->jenis_kelamin }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Agama:</b> 
                    </p>
                    <p>
                        @if ($matkul->user->agama == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->user->agama }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Tempat, Tanggal Lahir:</b> 
                    </p>
                    <p style="text-transform: capitalize">
                        @if ($matkul->user->tempat_lahir == null && $matkul->user->tanggal_lahir == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @else
                            {{ $matkul->user->tempat_lahir }}, {{ date('d F Y', strtotime($matkul->user->tanggal_lahir)) }}
                        @endif
                        {{-- {{ $matkul->user->tempat_lahir }}, {{ $matkul->user->tanggal_lahir }} --}}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Alamat:</b> 
                    </p>
                    <p>
                        @if ($matkul->user->alamat == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->user->alamat }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>No. HP:</b> 
                    </p>
                    <p>
                        @if ($matkul->user->no_hp == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->user->no_hp }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
