@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .gedf-wrapper {
            margin-top: 0.5rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 0rem;
                padding-right: 0rem;
            }

            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }






        /* Test */

        /* .gallery *,
                .gallery *:before,
                .gallery *:after{
                -moz-box-sizing:border-box;
                -webkit-box-sizing:border-box;
                box-sizing:border-box;
                }


                .gallery{
                display:block;
                width:100%;
                margin:0 auto;
                overflow:hidden;
                max-width:960px;
                }

                .gallery .tile{
                display:block;
                width:100%;
                padding:0 0.5em 0.5em 0;
                }

                .gallery .tile .post{
              
                background-color:#a7d2ef;
                color:#f0f0f0;
                text-align:center;
                padding:6em 2em;
                }

                .gallery .tile.wide .post{
                    background-color:#98cdff;
                    background-image:-webkit-gradient(linear,left bottom,right top,color-stop(1%,#08457e),color-stop(52%,#005f9e),
                        color-stop(52%,#ffffff),color-stop(100%,#007cc2));
                    background-image:-webkit-linear-gradient(45deg,#08457e 1%,#005f9e 52%,#08457e 52%,#007cc2 100%);
                    background-image:-moz-linear-gradient(45deg,#08457e 1%,#005f9e 52%,#08457e 52%,#007cc2 100%);
                    background-image:-ms-linear-gradient(45deg,#08457e 1%,#005f9e 52%,#08457e 52%,#007cc2 100%);
                    background-image:-o-linear-gradient(45deg,#08457e 1%,#005f9e 52%,#08457e 52%,#007cc2 100%);
                    background-image:linear-gradient(45deg,#08457e 1%,#005f9e 52%,#08457e 52%,#007cc2 100%);
                    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#08457e',endColorstr='#007cc2',GradientType=1);
                    color:#fff;
                }

                .gallery .tile.full .post{
                background-color:#ffffff;
                }

                @media screen and (min-width:480px){
                .gallery .tile{
                    width:50%;
                    float:left;
                }
                .gallery .tile.wide,
                .gallery .tile.full{
                    width:100%;
                }
                }

                @media screen and (min-width:720px){
                .gallery .tile{
                    width:33.333%;
                    float:left;
                }
                .gallery .tile.wide{
                    width:66.667%;
                }
                }

                @media screen and (min-width:960px){
                .gallery .tile{
                    width:25%;
                    float:left;
                }
                .gallery .tile.wide{
                    width:50%;
                }
                } */



        /* last */

        .border-card {
            background: #fff;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            font-family: "Roboto";
            font-size: 14px;
            padding: 12px 16px;
            cursor: pointer;
            border-radius: 4px;
            border: 1px solid #eaeaea;
            box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.25s ease;
        }

        .border-card:hover {
            -webkit-transform: translateY(-1px);
            transform: translateY(-1px);
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.1);
        }

        .border-card.over {
            background: rgba(70, 222, 151, 0.15);
            padding-top: 24px;
            padding-bottom: 24px;
            border: 2px solid #47DE97;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0), 0 5px 10px 0 rgba(0, 0, 0, 0);
        }

        .border-card.over .card-type-icon {
            color: #47DE97 !important;
        }

        .border-card.over p {
            color: #47DE97 !important;
        }

        .content-wrapper {
            display: flex;
            justify-content: flex-start;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .min-gap {
            flex: 0 0 40px;
        }

        .card-type-icon {
            flex-grow: 0;
            flex-shrink: 0;
            margin-right: 16px;
            font-weight: 400;
            color: #323232;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            font-size: 14px;
            transition: all 0.25s ease;
        }

        .card-type-icon.with-border {
            color: #aeaeae;
            border: 1px solid #eaeaea;
        }

        .card-type-icon i {
            line-height: 40px;
        }

        .label-group {
            white-space: nowrap;
            overflow: hidden;
        }

        .label-group.fixed {
            flex-shrink: 0;
        }

        .label-group p {
            margin: 0px;
            line-height: 21px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .label-group p.title {
            color: #323232;
            font-weight: 500;
        }

        .label-group p.title.cta {
            text-transform: uppercase;
        }

        .label-group p.caption {
            font-weight: 400;
            color: #aeaeae;
        }

        .end-icon {
            margin-left: 16px;
        }
    </style>

    <div class="pt-80 pb-80">
        <div class="influencer-profile-area">
            <div class="container">
                <div class="influencer-profile-wrapper">
                    <div class="d-flex justify-content-between flex-wrap gap-4">
                        <div class="left">
                            <div class="profile">
                                <div class="thumb">
                                    <img src="{{ getImage(getFilePath('influencerProfile') . '/' . $influencer->image, getFileSize('influencerProfile'), true) }}"
                                        alt="profile thumb">
                                </div>
                                <div class="content">
                                    <h5 class="fw-medium name account-status d-inline-block">{{ $influencer->fullname }}
                                    </h5>
                                    <h6 class="text--base"> {{ $influencer->username }}</h6>

                                    <span>@lang('Profession'): <i
                                            class="title text--small text--muted p-0 m-0">{{ $influencer->profession }}</i></span>
                                    <ul class="list d-flex flex-wrap">
                                        <li>@lang('Member Since'): {{ $influencer->created_at->format('d M Y') }}</li>
                                        <li>
                                            <div class="rating-wrapper">
                                                <span class="text--warning service-rating">
                                                    @php
                                                        echo showRatings($influencer->rating);
                                                    @endphp
                                                    ({{ getAmount($influencer->total_review) }})
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                    @if (!authInfluencerId())
                                        <div class="right mt-3">
                                            <a href="{{ route('user.hiring.request', [slug($influencer->username), $influencer->id]) }}"
                                                class="btn btn--outline-base btn btn-success btn--md radius-1"><i
                                                    class="fas fa-user-check"></i>
                                                @lang('Hire Me')</a>
                                        </div>
                                    @endif

                                    @if ($influencer->categories)
                                        @foreach (@$influencer->categories as $category)
                                            <div class="justify-content-between skill-card mt-3">
                                                <span>{{ __(@$category->name) }}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group-flush">
                                    <li class="">
                                        <h4 class="text--danger d-inline-block">{{ $data['ongoing_job'] }}</h4>
                                        <span>@lang('Ongoing Job')</span>
                                    </li>
                                    <li class="">
                                        <h4 class="text--success d-inline-block">{{ $data['completed_job'] }}</h4>
                                        <span>@lang('Completed Job')</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

               


                {{-- This description tab --}}
                <div class="row">
                <div class="col-md-3">
                    <div class="profile-content mt-4">
                        <div class="custom--card">
                            <div class="card-body">
                                <div class="influencer-profile-sidebar">
                                    <h6 class="mb-3">@lang('Description')</h6>
                                    <p>
                                        @if ($influencer->summary)
                                        @php
                                        echo $influencer->summary;
                                        @endphp
                                        @else
                                        @lang('No summary have been added.')
                                        @endif
                                    </p>
                                </div>

                                @if ($influencer->skills)
                                <div class="influencer-profile-sidebar">
                                    <h6 class="mb-3">@lang('Skills')</h6>
                                    @foreach ($influencer->skills as $skill)

                                    <div class="justify-content-between skill-card my-1">
                                        <span>{{ __(@$skill) }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                @if ($influencer->languages)
                                    @foreach (@$influencer->languages as $key => $profiencies)
                                    <div class="col-12 ">
                                        <div class="education-content py-3">
                                            <div class="d-flex justify-content-between align-items-center gap-3">
                                                <h6>{{ __($key) }}</h6>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 my-2">
                                                @foreach ($profiencies as $key => $profiency)
                                                <span class="skill-card px-2 py-1 rounded">
                                                    {{ keyToTitle($key) }} : {{ $profiency }}
                                                </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if ($influencer->education->count() > 0)
                                <div class="influencer-profile-sidebar">
                                    <h6 class="mb-3">@lang('Educations')</h6>
                                    @foreach ($influencer->education as $education)
                                    <div class="expertise-content">
                                        <div class="expertise-product">
                                            <div class="expertise-details">
                                                <h6 class="fs--15px mb-1 mt-3">{{ __($education->degree) }}
                                                </h6>
                                                <ul class="experties-meta fs--14px my-1">
                                                    <li class="text-dark">
                                                        <span>{{ __($education->institute) }},
                                                            {{ $education->country }}</span>
                                                    </li>
                                                </ul>
                                                <ul class="experties-meta fs--14px my-1">
                                                    <li class="text-dark">
                                                        <span>{{ __($education->start_year) }} -
                                                            {{ __($education->end_year) }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                @if ($influencer->qualification->count() > 0)
                                <div class="influencer-profile-sidebar">
                                    <h6 class="mb-3">@lang('Qualifications')</h6>
                                    @foreach ($influencer->qualification as $qualification)
                                    <div class="expertise-content">
                                        <div class="expertise-product">
                                            <div class="expertise-details">
                                                <h6 class="fs--15px mb-2">
                                                    {{ __($qualification->certificate) }}</h6>
                                                <ul class="experties-meta my-1">
                                                    <li class="text-dark">
                                                        <span>{{ __($qualification->organization) }},
                                                            {{ $qualification->year }}</span>
                                                    </li>
                                                </ul>
                                                <p>{{ __($qualification->summary) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    @if ($influencer->services->count())
                    <div class="profile-content mt-4">
                        <h4 class="mb-3">@lang('Genres')</h4>
                        <div class="row gy-3">
                            @foreach ($influencer->services as $service)
                            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-10">
                                <div class="service-item">
                                    <div class="service-item__thumb">
                                        <img src="{{ getImage(getFilePath('service') . '/thumb_' . $service->image, getFileThumb('service')) }}" alt="images">
                                    </div>
                                    <div class="service-item__content">

                                        <div class="d-flex flex-wrap justify-content-between my-1">
                                            <span class="service-rating">
                                                @php
                                                    echo showRatings(@$service->rating);
                                                @endphp
                                                ({{ $service->total_review ?? 0 }})
                                            </span>
                                        </div>
                                        <h6 class="title mb-3 mt-2"><a href="{{ route('service.details', [slug($service->title), $service->id]) }}">{{ __(@$service->title) }}</a></h6>
                                        <div class="service-footer border-top pt-1 d-flex flex-wrap justify-content-between align-items-center">
                                            <span class="fs--14px"><i class="fas fa-tag fs--13px me-1"></i> {{ __(@$service->category->name) }}</span>
                                            <h6 class="service-price fs--15px"><small>{{ $general->cur_sym }}</small>{{ showAmount($service->price) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <i class="bi bi-facebook"></i>

                    @if ($reviews->count() > 0)
                    <div class="profile-content mt-5">
                        <div class="custom--card">
                            <div class="card-body">
                                <h4 class="mb-3">@lang('Reviews')</h4>
                                @foreach ($reviews as $review)
                                <div class="d-flex justify-content-between review-item border-top flex-wrap gap-4 py-3">
                                    <div class="left">
                                        <div class="profile">
                                            <div class="thumb">
                                                <img src="{{ getImage(getFilePath('userProfile') . '/' . @$review->user->image, getFileSize('userProfile'), true) }}" alt="profile thumb">
                                            </div>
                                            <div class="content">
                                                <h6 class="name">{{ __(@$review->user->fullname) }}
                                                </h6>
                                                <ul class="list d-flex fs--13px flex-wrap">
                                                    <li>{{ $review->created_at->format('d M Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="rating-wrapper">
                                            <ul class="rating d-inline-flex">
                                                @for ($i = 1; $i <= $review->star; $i++)
                                                    <i class="las la-star"></i>
                                                    @endfor

                                                    @for ($k = 1; $k <= 5 - $review->star; $k++)
                                                        <i class="lar la-star"></i>
                                                        @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p>{{ __($review->review) }}</p>
                                @endforeach
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                    @endif   


                </div>
            </div>


                {{-- Twitter --}}
                {{-- Start --}}
               
                {{-- End --}}
                <hr />


                {{-- Youtube --}}
                {{-- Start --}}
                
                {{-- End --}}


                {{-- ------------------------------------------ --}}


                {{-- Start --}}
                {{-- <div class="gallery">                   
                                                    
                                <div class="tile">
                                <div class="post">
                                    7<br>
                                </div>
                                </div>
                                <div class="tile">
                                <div class="post">
                                    8<br>
                                </div>
                                </div>
                                <div class="tile">
                                <div class="post">
                                    9<br>
                                </div>
                                </div>
                                <div class="tile">
                                <div class="post">
                                    10<br>
                                </div>
                                </div>
                            </div> --}}
                {{-- End --}}




                {{-- <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="h5">Facebook</div>
                                <div class="h7 text-muted">AK2</div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="h6 text-muted">Followers</div>
                                    <div class="h5">5.2342</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="h6 text-muted">Following</div>
                                    <div class="h5">6758</div>
                                </li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col bg-primary">2</div>
                    <div class="col bg-danger">3</div>
                    <div class="col bg-info">4</div>
                </div> --}}





                {{-- Start --}}
                {{-- <div class="border-card">
                    <div class="card-type-icon with-border">
                       11
                    </div>
                    <div class="content-wrapper">
                        <div class="label-group fixed">
                            <p class="title">EG links</p>
                            <p class="caption">Einheit</p>
                        </div>
                        <div class="min-gap"></div>
                        <div class="label-group">
                            <p class="title">Test</p>
                            <p class="caption">Eigentümer</p>
                        </div>
                        <div class="min-gap"></div>
                        <div class="label-group">
                            <p class="title">Alexander Oemisch</p>
                            <p class="caption">Mieter</p>
                        </div>                        
                    </div>                   
                </div> --}}



                {{-- <div class="border-card">               
                        <div class="col-md-2 justify-center">
                            <div class="bg-ico" id="youtube">
                                <i class="fab fa-youtube social youtube fa-3x"></i>
                            </div>
                        </div>
                        <div class="col-md-3 justify-center">
                            <ul class="">
                                <li class="">
                                    <div class="">Followers</div>
                                    <div class="">52342K</div>
                                </li>
                                <li class="">
                                    <div class="">Following</div>
                                    <div class="">6758</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 justify-center">
                            <div class="card-body">
                                <h6 class="card-title">Completed Project</h6>
                                <ul class="">
                                    <li class=""><a href="#" class="card-link">Cras justo odio</a></li>
                                    <li class=""><a href="#" class="card-link">Dapibus ac facilisis
                                            in</a></li>
                                    <li class=""><a href="#" class="card-link">Morbi leo risus</a></li>
                                    <li class=""><a href="#" class="card-link">Porta ac consectetur
                                            ac</a></li>
                                    <li class=""><a href="#" class="card-link">Vestibulum at eros</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 justify-center">
                            <div class="card-body">
                                <h5 class="card-title justify-center">Estimate Cost</h5>                              
                                <h4 class="card-text"><span class="text-success">$50000/-</span></h4>
                                <a href="#" class="btn btn-info btn-sm mt-2">Show</a>
                            </div>
                        </div>                  
                </div> --}}


                <div class="border-card">                  
                    <div class="col">
                        <div class="bg-ico" id="youtube">
                            <i class="fab fa-youtube social youtube fa-3x"></i>
                        </div>
                    </div>
                    
                    <div class="col">
                        <ul class="">
                            <li class="">                        
                                <div class="font-head justify-content-between">Subscriber</div>
                                <div class="font-doc justify-content-between">542K</div>
                            </li>                          
                        </ul>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h6 class="card-title">Completed Project</h6>
                            <ul class="">
                                {{-- <li class=""><a href="#" class="card-link">Cras justo odio</a></li>
                                <li class=""><a href="#" class="card-link">Dapibus ac facilisis
                                        in</a></li>
                                <li class=""><a href="#" class="card-link">Morbi leo risus</a></li>
                                <li class=""><a href="#" class="card-link">Porta ac consectetur
                                        ac</a></li>
                                <li class=""><a href="#" class="card-link">Vestibulum at eros</a>
                                </li> --}}
                                <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body justify-content-center">                           
                                <h5 class="card-title">Estimate Cost</h5> 
                                {{-- <h4 class="card-text"><span class="text-success">$50000/-</span></h4> --}}
                                <img class="text-center" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px" width="30px">
                            </div>                       
                    </div>                 
                </div>

                <div class="border-card">                  
                        <div class="col">
                            <div class="bg-ico" id="instagram"><i class="fab fa-instagram social instagram fa-3x"></i></div>
                        </div>
                        <div class="col">
                            <ul class="">
                                <li class="">
                                    <div class="font-head justify-content-between">Followers</div>
                                    <div class="font-doc justify-content-between">52342K</div>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-title">Completed Project</h6>
                                <ul class="">
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>

                                    {{-- <li class=""><a href="#" class="card-link">Cras justo odio</a></li>
                                    <li class=""><a href="#" class="card-link">Dapibus ac facilisis
                                            in</a></li>
                                    <li class=""><a href="#" class="card-link">Morbi leo risus</a></li>
                                    <li class=""><a href="#" class="card-link">Porta ac consectetur
                                            ac</a></li>
                                    <li class=""><a href="#" class="card-link">Vestibulum at eros</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Estimate Cost</h5>                                
                                {{-- <h4 class="card-text"><span class="text-success">$50000/-</span></h4> --}}
                                <img class="center-block" src="{{ asset('assets/images/extra/rupeeyellow.png') }}" height="30px" width="30px">
                                <img class="center-block" src="{{ asset('assets/images/extra/rupeegreen.png') }}" height="30px" width="30px">
                                <img class="center-block" src="{{ asset('assets/images/extra/rupeeblue.png') }}" height="30px" width="30px">
                                <img class="center-block" src="{{ asset('assets/images/extra/rupeered.png') }}" height="30px" width="30px">

                            </div>
                        </div>                 
                </div>




                <div class="border-card">
                    {{-- <div class="content-wrapper"> --}}
                        <div class="col">
                            <div class="bg-ico" id="facebook"><i class="fab fa-facebook social  facebook fa-3x"></i></div>
                        </div>
                        <div class="col">
                            <ul class="">
                                <li class="">
                                    <div class="font-head justify-content-between">Followers</div>
                                    <div class="font-doc justify-content-between">52342K</div>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-title">Completed Project</h6>
                                <ul class="">
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>

                                    {{-- <li class=""><a href="#" class="card-link">Dapibus ac facilisis in</a></li>
                                    <li class=""><a href="#" class="card-link">Morbi leo risus</a></li>
                                    <li class=""><a href="#" class="card-link">Porta ac consectetur ac</a></li>
                                    <li class=""><a href="#" class="card-link">Vestibulum at eros</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Estimate Cost</h5>
                                {{-- <h4 class="card-text"><span class="text-success">$50000/-</span></h4> --}}
                                <img class="center-block" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px" width="30px">
                                {{-- <h6 class="card-subtitle mb-2 text-muted">Per Project</h6> --}}
                                {{-- <h4 class="card-text"><span class="text-success">$50000/-</span></h4> --}}
                                {{-- <a href="#" class="btn btn-info btn-sm mt-2">Hire</a> --}}
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>



                <div class="border-card">
                    {{-- <div class="content-wrapper"> --}}
                        <div class="col">
                            <div class="bg-ico" id="twitter"><i class="fab fa-twitter social twitter fa-3x"></i></div>
                        </div>
                        <div class="col">
                            <ul class="justify-content-between">
                                <li class="">
                                    <div class="font-head justify-content-between">Followers</div>
                                    <div class="font-doc justify-content-between">52342K</div>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-title">Completed Project</h6>
                                <ul class="">
                                    {{-- <li class=""><a href="#" class="card-link">Cras justo odio</a></li>
                                    <li class=""><a href="#" class="card-link">Dapibus ac facilisis
                                            in</a></li>
                                    <li class=""><a href="#" class="card-link">Morbi leo risus</a></li>
                                    <li class=""><a href="#" class="card-link">Porta ac consectetur
                                            ac</a></li>
                                    <li class=""><a href="#" class="card-link">Vestibulum at eros</a>
                                    </li> --}}
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                    <li class="pt-2"><a href="#" class="card-link"><img src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px" height="50px"> Dapibus ac facilisis in</a></li>
                                </ul>
                                {{-- <div class="row">
                                    <div class="col-xs-4 col-md-2">
                                      <a href="#" class="thumbnail" data-toggle="popover" data-full="http://placehold.it/800x800">
                                        <img src="http://placehold.it/75x75">                                       
                                      </a>
                                    </div>     
                                    <div class="col-xs-4 col-md-2">
                                      <a href="#" class="thumbnail" data-toggle="popover" data-full="http://placehold.it/800x800">
                                        <img src="http://placehold.it/75x75">
                                      </a>
                                    </div>
                                    <div class="col-xs-4 col-md-2">
                                      <a href="#" class="thumbnail" data-toggle="popover" data-full="http://placehold.it/800x800">
                                        <img src="http://placehold.it/75x75">
                                      </a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col justify-content-center">
                            <div class="card-body">
                                <h5 class="card-title">Estimate Cost</h5>                              
                                {{-- <h6 class="card-subtitle mb-2 text-muted">Per Project</h6> --}}
                                {{-- <h4 class="card-text"><span class="text-success">$50000/-</span></h4> --}}
                                <img class="" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px" width="30px">
                                {{-- <a href="#" class="btn btn-info btn-sm mt-2">Hire</a> --}}

                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
                {{-- End --}}


            </div>
        </div>
    </div>


@endsection
@push('style')
    <style>

        .font-head{
            font-weight: 400;
            color: black;
            font-size:15px;
        }

        .font-doc{
            font-weight: 600;
            color: rgb(245, 165, 60);
            font-size:20px;
        }

        /* .center-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
        } */


        .profile .thumb {
            width: 100px;
            height: 100px;
        }


            /* for social media link */
             .site {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                    }

                    .wrapper {
                        display: flex;
                        height: 70vh;
                        flex-direction: row;
                        padding: 0 20px;
                        align-items: center;
                        justify-content: center;
                    }


                    .fab {
                        margin: auto;

                    }

                    .social {
                        color: #FFF;
                        transition: all 0.35s;
                        transition-timing-function: cubic-bezier(0.31, -0.105, 0.43, 1.59);
                    }

                    .social:hover {
                        text-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);
                        transition: all ease 0.5s;
                        -moz-transition: all ease-in 0.5s;
                        -webkit-transition: all ease-in 0.5s;
                        -o-transition: all ease-in 0.5s;

                    }

                    .facebook {
                        color: #4267B2;
                    }

                    .twitter {
                        color: #1DA1F2;

                    }

                    .youtube {
                        color: #c4302b;
                    }

                    .pinterest {
                        color: #c8232c;
                    }

                    .instagram {
                        color: transparent;
                        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                        background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                        background-clip: text;
                        -webkit-background-clip: text;

                    }

                    .tumblr {
                        color: #34526f;
                    }

                    .whatsapp {
                        color: #25D366;
                    }

                    .bg-ico {
                        display: flex;
                        background-color: #FFF;
                        width: 90px;
                        height: 90px;
                        line-height: 90px;
                        margin: 10px 5px;
                        text-align: center;
                        position: relative;
                        overflow: hidden;
                        border-radius: 8%;
                        box-shadow: 0 5px 15px -5px rgba(0, 0, 0, 0.1);
                        opacity: 0.99;
                        -webkit-transition: background-color 2s ease-out;
                        -moz-transition: background-color 2s ease-out;
                        -o-transition: background-color 2s ease-out;
                        transition: background-color 2s ease-out;

                    }

                    .bg-ico:hover {
                        box-shadow: 0 5px 15px -5px rgba(0, 0, 0, 0.8);
                    }

                    #facebook:hover {
                        background-color: #4267B2;
                    }

                    #twitter:hover {
                        background-color: #1DA1F2;

                    }

                    #youtube:hover {
                        background-color: #c4302b;
                    }

                    #pinterest:hover {
                        background-color: #c8232c;
                    }

                    #instagram:hover {
                        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                        background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);


                    }

                    #tumblr:hover {
                        background-color: #34526f;
                    }

                    #whatsapp:hover {
                        background-color: #25D366;
                    }

                    .facebook:hover,
                    .twitter:hover,
                    .youtube:hover,
                    .pinterest:hover,
                    .instagram:hover,
                    .tumblr:hover,
                    .whatsapp:hover {
                        color: #fff;
                        transform: scale(1.3);

                    }

        /* End */
    </style>
@endpush
