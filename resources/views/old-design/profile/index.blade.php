@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css-r/home/fund-my-trip.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-r/home/fund-my-trip-solo.css') }}" />

    <script src="/js/vue-gallery-slideshow.js"></script>

    <style>
        .image {
            cursor: pointer;
        }

        .add-border-radius {
            border-radius: 15px !important;
            width: fit-content;
        }



        .border,
        .bg-f9f9f9 {
            border-radius: 15px !important;
        }

        .price-badge {
            padding: 6px 16px;
            color: white;
            background-color: #fe2f70;
            border-radius: 8px 0px 0px 8px;
            position: absolute;
            right: 0;
        }

        .price-badge2 {
            padding: 6px 16px;
            color: white;
            background-color: #fe2f70;


        }

    </style>
@endsection


@section('content')

    <div id="vue_app" class="body-content">
        <section class="pb-5">
            <div class="wrapper">
                <div class="breadcrumb_ mb-4">
                    <ol class="">

                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
                <div class="flex-1 bg-f9f9f9 p-4 mb-3">
                    <div style="position: relative"><img style="    vertical-align: middle;
                                                                            border-style: none;
                                                                            width:200px;
                                                                            height: 200px;
                                                                            border-radius: 50%;
                                                                            object-fit: cover;" :src="profileImage"
                            alt="" />
                        @if (Auth::check() && Auth::id() == $user->id)
                            <i v-on:click="openDialogProfileImage"
                                style="position: absolute;right:10px;bottom:10px;color:rgb(0, 192, 0);cursor:pointer;"
                                class="fas fa-plus-circle fa-2x"></i>
                        @endif
                        <input type="file" accept="image/png, image/gif, image/jpeg" style="display: none"
                            @change="onChangeProfileImage" id="images_to_be_uploaded_profile_image" />

                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="mr-5">
                                <h4 class="gilroy-semi text-uppercase text-23242c font-22 mb-0">{{ $user->name }}</h4>
                            </div>
                            @if (Auth::check() && Auth::id() == $user->id)
                                <div><a href="{{ route('profile-personal-information', Auth::id()) }}"><i
                                            class="fas fa-edit font-20 text-000941 cursor-pointer"></i></a></div>
                            @endif
                        </div>

                        <div class="flex-2 d-flex">
                            <div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-envelope"></i>
                                    <span class="gilroy-medium font-12 line-height-21px text-23242c ml-1"> Email</span>
                                </div>
                                <p class="gilroy-medium font-12 mb-0 text-center">
                                    @if ($user->email_verified_at !== null)
                                        <span>
                                            <span
                                                class="verification-tag gilroy-regular rounded-pill font-12">Verified</span>
                                        </span>
                                    @else
                                        <span>Not Verified
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="gilroy-medium font-12 line-height-21px text-23242c ml-1"> Phone No</span>
                                </div>
                                <p class="gilroy-medium font-12 mb-0 text-center">
                                    @if ($user->phone_number_verified_at !== null)
                                        <span>
                                            <span
                                                class="verification-tag gilroy-regular rounded-pill font-12">Verified</span>
                                        </span>
                                    @else
                                        <span>Not Verified
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="trippbo-bar trippbo-bar-padding gilroy-regular border font-14">
                    <button class="tablink d-flex flex-row-responsive align-items-center trippbo-active"
                        onclick="openCity(event,'about');"><span>About</span></button>
                    <button class="tablink d-flex flex-row-responsive align-items-center"
                        onclick="openCity(event,'gallery');"><span>Gallery</span></button>
                    <button {!! !(Auth::check() && Auth::id() == $user->id) ? 'style="display: none !important;"' : '' !!} class="tablink d-flex flex-row-responsive align-items-center"
                        onclick="openCity(event,'upcoming-trips');"><span>My Trips</span></button>
                    <button {!! !(Auth::check() && Auth::id() == $user->id) ? 'style="display: none !important;"' : '' !!} class="tablink d-flex flex-row-responsive align-items-center"
                        onclick="openCity(event,'previuos-trips');"><span>My Solo Trips</span></button>
                    <button {!! !(Auth::check() && Auth::id() == $user->id) ? 'style="display: none !important;"' : '' !!} class="tablink d-flex flex-row-responsive align-items-center"
                        onclick="openCity(event,'manage-bookings');"><span>My Lottery Tickets</span></button>
                </div>
                <div id="about" class="p-3 city">
                    <p class="gilroy-regular font-14">
                        @if (Auth::check() && Auth::id() == $user->id)
                            <i v-on:click="editingDescription = true;"
                                class="fas fa-edit font-20 text-000941 cursor-pointer"></i>
                        @endif
                        <span v-if="!editingDescription">
                            @{{ description ? description : 'No information to display.' }}
                        </span>
                    <div>
                        <textarea v-if="editingDescription" v-model="description"
                            v-on:input="description = $event.target.value" rows="5" name="description"
                            class="form-control py-2"></textarea>
                    </div>
                    <div v-if="editingDescription" class="d-flex d-row justify-content-end align-items-center mt-2">
                        <div> <button type="button"
                                v-on:click="editingDescription = false; description = originalDescription"
                                class="btn btn-secondary gilroy-medium  font-12 text-capitalize add-border-radius">Cancel</button>
                        </div>
                        <div class="ml-2"> <button type="button" v-on:click="updateDescription"
                                class="btn btn-block gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-12 text-capitalize add-border-radius">Save</button>
                        </div>



                    </div>

                    </p>
                </div>
                <div id="gallery" class="pt-3 city" style="display:none">
                    <div class="grid-1">
                        @if (Auth::check() && Auth::id() == $user->id)
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div v-on:click="openDialog" style="cursor: pointer;"> <i class="fas fa-plus fa-2x"></i> Add
                                    Image</div>

                                <div v-if="imagesArray.length > 0" v-on:click="uploadImages"><button v-if
                                        class="btn btn-secondary" :disabled="uploading">UPLOAD IMAGE</button> </div>

                                <input type="file" accept="image/png, image/gif, image/jpeg" style="display: none"
                                    @change="onChange" id="images_to_be_uploaded" />
                            </div>
                        @endif
                        <img class="image" v-for="(image, imageIndex) in renderedImagesArray" :key="imageIndex"
                            :src="image" @click="index = imageIndex" alt="" />
                        <vue-gallery-slideshow :images="renderedImagesArray" :index="index" @close="index = null">
                        </vue-gallery-slideshow>
                        <div v-if="uploading">
                            <v-app>
                                <template>
                                    <v-sheet>
                                        <v-skeleton-loader type="image">
                                        </v-skeleton-loader>
                                    </v-sheet>
                                </template>
                            </v-app>
                        </div>

                    </div>
                </div>
                <div id="upcoming-trips" class="p-3 city" style="display:none">
                    <div class="portfolio-1 row mb-3" style="display: flex !important;">
                        @foreach ($trips as $trip)
                            <div class="col-lg-3">

                                <figure>
                                    <div style="border-top-left-radius: 15px;border-top-right-radius: 15px;">
                                        <div role="button" data-toggle="modal"
                                            data-link="{{ route('trip-browse', $trip->id) }}"
                                            data-target="#socialMediaShare"><span><i class="fas fa-share-alt"></i></span>
                                        </div>
                                        <img src="{{ $trip->trip_img ? asset('storage/' . $trip->trip_img) : asset('images-n/trips/1.jpg') }}"
                                            alt="" class="add-border-radius ">
                                    </div>
                                    <figcaption style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                                        <div>
                                            <h4 class="gilroy-semi font-20 mb-1"> destination country</h4>
                                        </div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span><a
                                                href="{{ route('profile-home', $trip->user->id) }}"> <span
                                                    class="gilroy-semi text-fe2f70">&nbsp;{{ $trip->user->name }}</span>
                                            </a>
                                        </p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2"></span>On August
                                                &nbsp;
                                            </div>
                                            {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2"></span></div> --}}
                                            <div><span class="gilroy-medium text-000941 font-14">
                                                    @if ($trip->duration == '1')
                                                        For 1 Week
                                                    @elseif($trip->duration == '2')
                                                        For 2 Weeks
                                                    @elseif($trip->duration == '3')
                                                        For 3 Weeks
                                                    @elseif($trip->duration == '4')
                                                        For a month
                                                    @elseif($trip->duration == '5')
                                                        Short Vacation
                                                    @elseif($trip->duration == '6')
                                                        Long Vacation
                                                    @endif
                                                </span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class=" ml-1"><i class="fas  fa-suitcase-rolling"></i></div>
                                            <div class="ml-1"><span
                                                    class="gilroy-medium text-000941 font-14 mr-2"></span>Looking
                                                for &nbsp;
                                            </div>
                                            {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2"></span></div> --}}
                                            <div><span class="gilroy-medium text-000941 font-14">
                                                    @if ($trip->user_id == $trip->host_id)
                                                        Travelers
                                                    @else
                                                        Funding
                                                    @endif
                                                </span></div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <div>
                                                    <a href="{{ route('trip-browse', $trip->id) }}">
                                                        <span class="gilroy-semi text-000941 font-18">View More</span>
                                                    </a>
                                                    <img class="arrow" src="/image/arrow-right.png" alt="">
                                                </div>
                                            </div>

                                        </div>

                                    </figcaption>
                                </figure>

                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="flex-3">
                        <div>
                            <div class="d-flex">
                                <div class="mr-3">
                                    <p class="gilroy-semi font-14 text-000941 mb-0">Dubai (DXB)</p>
                                </div>
                                <div class="d-flex"><span
                                        class="verification-tag gilroy-regular font-12">Upcoming</span></div>
                            </div>
                            <p class="gilroy-medium font-10 text-23242c opacity-40 mb-3">ID #113213423</p>
                            <div class="d-flex align-items-center">
                                <div class="d-flex"><img src="/image/policy.png" class="icon-16px mr-1"></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">-</span></div>
                                <div><span class="gilroy-medium text-000941 font-14">24/06/2021</span></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <div class="mr-3">
                                    <p class="gilroy-semi font-14 text-000941 mb-0">Rixos Hotel Egypt</p>
                                </div>
                                <div class="d-flex"><span
                                        class="verification-tag gilroy-regular font-12">Upcoming</span></div>
                            </div>
                            <p class="gilroy-medium font-10 text-23242c opacity-40 mb-3">ID #113213423</p>
                            <div class="d-flex align-items-center">
                                <div class="d-flex"><img src="/image/policy.png" class="icon-16px mr-1"></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">-</span></div>
                                <div><span class="gilroy-medium text-000941 font-14">24/06/2021</span></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="previuos-trips" class="p-3 city" style="display:none">
                    <div class="portfolio-1 mb-3">
                        @foreach ($solo_trips as $solo_trip)
                            <div>

                                <figure>
                                    <div style="border-top-left-radius: 15px;border-top-right-radius:15px;">
                                        <div role="button" data-toggle="modal" data-target="#socialMediaShare"
                                            data-link="{{ route('solo-browse', $solo_trip->id) }}">
                                            <span><i class="fas fa-share-alt" aria-hidden="true"></i></span>
                                        </div>
                                        <img class="add-border-radius"
                                            src="{{ $solo_trip->picture_url ? asset('storage/' . $solo_trip->picture_url) : asset('images-n/trips/1.jpg') }}"
                                            alt="">
                                    </div>
                                    <figcaption style="border-bottom-left-radius: 15px;border-bottom-right-radius:15px;">
                                        <div>
                                            <h4 class="gilroy-semi font-20 mb-1">{{ $solo_trip->title }}</h4>
                                        </div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <a
                                                href="{{ route('profile-home', $solo_trip->user->id) }}"> <span
                                                    class="gilroy-semi text-fe2f70">{{ $solo_trip->user->name }}</span>
                                            </a></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1"></div>
                                            <div><span
                                                    class="gilroy-medium text-000941 font-14 mr-2">@include("custom-components.remaining-time-solo"
                                                    , ['date' => $solo_trip->enddate])</span></div>
                                            {{-- <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div> --}}
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>


                                                <a href="{{ route('solo-browse', $solo_trip->id) }}">
                                                    <span class="gilroy-semi text-000941 font-16">View More</span>
                                                </a>


                                                <img class="arrow" src="image/arrow-right.png" alt="">
                                            </div>
                                            <span
                                                class="price-badge gilroy-medium font-14">{{ $solo_trip->goal }}€</span>

                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div><span class="gilroy-semi font-22">
                                                        {{ $solo_trip->totalAmountRaised() }}€</span></div>

                                            </div>
                                            <div id="myProgress" class="mb-3 add-border-radius">
                                                <div class="add-border-radius"
                                                    style="width: {{ ($solo_trip->totalAmountRaised() / $solo_trip->goal) * 100 }}%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <div class="d-flex flex-column">
                                                <div class="text-center" style="font-weight:900">
                                                    {{ ceil(($solo_trip->totalAmountRaised() / $solo_trip->goal) * 100) }}%
                                                </div>
                                                <div class="text-center">Funded</div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="text-center" style="font-weight:900">
                                                    {{ $solo_trip->goal }}€</div>
                                                <div class="text-center">To Raise</div>
                                            </div>
                                            @include("custom-components.remaining-time-solo-only-time"
                                            , ['date' => $solo_trip->enddate])
                                        </div>
                                    </figcaption>
                                </figure>

                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="flex-3">
                        <div>
                            <div class="d-flex">
                                <div class="mr-3">
                                    <p class="gilroy-semi font-14 text-000941 mb-0">Dubai (DXB)</p>
                                </div>
                                <div class="d-flex"><span
                                        class="verification-tag gilroy-regular font-12">Upcoming</span></div>
                            </div>
                            <p class="gilroy-medium font-10 text-23242c opacity-40 mb-3">ID #113213423</p>
                            <div class="d-flex align-items-center">
                                <div class="d-flex"><img src="/image/policy.png" class="icon-16px mr-1"></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                <div><span class="gilroy-medium text-000941 font-14 mr-2">-</span></div>
                                <div><span class="gilroy-medium text-000941 font-14">24/06/2021</span></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="manage-bookings" class="pt-3 city" style="display:none">

                    <div class="d-flex flex-column">

                        @foreach ($lottery_entries as $lottery_entry)
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    {{ $lottery_entry->lottery->title }}
                                </div>
                                <div>
                                    <span class="price-badge2" style="border-radius:15px;">
                                        @if (Auth::check() && $lottery_entry->lottery->winner_user_id == Auth::id())
                                            YOU WON!
                                        @elseif(Auth::check() && $lottery_entry->lottery->winner_user_id == null)
                                            Waiting for winner
                                        @else
                                            Hard Luck!
                                        @endif

                                    </span>
                                </div>
                                <div>
                                    <span class="price-badge2" style="border-radius:15px;"> <a style="color:white;"
                                            href="{{ route('ticket-lottery-view', $lottery_entry->lottery->id) }}">View</a></span>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('scripts')

    <script src="/js/profile/custom.js"></script>
    <script src="/js-r/profile.js"></script>
    <script>
        const vue_app = new Vue({
            el: "#vue_app",
            vuetify: new Vuetify(),
            components: {
                VueGallerySlideshow
            },
            data: {
                index: null,
                imagesArray: [],
                renderedImagesArray: @json($images_urls),
                uploading: false,
                profileImage: @json($profile_image),
                pendingProfileImage: null,
                uploadingProfileImage: false,
                description: @json($user_profile->description),
                editingDescription: false,
                originalDescription: @json($user_profile->description),



            },
            methods: {
                updateDescription: async function() {
                    const formData = new FormData();
                    formData.append("description", this.description)
                    try {
                        let resp = await axios.post('/profile/description/update', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.originalDescription = this.description;
                        this.editingDescription = false;

                    } catch (ex) {

                    } finally {

                    }
                },
                onChange(event) {
                    this.imagesArray = event.target.files
                },
                async onChangeProfileImage(event) {
                    this.pendingProfileImage = event.target.files
                    await this.uploadProfilePicture();

                },
                async uploadImages() {
                    this.uploading = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.imagesArray)) {
                        formData.append('imagesArray', this.imagesArray[i])
                    }

                    try {
                        let resp = await axios.post('/profile/images/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.renderedImagesArray.push(resp.data);
                        this.imagesArray = [];
                    } catch (ex) {

                    } finally {
                        this.uploading = false;
                    }

                },

                async uploadProfilePicture() {
                    this.uploadingProfileImage = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.pendingProfileImage)) {
                        formData.append('profile_image', this.pendingProfileImage[i])
                    }

                    try {
                        let resp = await axios.post('/profile/profile_pic/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.profileImage = resp.data;
                        this.pendingProfileImage = null;
                    } catch (ex) {

                    } finally {
                        this.uploadingProfileImage = false;

                    }


                },
                openDialog() {
                    $("#images_to_be_uploaded").click()
                },
                openDialogProfileImage() {
                    $("#images_to_be_uploaded_profile_image").click()
                }
            }
        })
    </script>

@endsection
