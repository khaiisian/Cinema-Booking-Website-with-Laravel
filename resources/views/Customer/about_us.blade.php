<x-app-layout>
    {{-- <h1 class="text-3xl text-center text-[#ffbf00] font-semibold">About US</h1> --}}
    <div class="w-[100%] md:w-[70%] min-h-32 flex justify-center mx-auto my-8 gap-x-5">
        <div class="about_text w-[40%] flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-[#ffbf00] mb-3">About Us</h2>
            <p class="text-sm md:text-base">Welcome to Eclipse IMAX Cinema, Yangon’s premier destination for an
                unparalleled movie experience. Combining state-of-the-art IMAX technology with world-class comfort, we
                bring stories to life on the big screen like never before. Nestled in the heart of Yangon, Eclipse IMAX
                is more than just a cinema—it’s a gateway to breathtaking visuals, immersive sound, and unforgettable
                moments. Whether you're a fan of thrilling blockbusters or inspiring documentaries, we are dedicated to
                creating magical moments for movie lovers of all ages. At Eclipse, your entertainment is our priority,
                and we strive to deliver excellence in every frame.</p>
        </div>
        <div class="w-[40%]">
            <img class="w-full h-full rounded-lg" src="{{asset('images/aboutus.jpg')}}" alt="aboutus_img">
        </div>
    </div>

    <div class="w-[100%] bg-gray-100">
        <div class="w-[90%] md:w-[60%] min-h-40 mx-auto mt-28 pt-3 pb-10">
            <h1 class="text-3xl font-bold text-[#ffbf00] mb-5">Mission And Vision</h1>
            <div class="flex w-[95%] mx-auto gap-x-12 flex-wrap gap-y-12">
                <div class="img w-[35%] h-96">
                    <img class="w-full h-full rounded-md" src="{{asset('images/mission.jpg')}}" alt="aboutus_img">
                </div>
                <div class="w-[50%] min-h-60 flex flex-col justify-center">
                    <h3 class="text-2xl font-semibold text-[#ffbf00] mb-2">Mission</h3>
                    <p>Our mission is to create unforgettable cinematic experiences that captivate, entertain, and
                        inspire our audience. We are committed to offering the latest in IMAX technology, exceptional
                        customer service, and a premium viewing environment. At Eclipse IMAX Cinema, we aim to celebrate
                        the art of filmmaking while fostering a space where moviegoers can connect with stories,
                        cultures, and each other. Through innovation and dedication, we strive to deliver the best in
                        entertainment to the people of Yangon.
                    </p>
                </div>


                <div class="w-[50%] min-h-60 flex flex-col justify-center">
                    <h3 class="text-2xl font-semibold text-[#ffbf00] mb-2">Vision</h3>
                    <p>To be the leading cinematic destination in Myanmar, where innovation and passion for storytelling
                        come together to inspire and connect audiences. We envision a future where Eclipse IMAX Cinema
                        redefines how Yangon's community experiences movies, blending cutting-edge technology with
                        unparalleled comfort. By setting new benchmarks in entertainment, we aim to become a hub of joy,
                        creativity, and cultural engagement, bringing the world closer, one film at a time.</p>
                </div>
                <div class="img w-[35%] h-96">
                    <img class="w-full h-full rounded-md" src="{{asset('images/vision.jpg')}}" alt="aboutus_img">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>