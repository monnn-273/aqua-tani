@extends('job-seeker.layouts.template')
    
@section('content')
  @include('job-seeker.layouts.hero-section-2')  
  <section class="site-section">
    <div class="container">
      <!-- MAIN CONTENT -->
      <h2 class="section-title mb-2 text-center">Notifikasi</h2>

      @if($unread_notif > 0)
        <form action="{{route('u.mark-as-read')}}" method="POST">
          @csrf
          <input type="hidden" value="{{Auth()->user()->id}}" name="receiver_id">
          <div class="text-center text-black">   
            <button type="submit"> 
              <span class="btn btn-primary-cs btn-sm text-black">
                <i class="fa fa-check-circle"></i>
                Tandai Semua sebagai Sudah Dibaca
              </span>
            </button>
          </div>
        </form>  
      @endif
      <br>

      @if($notifications->count() == 0) 
        <h3 class="text-center">
          <span class="badge badge-primary">
            Belum ada notifikasi.
          </span>
        </h3>
        <br>

      @else
        @foreach($notifications as $notification)
          @if($notification->status == "Sudah Dibaca")
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="bg-light p-3 border rounded">
                  <div class="row">
                    <div class="col-md-10">
                      <h3 class="text-primary">
                        <i class="fa fa-bell"></i>
                        <strong>{{$notification->notification_title}}</strong>
                      </h3>
                    </div>
                    <div class="col-md-2 align-items-center">
                      <h3 class="text-black">
                        <strong>{{$notification->status}}</strong>
                      </h3>
                    </div>
                    <div class="col-md-10">
                      <p class="text-md fw-bolder">{{$notification->notification_text}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @else 
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="bg-white p-3 border rounded">
                  <div class="row">
                    <div class="col-md-10">
                      <h3 class="text-black">
                        <i class="fa fa-bell text-black"></i>
                        <strong>{{$notification->notification_title}}</strong>
                      </h3>
                    </div>
                    <div class="col-md-2">
                      <h3 class="text-black">
                        <strong>{{$notification->status}}</strong>
                      </h3>
                    </div>
                    <div class="col-md-10">
                      <p class="text-md fw-bolder text-black">{{$notification->notification_text}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      @endif

      <br>
      <div class="row pagination-wrap">
          <div class="col-md-12 text-center text-md-center">
            <div class="custom-pagination ml-auto">
              @if ($notifications->onFirstPage())
                <a class="prev disabled">Prev</a>
              @else
                <a href="{{ $notifications->previousPageUrl() }}" class="prev">Prev</a>
              @endif
                
              <div class="d-inline-block">
                @foreach ($notifications->getUrlRange(1, $notifications->lastPage()) as $page => $url)
                  <a href="{{ $url }}" class="{{ $page == $notifications->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
              </div>
                
              @if ($notifications->hasMorePages())
                <a href="{{ $notifications->nextPageUrl() }}" class="next">Next</a>
              @else
                <a class="next disabled">Next</a>
              @endif
            </div>
          </div>
        </div>
  </section>
@endsection