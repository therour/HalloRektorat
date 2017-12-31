<div class="modal fade" id="kirimsaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Saran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- kirim saran -->
              <div class="container" style="padding:20px;">
                  <div class="col" style="float: none; margin: 0 auto">
                      <div class="stepwizard">
                          <div class="stepwizard-row setup-panel">
                              <div class="stepwizard-step">
                                  <a href="#step-1" role="button" class="btn btn-primary btn-circle">1</a>
                                  <p>Judul</p>
                              </div>
                              <div class="stepwizard-step">
                                  <a href="#step-2" role="button" class="btn btn-secondary btn-circle disabled" >2</a>
                                  <p>Tentukan Pengambil Keputusan</p>
                              </div>
                              <div class="stepwizard-step">
                                  <a href="#step-3" role="button" class="btn btn-secondary btn-circle disabled" >3</a>
                                  <p>Tulis Saranmu</p>
                              </div>
                              <div class="stepwizard-step">
                                  <a href="#step-4" role="button" class="btn btn-secondary btn-circle disabled" >4</a>
                                  <p>Tambah Foto</p>
                              </div>
                              <div class="stepwizard-step">
                                  <a href="#step-5" role="button" class="btn btn-secondary btn-circle disabled" >5</a>
                                  <p>Selesai</p>
                              </div>
                          </div>
                      </div>
                      <form role="form" style="margin-top: 50px" action="{{ url('/kirim') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="row setup-content" id="step-1">
                              <div class="col-12">
                                  <div class="col-md-12">
                                      <h3 class="judul"> Tulis judul saranmu </h3>
                                      <div class="form-group{{ $errors->kirimsaran->has('title') ? ' has-danger' : '' }}">
                                          <label class="deskripsi form-control-label">Jelaskan secara singkat dan raih perhatian para pembaca.</label>
                                          <input maxlength="100" type="text" class="form-control" placeholder="Apa yang ingin kamu sampaikan" name="title" value="{{ old('title') }}" data-toggle="tooltip" data-placement="top" title="Tidak boleh dikosongi" required>
                                          @if ($errors->kirimsaran->has('title'))
                                            <span class="form-control-feedback">
                                                <strong>{{ $errors->kirimsaran->first('title') }}</strong>
                                            </span>
                                          @endif
                                      </div>
                                      <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
                                  </div>
                              </div>
                          </div>
                          <div class="row setup-content" id="step-2">
                              <div class="col-12">
                                  <div class="col-md-12">
                                      <h3 class="judul"> Tentukan siapa pengambil keputusanmu </h3>
                                      <div class="form-group{{ $errors->kirimsaran->has('content') ? ' has-danger' : '' }}">
                                          <label class="deskripsi form-control-label">
                                              Ini adalah tingkat manajemen yang bisa membuat keputusan untuk menyelesaikan masalahmu. Seperti Jurusan, Fakultas atau Rektorat itu sendiri. HalloRektorat akan mengirim kepada mereka update tentang saranmu dan kami akan mendorong mereka untuk merespon.
                                          </label>
                                          <select class="form-control selects" id="kepada-saran" required>
                                              <option selected disabled>-- Kepada --</option>
                                              <option value="1">Rektorat</option>
                                              <option value="2">Fakultas</option>
                                              <option value="3">Jurusan</option>
                                          </select>
                                          <div id="targetLanjut"></div>
                                          @if ($errors->kirimsaran->has('target'))
                                            <span class="form-control-feedback">
                                                <strong>{{ $errors->kirimsaran->first('target') }}</strong>
                                            </span>
                                          @endif
                                      </div>
                                      <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
                                  </div>
                              </div>
                          </div>
                          <div class="row setup-content" id="step-3">
                              <div class="col-12">
                                  <div class="col-md-12">
                                      <h3 class="judul"> Tulis Saranmu </h3>
                                      <div class="form-group{{ $errors->kirimsaran->has('content') ? ' has-danger' : '' }}">
                                          <label class="deskripsi form-control-label">
                                              Jelaskan saran yang kamu miliki.
                                          </label>
                                          <textarea class="form-control" rows="6" placeholder="Jelaskan masalah yang ingin kamu selesaikan" name="content" data-toggle="tooltip" data-placement="top" title="Tidak boleh kosong" required>{{ old('content') }}</textarea>
                                          @if ($errors->kirimsaran->has('content'))
                                            <span class="form-control-feedback">
                                                <strong>{{ $errors->kirimsaran->first('content') }}</strong>
                                            </span>
                                          @endif
                                      </div>
                                      <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
                                  </div>
                              </div>
                          </div>
                          <div class="row setup-content" id="step-4">
                              <div class="col-12">
                                  <div class="col-md-12">
                                      <h3 class="judul"> Tambah foto </h3>
                                      <div class="form-group">
                                          <label class="deskripsi form-control-label">
                                              Beri para pembaca gambaran visual dari saranmu.
                                          </label>
                                          <input type="file" class="form-control-file" name="image">
                                          @if ($errors->kirimsaran->has('image'))
                                            <span class="form-control-feedback">
                                                <strong>{{ $errors->kirimsaran->first('image') }}</strong>
                                            </span>
                                          @endif
                                      </div>
                                      <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button> Atau <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lewati</button>
                                  </div>
                              </div>
                          </div>
                          <div class="row setup-content" id="step-5">
                              <div class="col-12">
                                  <div class="col-md-12">
                                      <h3 class="judul"> Terimakasih sudah memberikan saran! </h3>
                                      <label class="deskripsi form-check-label">
                                          <input type="checkbox" class="form-check-input" name="agree" data-toggle="tooltip" data-placement="top" title="Wajib untuk disetujui" required>
                                          Saya bertanggung jawab terhadap seluruh hal yang saya tulis.
                                      </label>
                                      @if ($errors->kirimsaran->has('agree'))
                                        <span class="form-control-feedback">
                                            <strong>{{ $errors->kirimsaran->first('agree') }}</strong>
                                        </span>
                                      @endif
                                      <br>
                                      <button class="lanjut btn btn-success float-xs-right" type="submit">Selesai</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>