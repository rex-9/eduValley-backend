<div class="col-span-1 shadow-lg">

    <nav class="fixed z-10 hidden lg:block " x-data="{ open: false, tab: '' }">

        <div :class="open ? 'absolute top-0 left-0 w-48 h-screen bg-white' : 'absolute top-0 left-0 w-16 h-screen bg-white'"
            style="/* Rectangle 12 */ box-shadow: 2px 0px 15px rgba(0, 0, 0, 0.1); ">

            <button x-on:click="open = ! open">
                <div :class="open ? 'hidden' : ''">
                    <svg viewBox="0 0 20 20 " fill="currentColor " class="mb-48 leftNav">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z "
                            clip-rule="evenodd "></path>
                    </svg>
                </div>
                <div :class="open ? '' : 'hidden'">
                    <svg class="mb-48 leftNav" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" x
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 42 42">
                        <path fill-rule="evenodd"
                            d="M21.002 26.588l10.357 10.604c1.039 1.072 1.715 1.083 2.773 0l2.078-2.128c1.018-1.042 1.087-1.726 0-2.839L25.245 21L36.211 9.775c1.027-1.055 1.047-1.767 0-2.84l-2.078-2.127c-1.078-1.104-1.744-1.053-2.773 0L21.002 15.412L10.645 4.809c-1.029-1.053-1.695-1.104-2.773 0L5.794 6.936c-1.048 1.073-1.029 1.785 0 2.84L16.759 21L5.794 32.225c-1.087 1.113-1.029 1.797 0 2.839l2.077 2.128c1.049 1.083 1.725 1.072 2.773 0l10.358-10.604z"
                            fill="currentColor" />
                    </svg>
                </div>
            </button>

            <div class="flex items-end cursor-pointer">
                <a href="{{ route('teacher') }}">
                    <svg class="leftNav" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                        <path
                            d="M4 6v2h22v16H12v2h18v-2h-2V6H4zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4zM14 10v2h5v-2h-5zm7 0v2h3v-2h-3zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2zM14 14v2h10v-2H14zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3.005 3.005 0 0 0 9.504 18H4z"
                            fill="currentColor" />
                    </svg>
                    <div :class="open ? 'leftNavLabel' : 'hidden'">Teachers</div>
                </a>
            </div>

            <div class="flex items-end cursor-pointer">
                <a href="{{ route('course') }}">
                    <svg class="leftNav" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <g fill="none">
                            <path d="M2 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1V6z" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1V6z" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                    <div :class="open ? 'leftNavLabel' : 'hidden'">Courses</div>
                </a>
            </div>

            <div class="flex items-end cursor-pointer">
                <a href="{{ route('ad') }}">
                    <svg class="leftNav" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <g fill="none">
                            <path
                                d="M11.074 2.633c.32-.844 1.531-.844 1.852 0l2.07 5.734c.145.38.514.633.926.633h5.087c.94 0 1.35 1.17.611 1.743L18 14a.968.968 0 0 0-.322 1.092L19 20.695c.322.9-.72 1.673-1.508 1.119l-4.917-3.12a1 1 0 0 0-1.15 0l-4.917 3.12c-.787.554-1.83-.22-1.508-1.119l1.322-5.603A.968.968 0 0 0 6 14l-3.62-3.257C1.64 10.17 2.052 9 2.99 9h5.087a.989.989 0 0 0 .926-.633l2.07-5.734z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                    <div :class="open ? 'leftNavLabel' : 'hidden'">Ads</div>
                </a>
            </div>


        </div>

    </nav>
</div>

<!-- mobile start -->

<nav class="flex justify-end z-3 lg:hidden ">

    <div class="fixed bottom-0 left-0 flex items-center w-screen h-20 bg-white"
        style="/* Rectangle 12 */ border-radius: 50px 50px 0 0;  box-shadow: 2px 0px 15px rgba(0, 0, 0, 0.1); ">

        <div class="fixed cursor-pointer botNav" style="left:50px">
            <a href="{{ route('teacher') }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                    <path
                        d="M4 6v2h22v16H12v2h18v-2h-2V6H4zm4.002 3A4.016 4.016 0 0 0 4 13c0 2.199 1.804 4 4.002 4A4.014 4.014 0 0 0 12 13c0-2.197-1.802-4-3.998-4zM14 10v2h5v-2h-5zm7 0v2h3v-2h-3zM8.002 11C9.116 11 10 11.883 10 13c0 1.12-.883 2-1.998 2C6.882 15 6 14.12 6 13c0-1.117.883-2 2.002-2zM14 14v2h10v-2H14zM4 18v8h2v-6h3v6h2v-5.342l2.064 1.092c.585.31 1.288.309 1.872 0v.002l3.53-1.867l-.933-1.77l-3.531 1.867l-3.096-1.634A3.005 3.005 0 0 0 9.504 18H4z"
                        fill="currentColor" />
                </svg>
            </a>
        </div>

        <div class="fixed cursor-pointer botNav" style="left:50%">
            <a href="{{ route('course') }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <g fill="none">
                        <path d="M2 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1V6z" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 6s1.5-2 5-2s5 2 5 2v14s-1.5-1-5-1s-5 1-5 1V6z" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                </svg>
            </a>
        </div>

        <div class="fixed cursor-pointer botNav" style="right: 50px;">
            <a href="{{ route('ad') }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <g fill="none">
                        <path
                            d="M11.074 2.633c.32-.844 1.531-.844 1.852 0l2.07 5.734c.145.38.514.633.926.633h5.087c.94 0 1.35 1.17.611 1.743L18 14a.968.968 0 0 0-.322 1.092L19 20.695c.322.9-.72 1.673-1.508 1.119l-4.917-3.12a1 1 0 0 0-1.15 0l-4.917 3.12c-.787.554-1.83-.22-1.508-1.119l1.322-5.603A.968.968 0 0 0 6 14l-3.62-3.257C1.64 10.17 2.052 9 2.99 9h5.087a.989.989 0 0 0 .926-.633l2.07-5.734z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                </svg>
            </a>
        </div>

</nav>
<!-- mobile end -->
