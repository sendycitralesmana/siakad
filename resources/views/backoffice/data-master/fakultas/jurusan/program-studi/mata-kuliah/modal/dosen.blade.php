<div class="modal fade" id="dosen-{{ $matkul->dosenMatkul->user->id }}">
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
                    @if ($matkul->dosenMatkul->user->foto)
                        <img src="{{ asset('storage/images/user/'.$matkul->dosenMatkul->user->foto) }}" 
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
                        {{ $matkul->dosenMatkul->user->nama }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Email:</b> 
                    </p>
                    <p>
                        {{ $matkul->dosenMatkul->user->email }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Jenis kelamin:</b> 
                    </p>
                    <p>
                        @if ($matkul->dosenMatkul->user->jenis_kelamin == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->dosenMatkul->user->jenis_kelamin }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Agama:</b> 
                    </p>
                    <p>
                        @if ($matkul->dosenMatkul->user->agama == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->dosenMatkul->user->agama }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Tempat, Tanggal Lahir:</b> 
                    </p>
                    <p style="text-transform: capitalize">
                        @if ($matkul->dosenMatkul->user->tempat_lahir == null && $matkul->dosenMatkul->user->tanggal_lahir == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @else
                            {{ $matkul->dosenMatkul->user->tempat_lahir }}, {{ date('d F Y', strtotime($matkul->dosenMatkul->user->tanggal_lahir)) }}
                        @endif
                        {{-- {{ $matkul->dosenMatkul->user->tempat_lahir }}, {{ $matkul->dosenMatkul->user->tanggal_lahir }} --}}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>Alamat:</b> 
                    </p>
                    <p>
                        @if ($matkul->dosenMatkul->user->alamat == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->dosenMatkul->user->alamat }}
                    </p>
                </div>
                <div class=" d-flex justify-content-between pl-4 pr-4">
                    <p>
                        <b>No. HP:</b> 
                    </p>
                    <p>
                        @if ($matkul->dosenMatkul->user->no_hp == null)
                            <span class="badge badge-warning"><i class="fa fa-exclamation-triangle"></i> Belum melengkapi data</span>
                        @endif
                        {{ $matkul->dosenMatkul->user->no_hp }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
