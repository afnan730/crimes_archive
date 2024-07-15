<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
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

    /* For both inside page's main heading and 'view me' text on card front cover */
    .inside-page__heading,
    .card-front__text-view {
        font-size: 1.3rem;
        font-weight: 800;
        margin-top: .2rem;
    }

    .inside-page__heading--city,
    .card-front__text-view--city {
        color: #823F42;
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
        border-color: #823F42;
        color: #823F42;
    }

    .inside-page__btn--city::before {
        background-color: #823F42;
    }

    .inside-page__btn:hover {
        color: #fafbfa;
    }

    .inside-page__btn:hover::before {
        transform: scaleY(1);
    }

    /* Layout Structure=========================================*/



    /* Container to hold all cards in one place */
    .card-area {
        align-items: center;
        display: flex;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-evenly;
        padding: 1rem;
    }

    /* Card ============================================*/

    /* Area to hold an individual card */
    .card-section {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    /* A container to hold the flip card and the inside page */
    .card {
        background-color: rgba(0, 0, 0, .05);
        box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.5);
        height: 25rem;
        position: relative;
        transition: all 1s ease;
        width: 25rem;
    }

    /* Flip card - covering both the front and inside front page */

    /* An outer container to hold the flip card. This excludes the inside page */
    .flip-card {
        height: 25rem;
        perspective: 100rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        visibility: hidden;
        width: 25rem;
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
        height: 25rem;
        width: 25rem;
    }

    /* Front side's top section */
    .card-front__tp {
        align-items: center;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
        display: flex;
        flex-direction: column;
        height: 22rem;
        justify-content: center;
        padding: .75rem;
    }

    .card-front__tp--city {
        background: linear-gradient(to bottom, #8A4B4E, #823F42);
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

    /* Specifically targeting the <video> element */
    .video__container {
        clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
        height: 100%;
        min-height: 100%;
        object-fit: contain;
        width: 100%;
    }

    /* Inside page */

    .inside-page {
        background-color: #fafbfa;
        box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.25);
        height: 100%;
        padding: 1rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        width: 25rem;
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
    .card:hover {
        box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.75);
        width: 40rem;
    }

    /* When the card is hovered, the flip card container will rotate */
    .card:hover .flip-card__container {
        transform: rotateY(-180deg);
    }

    /* When the card is hovered, the shadow on the inside page will shrink to the left */
    .card:hover .inside-page {
        box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.1);
    }

    /* Make the video fit the container width */
    .card-front__tp video {
        width: 90%;
        height: 100%;
        object-fit: fill;
    }
</style>

<body>

    <section class="card-section">
        <div class="card">
            <div class="flip-card">
                <div class="flip-card__container">
                    <div class="card-front">
                        <div class="card-front__tp card-front__tp--city">
                            {{-- @if (Str::endsWith($crime->media, ['.mp4', '.avi', '.mov', '.wmv'])) --}}
                            <video>
                                <source src="{{ asset('storage/media/History/1720090721_v5.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            {{-- Check if media is an image --}}
                            {{-- @elseif (Str::endsWith($crime->media, ['.jpg', '.jpeg', '.png', '.gif'])) --}}
                            {{-- <img src="{{ asset('storage/images/j.jpg') }}" alt="" width="80%"
                                                height="auto"> --}}
                            {{-- <img class="card-img-top" src="{{ asset('storage/' . $crime->media) }}"
                                                    alt="Card image cap"> --}}
                            {{-- Default case (handle other file types or no media) --}}
                            {{-- @else
                                                <p>No media available</p>
                                            @endif --}}


                        </div>
                        <div class="card-front__bt">
                            <p class="card-front__text-view card-front__text-view--city">
                                View Crime
                            </p>
                        </div>
                    </div>
                    <div class="card-back">
                        <video class="video__container" controls>
                            <source class="video__media" src="{{ asset('storage/media/History/1720090721_v5.mp4') }}"
                                type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="inside-page">
                <div class="inside-page__container">
                    <h3 class="inside-page__heading inside-page__heading--city">
                        For urban lovers
                    </h3>
                    <p class="inside-page__text">
                        As cities never sleep, there are always something going on, no matter what time!
                        As cities never sleep, there are always something going on, no matter what time!
                    </p>
                    <a href="#" class="inside-page__btn inside-page__btn--city">View Crime</a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
