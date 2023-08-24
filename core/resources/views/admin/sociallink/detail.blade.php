@extends('admin.layouts.app')
@section('panel')
    <div class="pt-80 pb-80">
        <div class="influencer-profile-area">
            {{-- <div class="container"> --}}


            {{-- <h1>Facebook</h1> --}}
            <div class="full__container">
                @foreach ($project as $project)
                    <a href="{{ $project->url }}" target="_blank">
                        <div class="post">
                            <div class="post__image"><img src="{{ url('assets/images/thumbnail/' . $project->thumbnail) }}" />
                                @if ($project->sociallink_id == 1)
                                    <div class="social__media_icon"><i class="fab fa-youtube"> </i></div>
                                @elseif($project->sociallink_id == 2)
                                    <div class="social__media_icon"><i class="fab fa-facebook-f"> </i></div>
                                @elseif($project->sociallink_id == 3)
                                    <div class="social__media_icon"><i class="fab fa-twitter"> </i></div>
                                @elseif($project->sociallink_id == 4)
                                    <div class="social__media_icon"><i class="fab fa-instagram"> </i></div>
                                @endif
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
                                        {{ $project->description }}</article>
                                    {{-- <ul class="hashtags">
                                <li>#OnBrand</li>
                                <li>#event</li>
                                <li>#volunteers</li>
                                <li>#volunteering</li>
                                <li>#eventPlanner</li>
                                <li>#branding</li>
                                <li>#conference</li>
                            </ul> --}}
                                    <hr />
                                    <div class="date"><span style="color: #00BCD4; font-weight: 700;">Posted:</span>
                                        {{ $project->created_at->format('d-m-Y') }}</div>

                                    {{-- <div class="actions" >
                                <div class="action like"><i class="fas fa-heart"> </i><span>20</span></div>
                                <div class="action share"><i class="fas fa-share-alt"></i><span>28</span></div>
                                <div class="action comment"><i class="far fa-comment-alt"></i><span>13</span></div>
                            </div> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            {{-- End --}}

            {{-- </div> --}}
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/images/extra/ph1.jpeg') }}">
    <style>
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
