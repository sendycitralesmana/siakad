<div class="col-md-3">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <b>Semester 1</b>
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
                    @if ($khs->where('semester', 1)->first() == null)
                        {{ auth()->user()->tahunAkademik->tahun_akademik }}
                        /
                        {{ auth()->user()->tahunAkademik->semester }}
                    @else
                        {{ $khs->where('semester', 1)->first()->tahunAkademik->tahun_akademik }}
                        /
                        {{ $khs->where('semester', 1)->first()->tahunAkademik->semester }}
                    @endif
                </p>
            </div>
            <div class="matkul">
                <div class="totalMatkul d-flex justify-content-between">
                    <p>Total Mata Kuliah</p>
                    <p>
                        {{ $khs->where('semester', 1)->count() }}
                    </p>
                </div>
                <div class="totalSks d-flex justify-content-between">
                    <p>Total SKS</p>
                    <p>
                        {{ $khs->where('semester', 1)->sum('prodiMatkul.dosenMatkul.matkul.jumlah_sks') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="detail text-center">
                <a href="/backoffice/akademik/khs/semester/1" class="btn btn-outline-dark btn-sm">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>