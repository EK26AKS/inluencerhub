@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="pt-80 pb-80">
        <div class="influencer-profile-area">
            {{-- <div class="container"> --}}

                {{-- Start --}}
                {{-- <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row p-2 bg-white border rounded">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                        src="https://i.imgur.com/QpjAiHq.jpg"></div>
                                <div class="col-md-6 mt-1">
                                    <h5>Quant olap shirts</h5>
                                    <div class="d-flex flex-row">
                                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                            class="dot"></span><span>Light weight</span><span
                                            class="dot"></span><span>Best finish<br></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                            class="dot"></span><span>For men</span><span
                                            class="dot"></span><span>Casual<br></span></div>
                                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of
                                        Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even slightly
                                        believable.<br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>
                                    </div>
                                    <h6 class="text-success">Completed</h6>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"
                                            type="button">Details</button><button
                                            class="btn btn-outline-primary btn-sm mt-2" type="button">Add to
                                            wishlist</button></div>
                                </div>
                            </div>
                            <div class="row p-2 bg-white border rounded mt-2">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                        src="https://i.imgur.com/JvPeqEF.jpg"></div>
                                <div class="col-md-6 mt-1">
                                    <h5>Quant trident shirts</h5>
                                    <div class="d-flex flex-row">
                                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                            class="dot"></span><span>Light weight</span><span
                                            class="dot"></span><span>Best finish<br></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                            class="dot"></span><span>For men</span><span
                                            class="dot"></span><span>Casual<br></span></div>
                                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of
                                        Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even slightly
                                        believable.<br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1">$14.99</h4><span class="strike-text">$20.99</span>
                                    </div>
                                    <h6 class="text-success">Completed</h6>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"
                                            type="button">Details</button><button
                                            class="btn btn-outline-primary btn-sm mt-2" type="button">Add to
                                            wishlist</button></div>
                                </div>
                            </div>
                            <div class="row p-2 bg-white border rounded mt-2">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                        src="https://i.imgur.com/Bf4dIaN.jpg"></div>
                                <div class="col-md-6 mt-1">
                                    <h5>Quant ruybi shirts</h5>
                                    <div class="d-flex flex-row">
                                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i></div><span>123</span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                            class="dot"></span><span>Light weight</span><span
                                            class="dot"></span><span>Best finish<br></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                            class="dot"></span><span>For men</span><span
                                            class="dot"></span><span>Casual<br></span></div>
                                    <p class="text-justify text-truncate para mb-0">There are many variations of passages
                                        of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even slightly
                                        believable.<br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>
                                    </div>
                                    <h6 class="text-success">Completed</h6>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"
                                            type="button">Details</button><button
                                            class="btn btn-outline-primary btn-sm mt-2" type="button">Add to
                                            wishlist</button></div>
                                </div>
                            </div>
                            <div class="row p-2 bg-white border rounded mt-2">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                        src="https://i.imgur.com/HO8e9b8.jpg"></div>
                                <div class="col-md-6 mt-1">
                                    <h5>Quant tinor shirts</h5>
                                    <div class="d-flex flex-row">
                                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i></div><span>110</span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span
                                            class="dot"></span><span>Light weight</span><span
                                            class="dot"></span><span>Best finish<br></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span
                                            class="dot"></span><span>For men</span><span
                                            class="dot"></span><span>Casual<br></span></div>
                                    <p class="text-justify text-truncate para mb-0">There are many variations of passages
                                        of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even slightly
                                        believable.<br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1">$15.99</h4><span class="strike-text">$21.99</span>
                                    </div>
                                    <h6 class="text-success">Completed</h6>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"
                                            type="button">Details</button><button
                                            class="btn btn-outline-primary btn-sm mt-2" type="button">Add to
                                            wishlist</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- end --}}



                {{-- Start --}}

                {{-- <h1>Facebook</h1> --}}
                <div class="full__container">
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph2.jpeg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/7zlj89m72yw28d1/3.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>John Doe</h3><span>@johnny45</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    we had such a great time with our volunteers at last year's OnBrand Event!<span
                                        class="hashtag">#OnBrand 👏👏👏</span></article>
                                <ul class="hashtags">
                                    <li>#OnBrand</li>
                                    <li>#event</li>
                                    <li>#volunteers</li>
                                    <li>#volunteering</li>
                                    <li>#eventPlanner</li>
                                    <li>#branding</li>
                                    <li>#conference</li>
                                </ul>
                              <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions" >
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>28</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>13</span></div>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph4.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-twitter"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/f6o81rzo5h976h0/91.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Sarah Janes</h3><span>@sarah30</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    Multilayer Fashion Women Lady Alloy Clavicle Choker Necklace Charm Chain Jewelry ( 6953
                                    Watch Count )</article>
                                <ul class="hashtags">
                                    <li>#Multilayer</li>
                                    <li>#Fashion</li>
                                    <li>#Women</li>
                                </ul>
                                <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>12</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph5.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-instagram"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/mw85mey57qbp7uk/85.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Smith Doe</h3><span>@smith45</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    Good morning world!! 💪💪</article>
                                <ul class="hashtags">
                                    <li>#mercedes</li>
                                    <li>#bodykit</li>
                                    <li>#performance</li>
                                    <li>#atarius</li>
                                    <li>#atariusconcept</li>
                                </ul>
                                <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>25</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>30</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph3.jpeg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/aay4xgamzytcrgy/6.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Brian</h3><span>@brian30</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    Yes or No ⁉️</article>
                                <ul class="hashtags">
                                    <li>#mensstyle</li>
                                    <li>#modamasculina</li>
                                    <li>#menwithstyle</li>
                                    <li>#zaraman</li>
                                    <li>#fashionmenswear</li>
                                    <li>#casual</li>
                                    <li>#mensweardaily</li>
                                </ul>
                                <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph1.jpeg') }}" />
                            <div class="social__media_icon"><i class="fab fa-twitter"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/e93ttedjzxydrpy/18.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Anya</h3><span>@anya</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    Pick your favourite Follow<span class="hashtag">#ladyonlys</span></article>
                                <ul class="hashtags">
                                    <li>#womensfashion</li>
                                    <li>#womenfashion</li>
                                    <li>#girlstylelook</li>
                                    <li>#womenfashions</li>
                                    <li>#womenswear</li>
                                    <li>#ladyfashion</li>
                                </ul>
                                <hr />

                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph4.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-instagram"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/ujll5owdc11z213/41.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Brick Ollen</h3><span>@ollen25</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    Coming out with something special this week! ⛱️</article>
                                <ul class="hashtags">
                                    <li>#lifestyleblog</li>
                                    <li>#vlog</li>
                                    <li>#contentcreators</li>
                                    <li>#wanderlust</li>
                                </ul>
                                <hr />

                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph5.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-instagram"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/1n6unthvcozcuwe/67.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>Emma Watson</h3><span>@emma</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article> </article>
                                <ul class="hashtags">
                                    <li>#leaveonlyleaves</li>
                                    <li>#leaves</li>
                                    <li>#artistry_lords</li>
                                    <li>#tv_depthoffield</li>
                                    <li>#mode_emotive</li><span>🥰</span>
                                </ul>
                                <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph6.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/lruw4gucd4qns6m/46.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>George</h3><span>@george</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    There’s something magical and mesmerizing about the ocean... do you feel that too?! 🌊
                                </article>
                                <ul class="hashtags">
                                    <li>#ocean</li>
                                    <li>#oceanview</li>
                                    <li>#sea</li>
                                    <li>#seaside</li>
                                    <li>#beachday</li>
                                    <li>#beachlife</li>
                                    <li>#beach</li>
                                    <li>#travel</li>
                                </ul>
                                <hr />

                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions">
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>20</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>10</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph7.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/7zlj89m72yw28d1/3.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>John Doe</h3><span>@johnny45</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    we had such a great time with our volunteers at last year's OnBrand Event!<span
                                        class="hashtag">#OnBrand 👏👏👏</span></article>
                                <ul class="hashtags">
                                    <li>#OnBrand</li>
                                    <li>#event</li>
                                    <li>#volunteers</li>
                                    <li>#volunteering</li>
                                    <li>#eventPlanner</li>
                                    <li>#branding</li>
                                    <li>#conference</li>
                                </ul>
                              <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions" >
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>28</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>13</span></div>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph8.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/7zlj89m72yw28d1/3.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>John Doe</h3><span>@johnny45</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    we had such a great time with our volunteers at last year's OnBrand Event!<span
                                        class="hashtag">#OnBrand 👏👏👏</span></article>
                                <ul class="hashtags">
                                    <li>#OnBrand</li>
                                    <li>#event</li>
                                    <li>#volunteers</li>
                                    <li>#volunteering</li>
                                    <li>#eventPlanner</li>
                                    <li>#branding</li>
                                    <li>#conference</li>
                                </ul>
                              <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions" >
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>28</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>13</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post__image"><img
                                src="{{ asset('assets/images/extra/ph9.jpg') }}" />
                            <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                        </div>
                        <div class="post__content">
                            {{-- <div class="top__section">
                                <div class="profile__img"><img
                                        src="https://www.dropbox.com/s/7zlj89m72yw28d1/3.jpg?raw=1" /></div>
                                <div class="profile__title">
                                    <h3>John Doe</h3><span>@johnny45</span>
                                </div>
                            </div> --}}
                            <div class="bottom__section">
                                <article>
                                    we had such a great time with our volunteers at last year's OnBrand Event!<span
                                        class="hashtag">#OnBrand 👏👏👏</span></article>
                                <ul class="hashtags">
                                    <li>#OnBrand</li>
                                    <li>#event</li>
                                    <li>#volunteers</li>
                                    <li>#volunteering</li>
                                    <li>#eventPlanner</li>
                                    <li>#branding</li>
                                    <li>#conference</li>
                                </ul>
                              <hr />
                                <div class="date">Posted: 12-02-2019</div>
                                {{-- <div class="actions" >
                                    <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                    <div class="action share"><i class="fas fa-share-alt"></i><span>28</span></div>
                                    <div class="action comment"><i class="far fa-comment-alt"></i><span>13</span></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>


                </div>
                {{-- End --}}

            {{-- </div> --}}
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/images/extra/ph1.jpeg') }}">
    <style>
        /* body {
                    background: #eee
                }

                .ratings i {
                    font-size: 16px;
                    color: red
                }

                .strike-text {
                    color: red;
                    text-decoration: line-through
                }

                .product-image {
                    width: 100%
                }

                .dot {
                    height: 7px;
                    width: 7px;
                    margin-left: 6px;
                    margin-right: 6px;
                    margin-top: 3px;
                    background-color: blue;
                    border-radius: 50%;
                    display: inline-block
                }

                .spec-1 {
                    color: #938787;
                    font-size: 15px
                }

                h5 {
                    font-weight: 400
                }

                .para {
                    font-size: 16px
                } */


        /* @import url("https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap"); */

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            background: #00BCD4;
            overflow-x: hidden;
        } */

        /* h1 {
            text-align: center;
            margin: 3rem auto 0.8rem;
            text-transform: capitalize;
            color: white;
            font-weight: 700;
        } */

        .full__container {
            margin: 20px auto;
            display: block;
            max-width: 1080px;
            columns: 4;
            column-gap: 10px;
            padding: 20px;
        }

        .full__container .post {
            width: 100%;
            display: block;
            overflow: hidden;
            background: #fff;
            border-radius: 2px;
            box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.2);
            margin: 0 0 20px;
            break-inside: avoid;
        }

        .full__container .post .post__image {
            height: 200px;
            position: relative;
        }

        .full__container .post .post__image::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            display: block;
            width: 100%;
            height: 100%;
            background: black;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0) 30%);
            z-index: 2;
        }

        .full__container .post .post__image::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            display: block;
            width: 100%;
            height: 100%;
            background: black;
            /* background: linear-gradient(0deg, rgba(0, 0, 0, 0) 60%, rgba(0, 0, 0, 0.5) 100%); */
            /* z-index: 2; */
        }

        .full__container .post .post__image img {
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
            object-position: center;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .full__container .post .post__image .social__media_icon {
            position: absolute;
            top: 15px;
            left: 15px;
            display: block;
            width: 20px;
            height: 20px;
            overflow: hidden;
            z-index: 3;
        }

        .full__container .post .post__image .social__media_icon i {
            color: #fff;
            font-size: 1.1rem;
        }

        .full__container .post .post__content {
            padding: 15px;
        }

        .full__container .post .post__content .top__section {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin: 0.2rem 0 1.4rem;
        }

        .full__container .post .post__content .top__section .profile__img {
            display: block;
            overflow: hidden;
            width: 40px;
            height: 40px;
            border-radius: 50px;
            position: relative;
            border: 1px solid #3498db;
        }

        .full__container .post .post__content .top__section .profile__img img {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .full__container .post .post__content .top__section h3,
        .full__container .post .post__content .top__section span {
            margin: 0 0 0 0.5rem;
        }

        .full__container .post .post__content .top__section h3 {
            font-size: 1.2rem;
            margin: 0 0 0 0.5rem;
            color: #353535;
        }

        .full__container .post .post__content .top__section span {
            color: rgba(53, 53, 53, 0.7);
            font-size: 0.9rem;
        }

        .full__container .post .post__content .bottom__section article {
            text-transform: capitalize;
            font-size: 0.8rem;
            line-height: 1.4;
            color: rgba(0, 0, 0, 0.9);
        }

        .full__container .post .post__content .bottom__section article .hashtag {
            color: #00BCD4;
            font-weight: 500;
        }

        .full__container .post .post__content .bottom__section .hashtags {
            list-style: none;
            margin: 0.8rem 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .full__container .post .post__content .bottom__section .hashtags li {
            font-size: 0.8rem;
            margin: 0 0.2rem;
            color: #000000;
            font-weight: 200;
        }

        .full__container .post .post__content .bottom__section .date {
            color: rgba(0, 0, 0, 0.6);
            font-size: 0.8rem;
            /* padding: 0.2rem 0 0.7rem; */
        }

        .full__container .post .post__content .bottom__section .actions {
            display: flex;
        }

        .full__container .post .post__content .bottom__section .actions .action {
            display: flex;
            align-items: center;
            margin: 0 0.7rem 0 0;
        }

        .full__container .post .post__content .bottom__section .actions .action i {
            color: rgba(0, 0, 0, 0.7);
            font-size: 0.8rem;
        }

        .full__container .post .post__content .bottom__section .actions .action span {
            color: rgba(0, 0, 0, 0.5);
            font-size: 0.8rem;
            margin: 0 0 0 0.3rem;
        }

        @media screen and (max-width: 1200px) {
            .full__container {
                columns: 4;
            }
        }

        @media screen and (max-width: 992px) {
            .full__container {
                columns: 3;
            }
        }

        @media screen and (max-width: 768px) {
            .full__container {
                columns: 2;
            }
        }

        @media screen and (max-width: 480px) {
            .full__container {
                columns: 1;
            }
        }
    </style>
@endpush
