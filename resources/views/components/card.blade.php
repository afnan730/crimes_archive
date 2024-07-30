<div>
    <style>
        /* CSS reset */
        *,
        *::after,
        *::before {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        html {
            font-size: 62.5%;
        }

        body {
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
            position: relative;
        }

        /* Typography =======================*/

        /* Headings */

        /* Main heading for card's front cover */
        .card-front__heading {
            font-size: 1.5rem;
            margin-top: .25rem;
        }

        /* Main heading for inside page */
        .inside-page__heading {
            padding-bottom: 1rem;
            width: 100%;
        }

        /* Mixed */

        /* For both inside page's main heading and 'view me' text on card front cover */
        .inside-page__heading,
        .card-front__text-view {
            font-size: 1.3rem;
            font-weight: 800;
            margin-top: .2rem;
        }

        .inside-page__heading--city,
        .card-front__text-view--city {
            color: #55010A;
            background: linear-gradient(to bottom, #55010A, #8B0000);
            -webkit-background-clip: text;
            color: transparent;
        }

        /* Front cover */

        .card-front__tp {
            color: #fafbfa;
        }

        /* For pricing text on card front cover */
        .card-front__text-price {
            font-size: 1.2rem;
            margin-top: -.2rem;
        }

        /* Back cover */

        /* For inside page's body text */
        .inside-page__text {
            color: #333;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 8;
            white-space: normal;
        }

        /* Icons ===========================================*/

        .card-front__icon {
            fill: #fafbfa;
            font-size: 3vw;
            height: 3.25rem;
            margin-top: -.5rem;
            width: 3.25rem;
        }

        /* Buttons =================================================*/
        .inside-page__btn {
            background-color: transparent;
            border: 3px solid;
            border-radius: .5rem;
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 2rem;
            overflow: hidden;
            padding: .7rem .75rem;
            position: relative;
            text-decoration: none;
            transition: all .3s ease;
            width: 90%;
            z-index: 10;
        }

        .inside-page__btn::before {
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            transform: scaleY(0);
            transition: all .3s ease;
            width: 100%;
            z-index: -1;
        }

        .inside-page__btn--city {
            border-color: #55010A;
            color: #55010A;
        }

        .inside-page__btn--city::before {
            background-color: #55010A;
        }

        .inside-page__btn:hover {
            color: #fafbfa;
        }

        .inside-page__btn:hover::before {
            transform: scaleY(1);
        }

        /* Area to hold an individual card */
        .card-section {
            flex-basis: 20%;
            margin-bottom: 1rem;
        }


        /* A container to hold the flip card and the inside page */
        .card {
            background-color: rgba(0, 0, 0, .05);
            box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.5);
            height: 22rem;
            position: relative;
            transition: all 1s ease;
            width: 22rem;
            margin: 2rem;
        }

        /* Flip card - covering both the front and inside front page */

        /* An outer container to hold the flip card. This excludes the inside page */
        .flip-card {
            height: 22rem;
            perspective: 100rem;
            position: absolute;
            right: 0;
            transition: all 1s ease;
            visibility: hidden;
            width: 22rem;
            z-index: 100;
        }

        /* The outer container's visibility is set to hidden. This is to make everything within the container NOT set to hidden  */
        /* This is done so content in the inside page can be selected */
        .flip-card>* {
            visibility: visible;
        }

        /* An inner container to hold the flip card. This excludes the inside page */
        .flip-card__container {
            height: 100%;
            position: absolute;
            right: 0;
            transform-origin: left;
            transform-style: preserve-3d;
            transition: all 1s ease;
            width: 100%;
        }

        .card-front,
        .card-back {
            backface-visibility: hidden;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* Styling for the front side of the flip card */

        /* container for the front side */
        .card-front {
            background-color: #fafbfa;
            height: 22rem;
            width: 22rem;
        }

        /* Front side's top section */
        .card-front__tp {
            align-items: center;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
            display: flex;
            object-fit: contain;
            flex-direction: column;
            height: 17rem;
            justify-content: center;
        }

        .card-front__tp--city {
            background: linear-gradient(to bottom, #55010A, #8B0000);
        }

        /* Front card's bottom section */
        .card-front__bt {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        /* Styling for the back side of the flip card */

        .card-back {
            background-color: #fafbfa;
            transform: rotateY(180deg);
        }

        /* Specifically targeting the <video class="vw"> element */
        .video-container {
            height: 100%;
            object-fit: cover;
            width: 100%;
        }

        /* Inside page */

        .inside-page {
            background-color: #fafbfa;
            box-shadow: inset 22rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.25);
            height: 100%;
            padding: 1rem;
            position: absolute;
            right: 0;
            transition: all 1s ease;
            width: 22rem;
            z-index: 1;
        }

        .inside-page__container {
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        /* Functionality ====================================*/

        /* This is to keep the card centered (within its container) when opened */
        .card.clicked {
            box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.75);
            width: 44rem;
        }

        .card.clicked .flip-card__container {
            transform: rotateY(-180deg);
        }

        .card.clicked .inside-page {
            box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.1);
        }

        .vw {
            overflow: hidden;
            max-width: 100%;
        }
    </style>


    <section class="card-area">

        <!-- Card: City -->
        <section class="card-section">
            <div class="card">
                <div class="flip-card">
                    <div class="flip-card__container">
                        <div class="card-front">
                            <div class="card-front__tp card-front__tp--city">
                                @if (Str::endsWith($crime->media, ['.mp4', '.avi', '.mov', '.wmv']))
                                    <video width="90%">
                                        <source src="{{ asset('storage/' . $crime->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @elseif (Str::endsWith($crime->media, ['.jpg', '.jpeg', '.png', '.gif']))
                                    <img src="{{ asset('storage/' . $crime->media) }}" alt="" class="">
                                @else
                                    <p>No media available</p>
                                @endif
                            </div>

                            <div class="card-front__bt">
                                <p class="card-front__text-view card-front__text-view--city">
                                    {{ __('frontend.btn') }}
                                </p>
                            </div>
                        </div>
                        <div class="card-back">
                            @if (Str::endsWith($crime->media, ['.mp4', '.avi', '.mov', '.wmv']))
                                <video class=" video-container" controls>
                                    <source src="{{ asset('storage/' . $crime->media) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif (Str::endsWith($crime->media, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img class="video-container" src="{{ asset('storage/' . $crime->media) }}"
                                    alt="">
                            @else
                                <p>No media available</p>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="inside-page">
                    <div class="inside-page__container">

                        <p class="inside-page__text">
                            {{ $crime->text }}
                        </p>
                        <a href="{{ route('crime', ['lang' => App::getLocale(), 'id' => $crime->id]) }}"
                            class="inside-page__btn inside-page__btn--city">{{ __('frontend.btn') }}</a>
                    </div>
                </div>
            </div>
        </section>

    </section>
</div>
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function() {
            // Remove 'clicked' class from all cards
            document.querySelectorAll('.card').forEach(c => c.classList.remove('clicked'));
            // Add 'clicked' class to the clicked card
            this.classList.add('clicked');
        });
    });
</script>
