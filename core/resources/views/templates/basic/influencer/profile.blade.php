@extends($activeTemplate . 'layouts.frontend')
@section('content')
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
        
</style>

<div class="pt-80 pb-80">
    <div class="influencer-profile-area">
        <div class="container">
            <div class="influencer-profile-wrapper">
                <div class="d-flex justify-content-between flex-wrap gap-4">
                    <div class="left">
                        <div class="profile">
                            <div class="thumb">
                                <img src="{{ getImage(getFilePath('influencerProfile') . '/' . $influencer->image, getFileSize('influencerProfile'), true) }}" alt="profile thumb">
                            </div>
                            <div class="content">
                                <h5 class="fw-medium name account-status d-inline-block">{{ $influencer->fullname }}</h5>
                                <h6 class="text--base"> {{ $influencer->username }}</h6>

                                <span>@lang('Profession'): <i class="title text--small text--muted p-0 m-0">{{ $influencer->profession }}</i></span>
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
                                    <a href="{{ route('user.hiring.request', [slug($influencer->username), $influencer->id]) }}" class="btn btn--outline-base btn--sm radius-0"><i class="fas fa-user-check"></i>
                                        @lang('Hire Me Now')</a>                                    
                                </div>
                                @endif

                                @if($influencer->categories)
                                    @foreach (@$influencer->categories as $category)
                                        <div class="justify-content-between skill-card mt-3">
                                            <span>{{ __(@$category->name) }}</span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="right">
                        <span>@lang('Ongoing Job')</span>
                        <h4 class="text--base d-inline-block">{{ $data['ongoing_job'] }}</h4><br>
                        <span>@lang('Completed Job')</span>
                        <h4 class="text--success d-inline-block">{{ $data['completed_job'] }}</h4>
                    </div> --}}
                  
                      
                            <ul class="info d-flex justify-content-between  mt-4 flex-wrap gap-3 pt-4">       
                               
                                <li class="d-flex align-items-center gap-2">
                                    <h4 class="text--danger d-inline-block">{{ $data['ongoing_job'] }}</h4>
                                    <span>@lang('Ongoing Job')</span>
                                </li>
                               
                                <li class="d-flex align-items-center gap-2">
                                    <h4 class="text--success d-inline-block">{{ $data['completed_job'] }}</h4>
                                    <span>@lang('Completed Job')</span>
                                </li>
                            </ul>
                       
                </div>                
            </div>


            {{-- testing here --}}
            {{-- <div class="influencer-profile-wrapper mt-3 "> 
                <div class="mt-3">
                    <ul class="info d-flex justify-content-between  mt-4 flex-wrap gap-3 pt-4 sticky">

                        <li class="d-flex align-items-center gap-2">
                            <h4 class="text--warning d-inline-block">{{ $data['pending_job'] }}</h4>
                            <span><i class="fab fa-instagram"></i></span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <h4 class="text--base d-inline-block">{{ $data['ongoing_job'] }}</h4>
                            <span>@lang('Ongoing Job')</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <h4 class="text--info d-inline-block">{{ $data['queue_job'] }}</h4>
                            <span>@lang('Queue Job')</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <h4 class="text--success d-inline-block">{{ $data['completed_job'] }}</h4>
                            <span>@lang('Completed Job')</span>
                        </li>
                    </ul>
                </div>
            </div> --}}

            {{-- This description tab --}}
            {{-- <div class="row">
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

                                @if($influencer->languages)
                                    @foreach (@$influencer->languages as $key=>$profiencies)
                                    <div class="col-12 ">
                                        <div class="education-content py-3">
                                            <div class="d-flex justify-content-between align-items-center gap-3">
                                                <h6>{{ __($key) }}</h6>
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 my-2">
                                                @foreach ($profiencies as $key=>$profiency)
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
                        <h4 class="mb-3">@lang('Services')</h4>
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
            </div> --}}


            {{-- Twitter --}}
            {{-- Start --}}
            <div class="container-fluid gedf-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="h4"><span class="text-info">twitter</span></div>
                                <div class="text-muted"><span class="text-dark"><h6>@ABHISHEK164989</h6></span></div>
                                {{-- <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                                    etc.
                                </div> --}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="h6 text-muted">Followers</div>
                                    <div class="h5">52342K</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="h6 text-muted">Following</div>
                                    <div class="h5">6758</div>
                                </li>
                                {{-- <li class="list-group-item">Vestibulum at eros</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 gedf-main"> 
                        <!--- \\\\\\\Post-->

                        <div class="card gedf-card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-2">
                                            <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                        </div>
                                        <div class="ml-2">
                                            <div class="h5 m-0">@ABHISHEK164989</div>
                                            <div class="h7 text-muted">Project 1</div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                <div class="h6 dropdown-header">Configuration</div>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Hide</a>
                                                <a class="dropdown-item" href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                            {{-- <div class="card-body">
                               
                               
                            </div> --}}
                            <div class="row">
                                <img class='img-fluid w-100' src="https://images.unsplash.com/photo-1643111148867-edf4887ce90f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1677&q=80" alt="" />
                            </div>
                        </div>
                        <!-- Post /////-->
        
                
        
                        <!--- \\\\\\\Post-->
                        <div class="card gedf-card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-2">
                                            <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                        </div>
                                        <div class="ml-2">
                                            <div class="h5 m-0">@ABHISHEK164989</div>
                                            <div class="h7 text-muted">Project 2</div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                <div class="h6 dropdown-header">Configuration</div>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Hide</a>
                                                <a class="dropdown-item" href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            {{-- <div class="card-body">
                                
                            </div> --}}
                         
                            <div class="row">
                                <img class='img-fluid w-100' src="https://images.unsplash.com/photo-1643111148867-edf4887ce90f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1677&q=80" alt="" />
                            </div>
                        </div>
                        <!-- Post /////-->
        
        
        
                    </div>
                    <div class="col-md-3">
                        <div class="card gedf-card">
                            <div class="card-body">
                                <h5 class="card-title">Estimate Cost</h5>
                                {{-- <h6 class="card-subtitle mb-2 text-muted">Per Project</h6> --}}
                                <h4 class="card-text"><span class="text-success">$40000/-</span></h4>                              
                                <a href="#" class="btn btn-info btn-sm mt-2">Hire</a>
                            </div>
                        </div>
                        <div class="card gedf-card">
                                <div class="card-body">
                                    <h6 class="card-title">Completed Project</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="#" class="card-link">Cras justo odio</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Dapibus ac facilisis in</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Morbi leo risus</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Porta ac consectetur ac</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Vestibulum at eros</a></li>
                                      </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End --}}
            <hr />


            {{-- Youtube --}}
                        {{-- Start --}}
                        <div class="container-fluid gedf-wrapper">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="h4"><span class="text-danger">You</span><span class="text-dark">Tube</span></div>
                                            <div class="h7 text-muted"><span class="text-dark">AK2</span></div>
                                            {{-- <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                                                etc.
                                            </div> --}}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="h6 text-muted">Subscribers</div>
                                                <div class="h5">52K</div>
                                            </li>          
                                            <li class="list-group-item">
                                                <div class="h6 text-muted">Videos</div>
                                                <div class="h5">100</div>
                                            </li>  
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 gedf-main"> 

                                    <!--- \\\\\\\Post-->
                                    <div class="card gedf-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mr-2">
                                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                                    </div>
                                                    <div class="ml-2">
                                                        <div class="h5 m-0">@AK2</div>
                                                        <div class="h7 text-muted">Food Explore</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                            <div class="h6 dropdown-header">Configuration</div>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Hide</a>
                                                            <a class="dropdown-item" href="#">Report</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="card-body embed-responsive embed-responsive-4by3"> 
                                            <iframe height="300" width="525" class="embed-responsive-item" src="//www.youtube.com/embed/zB4I68XVPzQ"></iframe>
                                        </div>
                                    </div>
                                    <!-- Post /////-->
                    
                    
                    
                                    <!--- \\\\\\\Post-->
                                    <div class="card gedf-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="mr-2">
                                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                                    </div>
                                                    <div class="ml-2">
                                                        <div class="h5 m-0">@AK2</div>
                                                        <div class="h7 text-muted">Food Exlore</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                            <div class="h6 dropdown-header">Configuration</div>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Hide</a>
                                                            <a class="dropdown-item" href="#">Report</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="card-body embed-responsive embed-responsive-4by3"> 
                                            <iframe height="300" width="525" class="embed-responsive-item" src="//www.youtube.com/embed/zB4I68XVPzQ"></iframe>
                                        </div>
                                    </div>
                                    <!-- Post /////-->
                                </div>
                                <div class="col-md-3">
                                    <div class="card gedf-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Estimate Cost</h5>
                                            {{-- <h6 class="card-subtitle mb-2 text-muted">Per Project</h6> --}}
                                            <h4 class="card-text"><span class="text-success">$50000/-</span></h4>                              
                                            <a href="#" class="btn btn-info btn-sm mt-2">Hire</a>
                                        </div>
                                    </div>
                                    <div class="card gedf-card">
                                            <div class="card-body">
                                                <h6 class="card-title">Completed Project</h6>
                                            <ul class="list-group">
                                                <li class="list-group-item"><a href="#" class="card-link">Cras justo odio</a></li>
                                                <li class="list-group-item"><a href="#" class="card-link">Dapibus ac facilisis in</a></li>
                                                <li class="list-group-item"><a href="#" class="card-link">Morbi leo risus</a></li>
                                                <li class="list-group-item"><a href="#" class="card-link">Porta ac consectetur ac</a></li>
                                                <li class="list-group-item"><a href="#" class="card-link">Vestibulum at eros</a></li>
                                            </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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


            
        </div>
    </div>
</div>


@endsection
@push('style')
<style>
    .profile .thumb {
        width: 100px;
        height: 100px;
    }
</style>
@endpush

