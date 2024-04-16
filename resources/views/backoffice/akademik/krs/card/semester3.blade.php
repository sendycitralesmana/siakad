<div class="col-md-3">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <b>Semester 3</b>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="tahunAkademik d-flex justify-content-center">
                <p>
                    @if ($krs->where('semester', 3)->first() == null)
                        {{ auth()->user()->tahunAkademik->tahun_akademik }}
                        /
                        {{ auth()->user()->tahunAkademik->semester }}
                    @else
                        {{ $krs->where('semester', 3)->first()->tahunAkademik->tahun_akademik }}
                        /
                        {{ $krs->where('semester', 3)->first()->tahunAkademik->semester }}
                    @endif
                </p>
            </div>
            <div class="matkul">
                <div class="totalMatkul d-flex justify-content-between">
                    <p>Total Mata Kuliah</p>
                    <p>
                        {{ $krs->where('semester', 3)->count() }}
                    </p>
                </div>
                <div class="totalSks d-flex justify-content-between">
                    <p>Total SKS</p>
                    <p>
                        {{ $krs->where('semester', 3)->sum('prodiMatkul.dosenMatkul.matkul.jumlah_sks') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="detail text-center">
                <a href="/backoffice/akademik/krs/semester/3" class="btn btn-outline-dark btn-sm">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>