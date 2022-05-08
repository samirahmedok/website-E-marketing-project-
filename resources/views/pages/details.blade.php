@extends('layouts.master')

@section('css')
<script src="https://kit.fontawesome.com/1149e2d748.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
@endsection
  <body>
      @section('content')

    <div class="page-holder bg-light">
    
     
      <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                     
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="../uploads/{{$products->image}}" alt="..."></div>
                    
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="#" title="Product item 1"><img class="img-fluid" src="../uploads/{{$products->image}}" alt="..."></a><a class="d-block" href="../uploads/{{$products->image}}" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="../uploads/{{$products->image}}" alt="..."></a><a class="d-block" href="../uploads/{{$products->image}}" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="../uploads/{{$products->image}}" alt="..."></a><a class="d-block" href="../uploads/{{$products->image}}" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="../uploads/{{$products->image}}" alt="..."></a></div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <h1>{{$products->name}}</h1>
              <p class="text-muted lead">${{$products->price}}</p>
              <p class="text-small mb-4">{{$products->description}}</p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <input class="form-control border-0 shadow-0 p-0" readonly name="qty" type="text" value="1">
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="{{route('add.cart',$products->id)}}">Add to cart</a></div>
              </div><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">{{$products->category->cat_name}}</a></li>
                
              </ul>
            </div>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-small mb-0">{{$products->description}}</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="row" style="background: white">
                    {{-- <div class="col-lg-8"> --}}
                {{-- comments --}}
                <section >
                    <div class="container my-5 py-5" style="width:1000px">
                      
                        <div class="col-md-12 col-lg-10 col-xl-8">
                          <div class="card">
                            @foreach ($products->comments as $comment)       
                            <div class="card-body" >
                              <div class="d-flex flex-start align-items-center">
                                <img class="rounded-circle shadow-1-strong me-3"
                                  src="../uploads/{{$comment->user->image}}" alt="avatar" width="45"
                                  height="45" />
                                <div>
                                  <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                  <p class="text-muted small mb-0">
                                    Shared publicly - {{$comment->created_at->toDayDateTimeString()}}
                                  </p>
                                </div>
                              </div>
                  
                              <p class="mt-3 mb-4 pb-2">
                                {{$comment->body}}
                              </p>
                              <?php
                                $like_count = 0;
                                $dislike_count = 0;
                                $like_status = "btn-secondary";
                                $dislike_status = "btn-secondary";

                              ?>
                              @foreach ($comment->likes as $like)
                                  <?php
                                    if ($like->like == 1) {
                                      $like_count++;
                                    }
                                    if ($like->like == 0) {
                                      $dislike_count++;
                                    }
                                    if (Auth::check()) {
                                      if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                                        $like_status = "btn-success";
                                      }
                                      if ($like->like == 0 && $like->user_id == Auth::user()->id) {
                                        $dislike_status = "btn-danger";
                                      }
                                  }
                                  ?>
                              @endforeach
                              @if (Auth::check())
                                <div class="small d-flex justify-content-start">
                                  <button data-like="{{$like_status}}" data-commentid="{{$comment->id}}_l" class="like btn {{$like_status}}" style="font-size:11px;">Like&nbsp;<span class="far fa-thumbs-up me-2"></span>&nbsp;<b><span class="like_count">{{$like_count}}</span></b></button> &nbsp;
                                  <button data-dislike="{{$dislike_status}}" data-commentid="{{$comment->id}}_d" class="dislike btn {{$dislike_status}}" style="font-size:11px;">DisLike&nbsp;<span class="far fa-thumbs-down me-2"></span>&nbsp;<b><span class="dislike_count">{{$dislike_count}}</span></b></button>
                                </div>
                              @endif
                            </div>
                            
                            @endforeach
                            <form method="post" action="{{route('comments.store',$products->id)}}">
                              @csrf
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                              <div class="d-flex flex-start w-100">
                                @if (Auth::check())
                                <img class="rounded-circle shadow-1-strong me-3"
                                src="../uploads/{{auth::user()->image}}" alt="avatar" width="40"
                                height="40" />
                                @else
                                <img class="rounded-circle shadow-1-strong me-3"
                                  src="{{asset('assets/img/favicon.png')}}" alt="avatar" width="40"
                                  height="40" />
                                @endif
                                &nbsp;
                                  
                                <div class="form-outline w-100">
                                  <textarea class="form-control" id="body" rows="4" name="body"
                                    style="background: #fff;height:108px"></textarea>
                                </div>
                              </div>
                              <div class="float-end mt-2 pt-1">
                                <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  {{-- </section> --}}
            </div>
          </div>
        </div>
      </section>
      
    </div>
    @endsection

    @section('scripts')
        <script >
          var url = "{{route('like')}}";
          var url_dis = "{{route('dislike')}}";
          // var token = "{{Session::token()}}";

          $('.like').click(function(){

            var like_s =$(this).attr('data-like');
            var comments_id = $(this).attr('data-commentid');
            comments_id = comments_id.slice(0,-2);
            // alert(like_s);
            // alert(comments_id);
            $.ajax({
              type: 'POST',
              url: url,
              data: {like_s: like_s, comments_id: comments_id, _token: '{{csrf_token()}}'},
              success:function(data){
                // alert(data.is_like);
                if(data.is_like == 1)
                {
                  $('*[data-commentid="'+comments_id+'_l"]').removeClass('btn-secondary').addClass('btn-success');
                  $('*[data-commentid="'+comments_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                  var like_count = $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text();
                  var new_like = parseInt(like_count) + 1 ;
                  $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text(new_like);

                  if(data.change_like == 1)
                  {
                  var dislike_count = $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text();
                  var new_dislike = parseInt(dislike_count) - 1 ;
                  $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text(new_dislike);
                  }
                }
                if(data.is_like == 0)
                {
                  $('*[data-commentid="'+comments_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                  var like_count = $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text();
                  var new_like = parseInt(like_count) - 1 ;
                  $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text(new_like);
                }
              }
            });
          })

          

        $('.dislike').click(function(){

        var like_s =$(this).attr('data-dislike');
        var comments_id = $(this).attr('data-commentid');
        comments_id = comments_id.slice(0,-2);
        // alert(like_s);
        // alert(comments_id);
          $.ajax({
            type: 'POST',
            url: url_dis,
            data: {like_s: like_s, comments_id: comments_id, _token: '{{csrf_token()}}'},
            success:function(data){
              // alert(data.is_like);
              if(data.is_dislike == 1)
              {
                $('*[data-commentid="'+comments_id+'_d"]').removeClass('btn-secondary').addClass('btn-danger');
                $('*[data-commentid="'+comments_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                var dislike_count = $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text();
                  var new_dislike = parseInt(dislike_count) + 1 ;
                  $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text(new_dislike);

                  if(data.change_dislike == 1)
                  {
                  var like_count = $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text();
                  var new_like = parseInt(like_count) - 1 ;
                  $('*[data-commentid="'+comments_id+'_l"]').find('.like_count').text(new_like);
                  }
              }
              if(data.is_dislike == 0)
              {
                $('*[data-commentid="'+comments_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                var dislike_count = $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text();
                  var new_dislike = parseInt(dislike_count) - 1 ;
                  $('*[data-commentid="'+comments_id+'_d"]').find('.dislike_count').text(new_dislike);
              }
            }
          });
        })
        </script>
    @endsection
  </body>
</html>