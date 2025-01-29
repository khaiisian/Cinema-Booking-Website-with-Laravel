<x-app-layout>
    <div class="py-10 min-h-screen bg-gray-100">
        <div class="text-5xl text-center font-bold mb-12 text-[#ffbf00]">Contact Us</div>
        <div class="max-w-6xl flex justify-center flex-wrap md:flex-nowrap mx-auto">
            <div class="contact_form w-[60%] md:w-[35%]">
                <form action="/contactus" method="POST" class="flex flex-col p-6 gap-1">
                    @csrf
                    <div class="text-3xl font-bold mb-7 text-[#333333]">GET IN TOUCH</div>
                    <label for="subject" class="font-bold text-gray-800 ml-2">Subject</label>
                    <input type="text" name="subject" id="subject" class="mb-4 rounded-lg border-gray-300 ml-2">
                    <label for="message" class="font-bold text-gray-800 ml-2">Message</label>
                    <textarea name="message" id="" cols="20" rows="5"
                        class="rounded-lg border-gray-300 mb-6 ml-2"></textarea>
                    <x-primary-button type="submit" class="w-16 p-2 ml-3">
                        Send
                    </x-primary-button>
                </form>
            </div>
            <div class="contact_info w-[60%] md:w-[43%] p-3 rounded-lg bg-white">
                <div class="map rounded-lg overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.201265549021!2d96.12605877492115!3d16.816368583976658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb34335a92f5%3A0xea3210d0410309d7!2sTimes%20City%20Yangon!5e0!3m2!1sen!2smm!4v1733690871432!5m2!1sen!2smm"
                        class="w-full h-80" style=" border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class=" px-2 flex flex-col gap-y-3">
                    <p class="text-xl font-bold mt-4 text-[#333333]">Contact Information</p>
                    <div class="flex items-center px-2"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-envelope w-5" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        <p>&nbsp;: eclipse@gmail.com </p>
                    </div>
                    <div class="flex items-center px-2"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-geo-alt w-5" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <p>&nbsp;: No.37/Quarter, Kyun Taw Rd, Yangon 11041</p>
                    </div>
                    <div class="flex items-center px-2"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-telephone w-5" viewBox="0 0 16 16">
                            <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <p>&nbsp;: +959785326958 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>