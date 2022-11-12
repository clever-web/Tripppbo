    <section class="container-all-booking mb-3">
        <header class="bg-fafafa p-4">
            <h4 class="gilroy-bold font-28 mb-2">Important Information</h4>
            <p class="gilroy-regular font-12 mb-0">Do not miss it</p>
        </header>
        <div class="pt-0">
            <div class="rounded-lg p-4">
            @foreach ($information as $info)
            <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">{{ $info['title'] ?? '' }}</h4>
            <p class="gilroy-regular font-14 mb-3">{{ $info['text'] ?? '' }}</p>
            @endforeach
            </div>
        </div>
    </section>
