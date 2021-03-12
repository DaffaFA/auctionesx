<div class="header bg-primary pb-7 pt-md-7">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">{{ $title }}</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          @if (isset($newHref))
            <a href="{{ $newHref }}" class="btn btn-sm btn-neutral">Create new {{ $title }}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>