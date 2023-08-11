/* Social icons 1 */
@import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
.socialbtns,
.socialbtns ul,
.socialbtns li {
    margin: 0;
    padding: 5px;
}

.socialbtns li {
    list-style: none outside none;
    display: inline-block;
}

.socialbtns .fa {
    width: 40px;
    height: 28px;
    color: #000;
    background-color: #FFF;
    border: 1px solid #000;
    padding-top: 12px;
    border-radius: 22px;
    -moz-border-radius: 22px;
    -webkit-border-radius: 22px;
    -o-border-radius: 22px;
}

.socialbtns .fa:hover {
    color: #ffffff;
    background-color: #000;
    border: 1px solid #000;
}
/* End */

/* social icon 2 */

/* Wrapper */
.icon-button {
    background-color: white;
    border-radius: 2.6rem;
    cursor: pointer;
    display: inline-block;
    font-size: 1.3rem;
    height: 2.6rem;
    line-height: 2.6rem;
    margin: 0 5px;
    position: relative;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    width: 2.6rem;
}

/* Circle */
.icon-button span {
    border-radius: 0;
    display: block;
    height: 0;
    left: 50%;
    margin: 0;
    position: absolute;
    top: 50%;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
            transition: all 0.3s;
    width: 0;
}
.icon-button:hover span {
    width: 2.6rem;
    height: 2.6rem;
    border-radius: 2.6rem;
    margin: -1.3rem;
}

/* Icons */
.icon-button i {
    background: none;
    color: white;
    height: 2.6rem;
    left: 0;
    line-height: 2.6rem;
    position: absolute;
    top: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
            transition: all 0.3s;
    width: 2.6rem;
    z-index: 10;
}


.twitter span {
    background-color: #4099ff;
}
.facebook span {
    background-color: #3B5998;
}
.google-plus span {
    background-color: #db5a3c;
}
.tumblr span {
    background-color: #34526f;
}
.instagram span {
    background-color: #517fa4;
}
.youtube span {
    background-color: #bb0000;
}
.pinterest span {
    background-color: #cb2027;
}



.icon-button .icon-twitter {
    color: #4099ff;
}
.icon-button .icon-facebook {
    color: #3B5998;
}
.icon-button .fa-tumblr {
    color: #34526f;
}
.icon-button .icon-google-plus {
    color: #db5a3c;
}
.icon-button .fa-instagram {
    color: #517fa4;
}
.icon-button .fa-youtube {
    color: #bb0000;
}
.icon-button .fa-pinterest {
    color: #cb2027;
}




.icon-button:hover .icon-twitter,
.icon-button:hover .icon-facebook,
.icon-button:hover .icon-google-plus,
.icon-button:hover .fa-tumblr,
.icon-button:hover .fa-instagram,
.icon-button:hover .fa-youtube,
.icon-button:hover .fa-pinterest {
    color: white;
}

@media all and (max-width: 680px) {
.icon-button {
    border-radius: 1.6rem;
    font-size: 0.8rem;
    height: 1.6rem;
    line-height: 1.6rem;
    width: 1.6rem;
}

.icon-button:hover span {
    width: 1.6rem;
    height: 1.6rem;
    border-radius: 1.6rem;
    margin: -0.8rem;
}

.icon-button i {
    height: 1.6rem;
    line-height: 1.6rem;
    width: 1.6rem;
}
body {

    padding: 10px;
}
.pinterest {
display: none; 
}
/* End */



<ul>
    Social:              
    <li><a href="{{ route('influencer.twitter') }}" class="fab fa-lg fa-twitter"></a></li>                   
    <li><a href="{{ route('influencer.google') }}" class="fab fa-lg fa-youtube"></a></li>
    <li><a href="#" class="fab fa-lg fa-facebook"></a></li>
    <li><a href="#" class="fab fa-lg fa-instagram"></a></li>
    {{-- <li><a href="#" class="fab fa-lg fa-google-plus"></a></li>
    <li><a href="#" class="fab fa-lg fa-github"></a></li>
    <li><a href="#" class="fab fa-lg fa-pinterest"></a></li>
    <li><a href="#" class="fab fa-lg fa-linkedin"></a></li> --}}
    
</ul>


