<!-- Modal -->
<div class="modal fade" id="modalSaran{{$saran->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ $saran->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-muted">Dari : {{ $saran->user->biodata->fullname }}</p>
        <p>
          <i class="fa fa-heart-o"></i> {{ $saran->supports()->count() }} 
          <i class="fa fa-comment-o"></i> {{ $saran->comments()->count() }} -
        <span class="text-muted">{{ $saran->created_at->formatLocalized('%A %d %B %Y %H:%M') }}</span>
        </p>
        <p><a href="{{ url('/saran/'.$saran->id) }}">Lihat Halaman</a></p>
        <div class="col-sm-3">
          <img src="{{ $saran->image_path }}" width="100%">
        </div>
        {{ $saran->content }}
      </div>
      <div class="modal-body">
        @if (!$saran->isResponded())
        <form action="{{ route('admin.tanggapi', ['id' => $saran->id]) }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="tanggapan">Tanggapan</label>
            <textarea rows="3" class="form-control" name="content"></textarea>
          </div>
        <button type="submit" class="btn btn-warning">Tanggapi</button>
        </form>
        @else
        @foreach ($saran->tanggapan() as $i => $tanggapan)
          <h4>Tanggapan </h4>
          <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante</p>
          </blockquote>
        @endforeach
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @endif
      </div>
    </div>
  </div>
</div>