@extends($activeTemplate . 'layouts.frontend')
@section('content')

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




                {{-- Description tab --}}
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
                                                    <img src="{{ getImage(getFilePath('service') . '/thumb_' . $service->image, getFileThumb('service')) }}"
                                                        alt="images">
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
                                                    <h6 class="title mb-3 mt-2"><a
                                                            href="{{ route('service.details', [slug($service->title), $service->id]) }}">{{ __(@$service->title) }}</a>
                                                    </h6>
                                                    <div
                                                        class="service-footer border-top pt-1 d-flex flex-wrap justify-content-between align-items-center">
                                                        <span class="fs--14px"><i class="fas fa-tag fs--13px me-1"></i>
                                                            {{ __(@$service->category->name) }}</span>
                                                        <h6 class="service-price fs--15px">
                                                            <small>{{ $general->cur_sym }}</small>{{ showAmount($service->price) }}
                                                        </h6>
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
                                            <div
                                                class="d-flex justify-content-between review-item border-top flex-wrap gap-4 py-3">
                                                <div class="left">
                                                    <div class="profile">
                                                        <div class="thumb">
                                                            <img src="{{ getImage(getFilePath('userProfile') . '/' . @$review->user->image, getFileSize('userProfile'), true) }}"
                                                                alt="profile thumb">
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
                <hr />



                {{-- coding --}}
                @if ($social_link->count() > 0)
                    @foreach ($social_link as $social_link)
                        <div class="border-card">
                            @if ($social_link->social_media == 1)
                                <div class="col">
                                    <div class="bg-ico" id="youtube"><i
                                            class="fab fa-youtube social youtube fa-3x"></i>
                                    </div>
                                </div>
                            @elseif($social_link->social_media == 4)
                                <div class="col">
                                    <div class="bg-ico" id="instagram"><i
                                            class="fab fa-instagram social instagram fa-3x"></i></div>
                                </div>
                            @elseif($social_link->social_media == 3)
                                <div class="col">
                                    <div class="bg-ico" id="facebook"><i
                                            class="fab fa-facebook social facebook fa-3x"></i>
                                    </div>
                                </div>
                            @elseif($social_link->social_media == 2)
                                <div class="col">
                                    <div class="bg-ico" id="twitter"><i
                                            class="fab fa-twitter social twitter fa-3x"></i>
                                    </div>
                                </div>
                            @endif


                            <div class="col">
                                <ul class="">
                                    <li class="">
                                        @if ($social_link->social_media == 'Youtube')
                                            <div class="font-head justify-content-between">Subscriber</div>
                                        @else
                                            <div class="font-head justify-content-between">Followers</div>
                                        @endif
                                        <div class="font-doc justify-center">{{ $social_link->followers }}</div>

                                    </li>
                                </ul>
                            </div>

                            @php
                                $project_link = App\Models\ProjectLink::where('sociallink_id', $social_link->id)->get();
                            @endphp

                            <div class="col">
                                @if ($project_link->count() > 0)
                                    <div class="card-body">
                                        <h6 class="card-title">Completed Project</h6>
                                        <ul class="">
                                            @foreach ($project_link as $project_link)
                                                <li class="pt-2">
                                                    <a href="{{ route('project.details', $project_link->sociallink_id) }}"
                                                        class="btn btn--sm btn--outline-base radius-0">@lang('View Profile')</a>

                                                    <a href="{{ $project_link->proj_url }}"
                                                        target="_blank"
                                                        class="card-link">
                                                        <img src="{{ url('assets/images/thumbnail/' . $project_link->thumbnail) }}"
                                                            width="50px" height="50px"><span
                                                            class="pr-2">{{ $project_link->proj_url }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <h6 class="card-title">Completed Project</h6>
                                        <span>No Project found</span>
                                    </div>
                                @endif
                            </div>

                            @php
                                $f1 = $social_link->whereBetween('followers', [0, 250])->first();
                                $f2 = $social_link->whereBetween('followers', [251, 500])->first();
                                $f3 = $social_link->whereBetween('followers', [501, 750])->first();
                                $f4 = $social_link->whereBetween('followers', [751, 1000])->first();
                            @endphp
                            <div class="col">
                                <div class="card-body justify-content-center">
                                    <h5 class="card-title">Estimate Cost</h5>
                                    @if ($f1)
                                        <img class="center-block" src="{{ asset('assets/images/extra/rupeegreen.png') }}"
                                            height="30px" width="30px">
                                    @elseif($f2)
                                        <img class="center-block"
                                            src="{{ asset('assets/images/extra/rupeeyellow.png') }}" height="30px"
                                            width="30px">
                                    @elseif($f3)
                                        <img class="center-block" src="{{ asset('assets/images/extra/rupeeblue.png') }}"
                                            height="30px" width="30px">
                                    @elseif($f4)
                                        <img class="center-block" src="{{ asset('assets/images/extra/rupeered.png') }}"
                                            height="30px" width="30px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- coding --}}




                {{-- start --}}
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
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body justify-content-center">
                            <h5 class="card-title">Estimate Cost</h5>
                            <img class="text-center" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px"
                                width="30px">
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
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">Estimate Cost</h5>
                            <img class="center-block" src="{{ asset('assets/images/extra/rupeeyellow.png') }}"
                                height="30px" width="30px">
                            <img class="center-block" src="{{ asset('assets/images/extra/rupeegreen.png') }}"
                                height="30px" width="30px">
                            <img class="center-block" src="{{ asset('assets/images/extra/rupeeblue.png') }}"
                                height="30px" width="30px">
                            <img class="center-block" src="{{ asset('assets/images/extra/rupeered.png') }}"
                                height="30px" width="30px">
                        </div>
                    </div>
                </div>


                <div class="border-card">
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
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">Estimate Cost</h5>
                            <img class="center-block" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px"
                                width="30px">
                        </div>
                    </div>
                </div>

                <div class="border-card">
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
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph1.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph2.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                                <li class="pt-2"><a href="#" class="card-link"><img
                                            src="{{ asset('assets/images/extra/ph3.jpeg') }}" width="50px"
                                            height="50px"> Dapibus ac facilisis in</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col justify-content-center">
                        <div class="card-body">
                            <h5 class="card-title">Estimate Cost</h5>
                            <img class="" src="{{ asset('assets/images/extra/rupee.png') }}" height="30px"
                                width="30px">
                        </div>
                    </div>
                </div>
                {{-- End --}}

                {{-- start 17/08/2023 --}}
                <svg id="svg-source" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" style="position: absolute">

                    <g id="shopping-cart" data-iconmelon="e-commerce icons:7c96e2dece0152dc594d66b260f79db0">
                        <path
                            d="M22.463,25.841c0.528,0,0.918-0.429,0.918-0.958v-6.786c0-0.529-0.39-0.958-0.918-0.958c-0.529,0-0.92,0.429-0.92,0.958
                      v6.786C21.543,25.413,21.934,25.841,22.463,25.841z M18.156,25.841c0.529,0,0.919-0.429,0.919-0.958v-6.786
                      c0-0.529-0.39-0.958-0.919-0.958s-0.919,0.429-0.919,0.958v6.786C17.237,25.413,17.627,25.841,18.156,25.841z M13.851,25.841
                      c0.528,0,0.919-0.429,0.919-0.958v-6.786c0-0.529-0.391-0.958-0.919-0.958c-0.529,0-0.919,0.429-0.919,0.958v6.786
                      C12.932,25.413,13.321,25.841,13.851,25.841z M29.426,8.511h-5.327l-2.731-4.396c-0.342-0.593-0.98-0.961-1.666-0.961
                      c-0.336,0-0.668,0.089-0.959,0.258c-0.918,0.529-1.233,1.707-0.689,2.647l1.564,2.451h-7.976l1.58-2.475
                      c0.529-0.917,0.214-2.095-0.704-2.624c-0.292-0.169-0.623-0.258-0.959-0.258c-0.686,0-1.323,0.368-1.655,0.943L7.161,8.511H2.574
                      C1.155,8.511,0,9.667,0,11.086v1.47c0,1.274,0.934,2.525,2.152,2.728l1.931,11.042c0.03,1.394,1.173,2.519,2.573,2.519h18.605
                      c1.401,0,2.545-1.125,2.574-2.52l1.921-11.032C31.019,15.128,32,13.862,32,12.556v-1.47C32,9.667,30.845,8.511,29.426,8.511z
                       M26.615,26.167l-0.009,0.104c0,0.741-0.604,1.344-1.345,1.344H6.656c-0.741,0-1.344-0.603-1.344-1.344L3.407,15.327h25.096
                      L26.615,26.167z M30.77,12.556c0,0.74-0.603,1.541-1.344,1.541H2.574c-0.741,0-1.344-0.8-1.344-1.541v-1.47
                      c0-0.741,0.603-1.344,1.344-1.344h5.271l3.113-5.011c0.184-0.318,0.623-0.439,0.944-0.253c0.33,0.19,0.444,0.614,0.268,0.92
                      L9.396,9.742h12.467l-2.76-4.32c-0.189-0.33-0.076-0.753,0.253-0.944c0.323-0.186,0.756-0.074,0.955,0.27l3.104,4.994h6.011
                      c0.741,0,1.344,0.603,1.344,1.344V12.556z M9.545,25.841c0.528,0,0.918-0.429,0.918-0.958v-6.786c0-0.529-0.39-0.958-0.918-0.958
                      c-0.529,0-0.919,0.429-0.919,0.958v6.786C8.626,25.413,9.016,25.841,9.545,25.841z">
                        </path>
                    </g>
                    <g id="credit-card" data-iconmelon="e-commerce icons:c3144b166f93e0f6b73aee04a0a48397">
                        <path
                            d="M29.018,4.751H2.981C1.337,4.751,0,6.089,0,7.733v16.534c0,1.644,1.337,2.981,2.981,2.981h26.036
                      c1.645,0,2.982-1.338,2.982-2.981V7.733C32,6.089,30.662,4.751,29.018,4.751z M30.638,24.267c0,0.893-0.727,1.62-1.621,1.62H2.981
                      c-0.893,0-1.62-0.727-1.62-1.62V13.603h29.276V24.267z M30.638,10.236H1.362V7.733c0-0.894,0.727-1.62,1.62-1.62h26.036
                      c0.894,0,1.621,0.727,1.621,1.62V10.236z M8.848,22.494H2.724v1.338h6.124V22.494z M19.043,22.494H9.548v1.338h9.495V22.494z">
                        </path>
                    </g>
                    <g id="gift" data-iconmelon="e-commerce icons:05fa65d254ada5a9cb5c2f1e8d87f02b">
                        <path
                            d="M29.084,7.154h-4.807c0.157-0.146,0.731-0.497,0.866-0.678c0.757-1.01,1.016-2.355,0.677-3.51
                      c-0.473-1.612-1.773-2.575-3.479-2.575c-1.017,0-1.993,0.371-2.546,0.967c-0.759,0.818-2.841,3.57-3.764,4.8
                      c-0.923-1.23-3.004-3.982-3.764-4.8c-0.553-0.596-1.528-0.967-2.546-0.967c-1.706,0-3.007,0.962-3.479,2.575
                      c-0.339,1.155-0.08,2.5,0.677,3.51C7.053,6.657,7.5,7.007,7.657,7.154H2.915C1.308,7.154,0,8.462,0,10.07v5.262h1.356v13.362
                      c0,1.607,1.308,2.915,2.916,2.915h23.435c1.607,0,2.915-1.308,2.915-2.915V15.332H32V10.07C32,8.462,30.692,7.154,29.084,7.154z
                       M14.281,30.311H4.272c-0.857,0-1.555-0.76-1.555-1.617V15.401h11.563V30.311z M14.281,13.949H1.362V10.07
                      c0-0.857,0.696-1.555,1.553-1.555h11.366V13.949z M9.456,6.471c-0.731,0-1.221-0.508-1.447-0.811
                      c-0.498-0.664-0.678-1.571-0.46-2.312c0.423-1.441,1.661-1.597,2.173-1.597c0.729,0,1.303,0.268,1.548,0.532
                      c0.623,0.671,2.289,2.854,3.301,4.197C12.948,6.477,10.35,6.471,9.456,6.471z M20.792,2.285c0.245-0.265,0.819-0.532,1.548-0.532
                      c0.513,0,1.75,0.156,2.173,1.597c0.217,0.74,0.037,1.647-0.46,2.311c-0.227,0.303-0.716,0.811-1.447,0.811
                      c-0.894,0-3.493,0.006-5.115,0.011C18.504,5.139,20.169,2.956,20.792,2.285z M29.26,28.694c0,0.857-0.697,1.617-1.554,1.617h-10.02
                      v-14.91H29.26V28.694z M30.638,13.949H17.687V8.515h11.397c0.858,0,1.554,0.698,1.554,1.555V13.949z">
                        </path>
                    </g>
                    <g id="package" data-iconmelon="e-commerce icons:de2d76203b2448ee25bda0d82fa73c00">
                        <path
                            d="M31.666,7.132l0.028-0.014L16.191,0L0.264,7.285l0.027,0.013v17.39l15.094,7.266V32l0.05-0.023l0.012,0.006l0.006-0.013
                      l16.283-7.442V7.132H31.666z M16.191,1.415l12.553,5.73l-3.352,1.604L12.535,3.088L16.191,1.415z M1.669,23.879V7.887l13.993,6.388
                      l0.006,16.256L1.669,23.879z M3.202,7.285L8.223,5.06l12.553,5.897l-4.592,2.195L3.202,7.285z M30.358,23.698l-13.307,6.294
                      l0.019-15.722l4.873-2.396l0.031,7.692l4.169-2.288V9.777l4.215-2.062V23.698z">
                        </path>
                    </g>
                </svg>


                <div id="wrapper">
                    <div id="left-side">
                        <ul>
                            <li class="choose active">
                                <div class="icon active">
                                    <svg viewBox="0 0 32 32">
                                        <g filter="">
                                            <use xlink:href="#shopping-cart"></use>
                                        </g>
                                    </svg>
                                </div>
                                facebook
                            </li>
                            <li class="pay">
                                <div class="icon">
                                    <svg viewBox="0 0 32 32">
                                        <g filter="">
                                            <use xlink:href="#credit-card"></use>
                                        </g>
                                    </svg>
                                </div>
                                twitter
                            </li>
                            <li class="wrap">
                                <div class="icon">
                                    <svg viewBox="0 0 32 32">
                                        <g filter="">
                                            <use xlink:href="#gift"></use>
                                        </g>
                                    </svg>
                                </div>
                                instagram
                            </li>
                            <li class="ship">
                                <div class="icon">
                                    <svg viewBox="0 0 32 32">
                                        <g filter="">
                                            <use xlink:href="#package"></use>
                                        </g>
                                    </svg>
                                </div>
                                youtube
                            </li>
                        </ul>
                    </div>

                    <div id="border">
                        <div id="line" class="one"></div>
                    </div>

                    <div id="right-side">
                        <div id="first" class="active">
                            <div class="icon big">
                                <svg viewBox="0 0 32 32">
                                    <g filter="">
                                        <use xlink:href="#shopping-cart"></use>
                                    </g>
                                </svg>
                            </div>

                            <h1>facebook</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at viverra est, eu finibus
                                mauris. Quisque tempus vestibulum fringilla. Morbi tortor eros, sollicitudin eu arcu sit
                                amet, aliquet sagittis dolor.</p>
                        </div>
                        <div id="second">
                            <div class="icon big">
                                <svg viewBox="0 0 32 32">
                                    <g filter="">
                                        <use xlink:href="#credit-card"></use>
                                    </g>
                                </svg>
                            </div>

                            <h1>twitter</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at viverra est, eu finibus
                                mauris. Quisque tempus vestibulum fringilla. Morbi tortor eros, sollicitudin eu arcu sit
                                amet, aliquet sagittis dolor. </p>
                        </div>
                        <div id="third">
                            <div class="icon big">
                                <svg viewBox="0 0 32 32">
                                    <g filter="">
                                        <use xlink:href="#gift"></use>
                                    </g>
                                </svg>
                            </div>

                            <h1>instagram</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at viverra est, eu finibus
                                mauris. Quisque tempus vestibulum fringilla. Morbi tortor eros, sollicitudin eu arcu sit
                                amet, aliquet sagittis dolor. </p>

                        </div>
                        <div id="fourth">
                            <div class="icon big">
                                <svg viewBox="0 0 32 32">
                                    <g filter="">
                                        <use xlink:href="#package"></use>
                                    </g>
                                </svg>
                            </div>

                            <h1>youtube</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at viverra est, eu finibus
                                mauris. Quisque tempus vestibulum fringilla. Morbi tortor eros, sollicitudin eu arcu sit
                                amet, aliquet sagittis dolor. </p>

                        </div>
                    </div>
                </div>
                {{-- End 17/08/2023 --}}


            </div>
        </div>
    </div>


@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'> --}}



<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <style>
        /* Start 17/08/2023 */
        ul,
        li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .icon {
            position: relative;
            width: 32px;
            height: 32px;
            display: block;
            fill: rgba(51, 51, 51, 0.5);
            margin-right: 20px;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        .icon.active {
            fill: #E74C3C;
        }

        .icon.big {
            width: 64px;
            height: 64px;
            fill: rgba(51, 51, 51, 0.5);
        }

        #wrapper {
            width: 900px;
            height: 400px;
            /* position: absolute; */
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: left;
            -ms-flex-pack: left;
            justify-content: left;
            overflow: hidden;
        }

        #left-side {
            height: 70%;
            width: 25%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        #left-side ul li {
            padding-top: 10px;
            padding-bottom: 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            line-height: 34px;
            color: rgba(51, 51, 51, 0.5);
            font-weight: 500;
            cursor: pointer;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        #left-side ul li:hover {
            color: #333333;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        #left-side ul li:hover>.icon {
            fill: #333;
        }

        #left-side ul li.active {
            color: #333333;
        }

        #left-side ul li.active:hover>.icon {
            fill: #E74C3C;
        }

        #border {
            height: 288px;
            width: 1px;
            background-color: rgba(51, 51, 51, 0.2);
        }

        #border #line.one {
            width: 5px;
            height: 54px;
            background-color: #E74C3C;
            margin-left: -2px;
            margin-top: 35px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #border #line.two {
            width: 5px;
            height: 54px;
            background-color: #E74C3C;
            margin-left: -2px;
            margin-top: 89px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #border #line.three {
            width: 5px;
            height: 54px;
            background-color: #E74C3C;
            margin-left: -2px;
            margin-top: 143px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #border #line.four {
            width: 5px;
            height: 54px;
            background-color: #E74C3C;
            margin-left: -2px;
            margin-top: 197px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        #right-side {
            height: 300px;
            width: 75%;
            overflow: hidden;
        }

        #right-side #first,
        #right-side #second,
        #right-side #third,
        #right-side #fourth {
            /* position: absolute; */
            height: 300px;
            width: 75%;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
            margin-top: -350px;
            opacity: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        #right-side #first h1,
        #right-side #second h1,
        #right-side #third h1,
        #right-side #fourth h1 {
            font-weight: 800;
            color: #333;
        }

        #right-side #first p,
        #right-side #second p,
        #right-side #third p,
        #right-side #fourth p {
            color: #333;
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
        }

        #right-side #first.active,
        #right-side #second.active,
        #right-side #third.active,
        #right-side #fourth.active {
            margin-top: 55px;
            opacity: 1;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
        }

        /* End 17/08/2023 */










        .font-head {
            font-weight: 400;
            color: black;
            font-size: 15px;
        }

        .font-doc {
            font-weight: 600;
            color: rgb(245, 165, 60);
            font-size: 20px;
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




        /* for social media icon */
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

        /* Social media End */




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

        /* Social media icon */
    </style>
@endpush
@push('script')
    <script
        src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
    </script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        $(".choose").click(function() {
            $(".choose").addClass("active");
            $(".choose > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".wrap").removeClass("active");
            $(".ship").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $("#line").addClass("one");
            $("#line").removeClass("two");
            $("#line").removeClass("three");
            $("#line").removeClass("four");
        })

        $(".pay").click(function() {
            $(".pay").addClass("active");
            $(".pay > .icon").addClass("active");
            $(".choose").removeClass("active");
            $(".wrap").removeClass("active");
            $(".ship").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $("#line").addClass("two");
            $("#line").removeClass("one");
            $("#line").removeClass("three");
            $("#line").removeClass("four");
        })

        $(".wrap").click(function() {
            $(".wrap").addClass("active");
            $(".wrap > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".choose").removeClass("active");
            $(".ship").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $(".ship > .icon").removeClass("active");
            $("#line").addClass("three");
            $("#line").removeClass("two");
            $("#line").removeClass("one");
            $("#line").removeClass("four");
        })

        $(".ship").click(function() {
            $(".ship").addClass("active");
            $(".ship > .icon").addClass("active");
            $(".pay").removeClass("active");
            $(".wrap").removeClass("active");
            $(".choose").removeClass("active");
            $(".pay > .icon").removeClass("active");
            $(".wrap > .icon").removeClass("active");
            $(".choose > .icon").removeClass("active");
            $("#line").addClass("four");
            $("#line").removeClass("two");
            $("#line").removeClass("three");
            $("#line").removeClass("one");
        })

        $(".choose").click(function() {
            $("#first").addClass("active");
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $("#fourth").removeClass("active");
        })

        $(".pay").click(function() {
            $("#first").removeClass("active");
            $("#second").addClass("active");
            $("#third").removeClass("active");
            $("#fourth").removeClass("active");
        })

        $(".wrap").click(function() {
            $("#first").removeClass("active");
            $("#second").removeClass("active");
            $("#third").addClass("active");
            $("#fourth").removeClass("active");
        })

        $(".ship").click(function() {
            $("#first").removeClass("active");
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $("#fourth").addClass("active");
        })
        //# sourceURL=pen.js
    </script>
@endpush
