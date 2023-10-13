<style>
    .blog-single .entry-content img {
        width: auto !important;
    }
    .reaction-container{
        max-width:100%;
        padding:0 60px;
        position: relative;
    }

    .reaction-btn {
        font-weight: bold;
        color: #7f7f7f;
        position: relative;
        cursor: pointer;
        padding: 20px 0 0 0;
        margin-right: 35px;
    }

    .reaction-btn:hover {
        text-decoration: underline;
    }

    .like-btn-default {
        background-repeat: no-repeat;
        background-size: auto;
        background-position: -277px -446px;
    }

    .reaction-btn-emo {
        display: inline-block;
        margin: 0 6px -3px 0;
        width: 16px;
        height: 16px;
    }

    .reaction-btn-default{
        margin-right: -22px;
    }

    .emojies-box {
        height: 66px;
        width: 434px;
        padding: 10px;
        position: absolute;
        top: -53px;
        right: 109px;
        box-shadow: 1px 1px 2px #cccccc, -1px 0px 2px #eeeeee;
        border-radius: 44px 44px;
        display: none;
        background-color: white;
    }

    .emoji {
        list-style-type: none;
        cursor: pointer;
        display: inline-block;
        width: 48px;
        height: 48px;
        position: absolute;
        top: 8px;
        opacity: 0;
        transform: scale(1, 1);
        transition: opacity .5s ease-in-out 1s, transform .07s ease-in-out 0s, top .07s ease-in-out 0s;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center
    }

    .reaction-btn:hover .emojies-box {
        display: block;
    }

    .emo-like {
        right: 1px;
        width: 70px;
        transition-delay: 0s;
        background-image: url("{{ asset('site/images/reactions/like.jpg') }}");
    }

    .emo-love {
        right: 57px;
        width: 71px;
        transition-delay: .05s;
        background-image: url("{{ asset('site/images/reactions/love.gif') }}");
    }

    .emo-haha {
        right: 126px;
        transition-delay: .1s;
        background-image: url("{{ asset('site/images/reactions/haha.gif') }}");
    }

    .emo-wow {
        right: 178px;
        width: 62px;
        transition-delay: .15s;
        background-image: url("{{ asset('site/images/reactions/wow.gif') }}");
    }

    .emo-silent {
        right: 241px;
        width: 54px;
        transition-delay: .2s;
        background-image: url("{{ asset('site/images/reactions/silent.gif') }}");
    }

    .emo-sad {
        right: 298px;
        width: 65px;
        transition-delay: .25s;
        background-image: url("{{ asset('site/images/reactions/sad.gif') }}");
    }

    .emo-angry {
        width: 72px;
        right: 358px;
        transition-delay: .30s;
        background-image: url("{{ asset('site/images/reactions/angry.gif') }}");
    }



    .reaction-btn:hover .emoji {
        opacity: 1;
        animation-name: reaction_delay;
        animation-duration: .5s;
    }

    @keyframes    reaction_delay {
        0% {
            width: 48px;
            height: 48px;
            top: 60px;
        }
        48% {
            width: 56px;
            height: 56px;
            top: 5px;
        }
        100% {
            width: 48px;
            height: 48px;
            top: 8px;
        }
    }


    .reaction-btn:hover .emo-like {
        animation-delay: 0s
    }

    .reaction-btn:hover .emo-love {
        animation-delay: .05s
    }

    .reaction-btn:hover .emo-haha {
        animation-delay: .1s
    }

    .reaction-btn:hover .emo-wow {
        animation-delay: .15s
    }
    .reaction-btn:hover .emo-silent {
        animation-delay: .2s
    }

    .reaction-btn:hover .emo-sad {
        animation-delay: .25s
    }

    .reaction-btn:hover .emo-angry {
        animation-delay: .30s
    }

    .emoji:hover {
        transform: scale(1.3, 1.3);
        top: 2px
    }



    .emoji::before {
        display: inline-block;
        color: #ffffff;
        text-align: center;
        line-height: 17px;
        font-size: .7em;
        width: 80%;
        height: 17px;
        margin-left: 10%;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 20px;
        position: absolute;
        top: -25px;
        opacity: 0;
        transition: opacity .2s ease-in-out 0s;
    }

    .emoji:hover::before {
        opacity: 1
    }

    .emo-like::before {
        content: 'Like'
    }

    .emo-love::before {
        content: 'Love'
    }

    .emo-haha::before {
        content: 'Haha'
    }

    .emo-wow::before {
        content: 'Wow'
    }

    .emo-silent::before {
        content: 'Silent'
    }


    .emo-sad::before {
        content: 'Sad'
    }

    .emo-angry::before {
        content: 'Angry'
    }

    .like-stat {
        margin-top: 10px;
    }


    .like-btn-like{
        background-image: url('{{ asset('site/images/reactions/like.jpg') }}');
        background-repeat: no-repeat;
        background-size: 49px;
        background-position: -10px -10px;
        width: 30px;
        height: 30px;

    }

    .like-btn-love{
        background-image: url('{{ asset('site/images/reactions/love.gif') }}');
        background-repeat: no-repeat;
        background-size: 50px;
        background-position: -9px -10px;
        width: 32px;
        height: 30px;
    }

    .like-btn-haha{
        background-image: url('{{ asset('site/images/reactions/haha.gif') }}');
        background-repeat: no-repeat;
        background-size: 32px;
        background-position: -1px 0px;
        width: 30px;
        height: 31px;
    }

    .like-btn-wow{
        background-image: url('{{ asset('site/images/reactions/wow.gif') }}');
        background-repeat: no-repeat;
        background-size: 45px;
        background-position: -7px -8px;
        width: 32px;
        height: 30px;
    }

    .like-btn-silent{
        background-image: url('{{ asset('site/images/reactions/silent.gif') }}');
        background-repeat: no-repeat;
        background-size: 38px;
        background-position: -3px -4px;
        width: 33px;
        height: 30px;
    }

    .like-btn-sad{
        background-image: url('{{ asset('site/images/reactions/sad.gif') }}');
        background-repeat: no-repeat;
        background-size: 46px;
        background-position: -6px -8px;
        width: 33px;
        height: 31px;
    }

    .like-btn-angry{
        background-image: url('{{ asset('site/images/reactions/angry.gif') }}');
        background-repeat: no-repeat;
        background-size: 51px;
        background-position: -9px -10px;
        width: 33px;
        height: 31px;
    }

    .reaction-btn-text-like {
        color:rgb(88, 144, 255);
        position: relative;
        top: -5px;
    }
    .reaction-btn-text-wow,.reaction-btn-text-haha,.reaction-btn-text-silent,.reaction-btn-text-sad {
        color:rgb(240, 186, 21);
        position: relative;
        top: -5px;
    }
    .reaction-btn-text-love{
        color:rgb(242, 82, 104);
        position: relative;
        top: -5px;
    }
    .reaction-btn-text-angry{
        color:rgb(247, 113, 75);
        position: relative;
        top: -5px;
    }

    .like-emo > span{
        display: inline-block;
        margin: 0 -3px -3px 0px;
        width: 16px;
        height: 16px;
        border: 1px solid #EEE;
        border-radius: 50%;

    }

    .like-details{
        margin-left:10px;
        color:#9197a3;
        font-size:12px;
    }


    .comment-item{
        margin-right: inherit !important;
        margin-left: 0.5rem !important;
    }
    @media (min-width: 548px) and (max-width: 767px) {

        .emojies-box{
            right: 71px;
        }
    }

    @media (max-width: 548px)  {

        .emojies-box{
            right:-23px;
        }
    }

    @media (max-width: 990px)  {

        .blog-single .entry-content img {
            width: 100% !important;
        }
    }

    @media (max-width: 634px)  {

        body{
            overflow-x: hidden !important;
        }
    }
</style>
