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
                            @if ($social_link->social_media == 4)
                                <div class="col">
                                    <div class="bg-ico" id="instagram"><i
                                            class="fab fa-instagram social instagram fa-3x"></i>
                                    </div>
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
                            @elseif($social_link->social_media == 1)
                                <div class="col">
                                    <div class="bg-ico" id="youtube"><i
                                            class="fab fa-youtube social youtube fa-3x"></i>
                                    </div>
                                </div>
                            @endif


                            <div class="col">
                                <ul class="">
                                    <li class="">
                                        @if ($social_link->social_media == 1)
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

                                                    <a href="{{ $project_link->proj_url }}" target="_blank"
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



            </div>

        </div>
    </div>

    {{-- 22 --}}
    <!-- Demo header-->
    <div class="container py-4">

        <div class="row">
            <div class="col-md-3">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill"
                        href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-facebook mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Facebook</span>
                    </a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill"
                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Twitter</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill"
                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fa fa-star mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Youtube</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill"
                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <i class="fa fa-check mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">Instagram</span></a>
                </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="border-card">

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
                                    <img class="text-center" src="{{ asset('assets/images/extra/rupee.png') }}"
                                        height="30px" width="30px">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="row ">
                            <div class="col-md-12 mx-auto"> <!-- Profile widget -->
                                <div class="bg-white rounded overflow-hidden">
                                    <div class="row m-b-r m-t-3 px-4 pt-0 pb-4">
                                        <div class="col-md-2 offset-md-1">
                                            <img src="https://mdbootstrap.com/images/avatars/img%20(1).jpg" alt="" class="img-circle img-fluid">
                                        </div>
                                        <div class="col-md-9 p-t-2">
                                            <h2 class="h2-responsive">@abhishek <button type="button"
                                                    class="btn btn-info-outline waves-effect">Follow</button></h2>
                                            <p>A K</p>
                                        </div>
                                    </div>

                                    <div class="bg-light p-4 d-flex justify-content-end text-center">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="font-weight-bold mb-0 d-block">215</h5><small
                                                    class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="font-weight-bold mb-0 d-block">745</h5><small
                                                    class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="font-weight-bold mb-0 d-block">340</h5><small
                                                    class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="py-4 px-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="mb-0">Recent Projects</h5><a href="#"
                                                class="btn btn-link text-muted">Show all</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2 pr-lg-1"><img
                                                    src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                    alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 mb-2 pl-lg-1"><img
                                                    src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                    alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 pr-lg-1 mb-2"><img
                                                    src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                                                    alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 pl-lg-1"><img
                                                    src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                                    alt="" class="img-fluid rounded shadow-sm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        {{-- <h4 class="font-italic mb-4">Youtube</h4>
                        <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p> --}}
                        <section id="about-section" class="p-100 pb-2 bg-one-dark">
                            <div class="container">
                                <div class="row d-flex align-items-end">

                                    <div class="col-md-12">

                                        <h2 class="text-white mb-4"><span class="color-base">ABOUT US!</span>
                                        </h2>

                                        <div class="row">
                                            <div class="col-md-12 about-bullet">
                                                <ul class="bullet-check">
                                                    <li>Different of web development</li>
                                                    <li>Gun Violence Prevention</li>
                                                    <li>Eiusmod tempor incidid labore</li>
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="wrap-button mt-50">
                                            <a href="#" class="btn btn-medium btn-inline btn-fill mr-4">Cv
                                                Download</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="about-info-wrap p-100">
                                    <div class="about-info p-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="text-white text-uppercase mb-4">Contact Now</h6>
                                                <p><i
                                                        class="fas fa-envelope-open-text mr-2 color-base"></i>freebootstrapui@gmail.com
                                                </p>
                                                <p><i class="fas fa-phone-alt mr-2 color-base"></i>+012 345 678 910</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="text-white text-uppercase mb-4">Address</h6>
                                                <p><i class="fas fa-map-marker-alt mr-2 color-base"></i>145 heera nager,
                                                    jaipur ,India

                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h4 class="font-italic mb-4">Instagram</h4>
                        <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- 22 --}}
@endsection

@push('style')
    {{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css"> --}}
    <style>
        /* p */
        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat
        }

        .profile-photo {
			width:48px;
			height:auto;
		}

        /* p */
        /* 23 */

        a:hover,
        a:focus,
        a:visited {
            text-decoration: none;
            outline: none;
            outline-offset: 0;
        }

        a:hover {
            color: #fabf15;
        }

        i {
            vertical-align: middle;
        }

        ul {
            padding: 0 !important;
        }

        li {
            list-style: none;
        }

        .color-base {
            color: #fabf15;
        }

        .bg-one-dark {
            background: #043f3a !important;
        }

        .p-100 {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .btn {
            text-transform: uppercase;
        }

        .btn:focus {
            box-shadow: none;
        }

        .btn:hover {
            color: #fff;
        }

        .btn-medium {
            font-family: "Rubik", sans-serif;
            background: transparent;
            color: #fabf15;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 45px;
            border-radius: 4px;
            border: 1px solid #fabf15;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .btn-medium:hover {
            background: #fabf15;
            color: #222;
            -webkit-box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
            -ms-transform: translateY(-3px);
            -webkit-transform: translateY(-3px);
        }

        .btn-fill {
            background: #fabf15 !important;
            color: #222 !important;
        }

        .btn-fill:hover {
            background: #ffb400;
            border-color: #ffb400;
        }

        /* .about-info {
                        border: 2px solid rgba(255, 255, 255, 0.2);
                    } */

        #about-section img {
            position: relative;
            z-index: 1;
        }

        .inline-social ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .bullet-check li {
            position: relative;
            padding-left: 30px;
            padding-bottom: 10px;
            color: #fff;
        }

        .bullet-check li:last-child {
            padding-bottom: 0;
        }

        .bullet-check li:before {
            position: absolute;
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 15px;
            left: 0;
        }

        /*! responsive */
        @media (max-width: 480px) {
            .about-info-wrap {
                padding: 10px !important;
                margin-top: 30px;
            }

            .about-info {
                padding: 30px !important;
            }
        }

        @media (max-width: 767px) {
            h2 {
                font-size: 32px;
            }

            .wrap-button img {
                margin-top: 20px;
            }

            .about-info-wrap {
                padding: 10px !important;
                margin-top: 30px;
            }

            .about-info {
                padding: 30px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            h2 {
                font-size: 30px;
            }

            .wrap-button img {
                margin-top: 20px;
            }

            .about-bullet {
                max-width: 100%;
                flex: 100%;
            }

            .about-info-wrap {
                padding: 10px !important;
                margin-top: 30px;
            }

            .about-info {
                padding: 30px !important;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .about-bullet {
                max-width: 100%;
                flex: 100%;
            }
        }

        /* 23 */
        /* 22 */
        .nav-pills-custom .nav-link {
            color: #aaa;
            background: #fff;
            position: relative;
        }

        .nav-pills-custom .nav-link.active {
            color: #45b649;
            background: #fff;
        }


        /* Add indicator arrow for the active tab */
        @media (min-width: 992px) {
            .nav-pills-custom .nav-link::before {
                content: '';
                display: block;
                border-top: 8px solid transparent;
                border-left: 10px solid #fff;
                border-bottom: 8px solid transparent;
                position: absolute;
                top: 50%;
                right: -10px;
                transform: translateY(-50%);
                opacity: 0;
            }
        }

        .nav-pills-custom .nav-link.active::before {
            opacity: 1;
        }

        /* 22 */




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
    {{-- <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script> --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
@endpush
