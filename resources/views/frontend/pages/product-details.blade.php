@extends('frontend.master')
@section('user')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb">
        <div class="container px-3 md:px-5 xl:px-0">
            <div class="flex items-center gap-1 py-[1.5px]">
                <a href="index.html" class="text-[14px] font-normal leading-[110%] text-dark-gray">Home</a>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.125 5.25L10.875 9L7.125 12.75" stroke="#636270" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="#" class="text-[14px] font-normal leading-[110%] text-dark-gray">Shop</a>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.125 5.25L10.875 9L7.125 12.75" stroke="#636270" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="text-[14px] font-medium leading-[110%] font-display text-gray-black inline-block">{{ $products->name }}</span>
            </div>

            <h2 class="pt-[13.5px] text-2xl font-semibold text-gray-black font-display">Product Details</h2>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- product details section start -->
    <div class="">
        <div class="container px-3 md:px-5 xl:px-0">
            <div class="product-details-wrap pt-10">
                <div class="left-side xl:w-7/12 w-full">
                    <div class="gallery-container mb-[50px]">
                        <div class="xl:flex flex-col justify-between hidden">
                            <div class="gallery-button-prev"></div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    
                                        @foreach ($products->gallery as $gallery)
                                            @if ($gallery->images)
                                                @php $images = unserialize($gallery->images); @endphp
                                                @foreach ($images as $image)
                                                    <div class="swiper-slide">
                                                        <img src="{{ url('/storage/uploads/' . $image) }}"
                                                            alt="Gallery Image">
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                            <div class="gallery-button-next"></div>
                        </div>
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                
                                  
                                        @foreach ($products->gallery as $gallery)
                                            @if ($gallery->images)
                                                @php $images = unserialize($gallery->images); @endphp
                                                @foreach ($images as $image)
                                                    <div class="swiper-slide">
                                                        <img src="{{ url('storage/uploads/',$products->image) }}"
                                                            alt="Gallery Image">
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                
                            </div>
                        </div>

                    </div>
                    <div class="single-product-desc">
                        <h2 class="text-[#272343] text-2xl font-semibold mb-3.5">Product Descriptions</h2>
                        <p class="text-[#636270] text-base mb-3">{!! $products->long_description!!}</p>
                    </div>
                </div>
                <div class="right-side xl:px-8 px-0 xl:w-5/12 w-full">
                    <h2 class="text-[#272343] pro-title font-semibold mb-3 capitalize">{{ $products->name }}</h2>
                    <div class="flex items-center gap-2.5 mb-6">
                       @if($products->discount != null)
                        <p class="flex gap-1.5 items-center">
                            <span class="text-[#272343] text-2xl">${{ $products->discount }}</span>
                            <span class="text-[#272343] opacity-30 text-xl line-through">${{ $products->price }}</span>
                        </p>
                        <span class="bg-[#F5813F] px-2.5 py-1.5 rounded-[4px] text-white text-sm">{{ $products->discount }}% Off</span>
                        @else
                        <p class="flex gap-1.5 items-center">
                            <span class="text-[#272343] text-2xl">$ {{ $products->price }}</span>
                        </p>
                        @endif
                    </div>
                    <p class="text-[#636270] text-base mb-6">
                        {!!$products->short_description!!}
                    </p>
                    <div class="mb-6">
                        <h2 class="text-[#9A9CAA] text-sm font-medium mb-3">Color</h2>
                        <ul class="flex gap-[30px] items-center p-0 m-0">
                            <li>
                                <label for="black" class="inline-flex gap-2 items-center custom-radio cursor-pointer">
                                    <input type="radio" id="black" checked name="color" class="hidden"/>
                                    <span class="bg-[#1E1E1E] w-8 h-8 rounded-full custom-bg m-1"></span>
                                    <span class="text-base text-[#636270]">Black</span>
                                </label>                                
                            </li>
                            <li>
                                <label for="brown" class="inline-flex gap-2 items-center custom-radio cursor-pointer">
                                    <input type="radio" id="brown" name="color" class="hidden" />
                                    <span class="bg-[#B26F3F] w-8 h-8 rounded-full custom-bg m-1"></span>
                                    <span class="text-base text-[#636270]">Brown</span>
                                </label>
                            </li>
                            <li>
                                <label for="orange" class="inline-flex gap-2 items-center custom-radio cursor-pointer">
                                    <input type="radio" id="orange" name="color" class="hidden" />
                                    <span class="bg-[#F7AD94] w-8 h-8 rounded-full custom-bg m-1"></span>
                                    <span class="text-base text-[#636270]">Peach</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-6">
                        <ul class="p-0 m-0">
                            <li>
                                <p class="text-[15px] inline-flex gap-2 items-center">
                                    <span class="text-[#9A9CAA]">Brand:</span><span class="text-[#636270] font-medium">{{ $products->brand->name }}</span>
                                </p>
                            </li>
                            <li>
                                <p class="text-[15px] inline-flex gap-2 items-center">
                                    <span class="text-[#9A9CAA]">Category:</span><span class="text-[#636270] font-medium">{{ $products->category->name }}</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    {{-- for add to cart --}}
                    <form action="{{ route('add.to.cart',$products->id) }}" method="post">
                     @csrf
                    <div class="flex flex-wrap lg:flex-nowrap items-center gap-3 mb-6">
                        <div class="border inline-flex justify-around items-center h-[52px] w-[140px] xl:w-[343px] add-to-cart-btn border-[#D6D9DD] rounded-lg">
                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pl-[14px] select-none minus" id="minus">-</span>
                            <input type="text" min="1" max="100" class="text-[#272343] text-base plus_mines_input select-none" name="quantity"  value="1"  max='100' />
                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pr-[14px] select-none plus" id="plus">+</span>
                        </div>
                        <div class="flex gap-3 w-full">
                               
                                <div class="xl:w-[343px] add-to-cart-btn">
                                <button class="inline-flex gap-3 py-3.5 bg-[#029FAE] hover:bg-[#272343] transition-all duration-300 rounded-lg px-4 xl:w-[343px] w-full items-center justify-center">
                                    <span class="text-white text-base">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.75 3.25L4.83 3.61L5.793 15.083C5.82999 15.5345 6.03584 15.9554 6.36948 16.2618C6.70312 16.5682 7.14002 16.7375 7.593 16.736H18.503C18.9367 16.7365 19.3561 16.5803 19.6838 16.2963C20.0116 16.0122 20.2258 15.6194 20.287 15.19L21.237 8.632C21.2623 8.45759 21.253 8.2799 21.2096 8.10909C21.1662 7.93828 21.0896 7.77769 20.9841 7.63653C20.8786 7.49536 20.7463 7.37637 20.5947 7.28637C20.4432 7.19636 20.2754 7.13711 20.101 7.112C20.037 7.105 5.164 7.1 5.164 7.1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14.125 10.795H16.898" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.15398 20.203C7.22732 20.1999 7.30053 20.2116 7.36921 20.2375C7.4379 20.2634 7.50063 20.3029 7.55363 20.3537C7.60664 20.4045 7.64881 20.4655 7.67763 20.533C7.70645 20.6005 7.7213 20.6731 7.7213 20.7465C7.7213 20.8199 7.70645 20.8926 7.67763 20.9601C7.64881 21.0276 7.60664 21.0886 7.55363 21.1393C7.50063 21.1901 7.4379 21.2296 7.36921 21.2555C7.30053 21.2814 7.22732 21.2932 7.15398 21.29C7.01387 21.284 6.88149 21.2241 6.78448 21.1228C6.68746 21.0216 6.6333 20.8868 6.6333 20.7465C6.6333 20.6063 6.68746 20.4715 6.78448 20.3702C6.88149 20.2689 7.01387 20.209 7.15398 20.203Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4351 20.203C18.5797 20.203 18.7183 20.2604 18.8205 20.3626C18.9227 20.4648 18.9801 20.6035 18.9801 20.748C18.9801 20.8925 18.9227 21.0312 18.8205 21.1334C18.7183 21.2356 18.5797 21.293 18.4351 21.293C18.2906 21.293 18.152 21.2356 18.0498 21.1334C17.9476 21.0312 17.8901 20.8925 17.8901 20.748C17.8901 20.6035 17.9476 20.4648 18.0498 20.3626C18.152 20.2604 18.2906 20.203 18.4351 20.203Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                        <span class="">Add To Cart</span>
                                </button>
                              
                            </div>
                            <div>
                                <button class="h-[52px] w-[52px] border border-[#D6D9DD] rounded-lg inline-flex justify-center items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.87199 11.598C1.79899 8.24799 3.05199 4.419 6.56999 3.286C7.48224 2.9941 8.45106 2.92457 9.39563 3.08322C10.3402 3.24187 11.2332 3.62409 12 4.198C13.455 3.073 15.572 2.693 17.42 3.286C20.937 4.419 22.199 8.24799 21.127 11.598C19.457 16.908 12 20.998 12 20.998C12 20.998 4.59799 16.97 2.87199 11.598V11.598Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16 6.70001C16.5232 6.86903 16.9845 7.18931 17.3257 7.62039C17.6669 8.05148 17.8727 8.57403 17.917 9.12201" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                   
                    </div>
                    </form>
                    <div class="flex gap-2.5 items-center">
                        <p>Share on</p>
                        <ul class="m-0 p-0 flex gap-1">
                            <li>
                                <a href="#" class="p-[11px] inline-flex justify-center items-center text-[#636270] hover:text-[#029FAE] border hover:border-[#029FAE] border-transparent rounded-full transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_248_4233)">
                                            <path d="M16 8C16 3.58167 12.4183 0 8 0C3.58167 0 0 3.58167 0 8C0 11.993 2.92533 15.3027 6.75 15.9027V10.3127H4.71867V8H6.75V6.23733C6.75 4.23267 7.94433 3.125 9.77167 3.125C10.6467 3.125 11.5623 3.28133 11.5623 3.28133V5.25H10.5537C9.56 5.25 9.25 5.86667 9.25 6.5V8H11.4687L11.114 10.3127H9.25V15.9027C13.0747 15.3027 16 11.9927 16 8Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_248_4233">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="p-[11px] inline-flex justify-center items-center text-[#636270] hover:text-[#029FAE] border hover:border-[#029FAE] border-transparent rounded-full transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_248_4237)">
                                            <path d="M5.03333 14.5001C11.07 14.5001 14.3723 9.49807 14.3723 5.1614C14.3723 5.02073 14.369 4.87707 14.3627 4.7364C15.0052 4.27173 15.5596 3.69615 16 3.03673C15.4017 3.30273 14.7667 3.47673 14.116 3.55207C14.8008 3.1416 15.3136 2.49675 15.5593 1.73707C14.915 2.11896 14.2104 2.38837 13.4757 2.53373C12.9807 2.00751 12.3261 1.65904 11.6132 1.54222C10.9002 1.4254 10.1687 1.54673 9.53161 1.88746C8.89456 2.22818 8.38752 2.76931 8.08891 3.42715C7.79031 4.08499 7.71677 4.8229 7.87967 5.52673C6.575 5.46127 5.29865 5.12236 4.13336 4.53199C2.96806 3.94162 1.93984 3.11297 1.11533 2.09973C0.696305 2.82223 0.568091 3.67717 0.756747 4.4908C0.945403 5.30443 1.43677 6.0157 2.131 6.48007C1.60977 6.46355 1.09995 6.32324 0.643667 6.07073V6.1114C0.643231 6.86956 0.905349 7.60448 1.38547 8.19125C1.86559 8.77802 2.53409 9.18042 3.27733 9.33007C2.79463 9.46215 2.28801 9.48143 1.79667 9.3864C2.00644 10.0384 2.41454 10.6087 2.964 11.0176C3.51346 11.4265 4.17688 11.6537 4.86167 11.6674C4.18054 12.2026 3.40049 12.5981 2.56623 12.8312C1.73197 13.0644 0.859899 13.1306 0 13.0261C1.50191 13.9895 3.24899 14.5011 5.03333 14.5001Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_248_4237">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="p-[11px] inline-flex justify-center items-center text-[#636270] hover:text-[#029FAE] border hover:border-[#029FAE] border-transparent rounded-full transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.667 4.66667C10.667 4.48986 10.7372 4.32029 10.8623 4.19526C10.9873 4.07024 11.1568 4 11.3337 4C11.5105 4 11.68 4.07024 11.8051 4.19526C11.9301 4.32029 12.0003 4.48986 12.0003 4.66667C12.0003 4.84348 11.9301 5.01305 11.8051 5.13807C11.68 5.2631 11.5105 5.33333 11.3337 5.33333C11.1568 5.33333 10.9873 5.2631 10.8623 5.13807C10.7372 5.01305 10.667 4.84348 10.667 4.66667Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00016 4.83331C7.16031 4.83331 6.35486 5.16694 5.76099 5.76081C5.16713 6.35467 4.8335 7.16013 4.8335 7.99998C4.8335 8.83983 5.16713 9.64529 5.76099 10.2392C6.35486 10.833 7.16031 11.1666 8.00016 11.1666C8.84001 11.1666 9.64547 10.833 10.2393 10.2392C10.8332 9.64529 11.1668 8.83983 11.1668 7.99998C11.1668 7.16013 10.8332 6.35467 10.2393 5.76081C9.64547 5.16694 8.84001 4.83331 8.00016 4.83331ZM5.8335 7.99998C5.8335 7.42534 6.06177 6.87424 6.4681 6.46792C6.87443 6.06159 7.42553 5.83331 8.00016 5.83331C8.5748 5.83331 9.1259 6.06159 9.53223 6.46792C9.93856 6.87424 10.1668 7.42534 10.1668 7.99998C10.1668 8.57462 9.93856 9.12572 9.53223 9.53204C9.1259 9.93837 8.5748 10.1666 8.00016 10.1666C7.42553 10.1666 6.87443 9.93837 6.4681 9.53204C6.06177 9.12572 5.8335 8.57462 5.8335 7.99998Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5055 1.88865C9.17578 1.63038 6.82462 1.63038 4.49487 1.88865C3.15353 2.03865 2.0702 3.09532 1.91287 4.44332C1.63647 6.80637 1.63647 9.19359 1.91287 11.5566C2.0702 12.9046 3.15287 13.9613 4.49487 14.1113C6.80553 14.3693 9.19487 14.3693 11.5055 14.1113C12.8469 13.9613 13.9302 12.9046 14.0875 11.5566C14.364 9.19359 14.364 6.80637 14.0875 4.44332C13.9302 3.09532 12.8475 2.03865 11.5055 1.88865ZM4.60553 2.88198C6.86174 2.6319 9.13866 2.6319 11.3949 2.88198C12.2815 2.98198 12.9915 3.68132 13.0949 4.55998C13.3622 6.84553 13.3622 9.15444 13.0949 11.44C12.9915 12.3186 12.2815 13.0186 11.3949 13.1173C9.13866 13.3674 6.86173 13.3674 4.60553 13.1173C3.71887 13.0186 3.00887 12.3186 2.90553 11.44C2.63823 9.15444 2.63823 6.84553 2.90553 4.55998C3.00887 3.68132 3.71887 2.98132 4.60553 2.88265V2.88198Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="p-[11px] inline-flex justify-center items-center text-[#636270] hover:text-[#029FAE] border hover:border-[#029FAE] border-transparent rounded-full transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_248_4251)">
                                            <path d="M8 0C3.58133 0 0 3.58133 0 8C0 11.3907 2.10933 14.2843 5.08433 15.45C5.01567 14.8157 4.95 13.8467 5.11267 13.1563C5.25933 12.5313 6.05 9.18133 6.05 9.18133C6.05 9.18133 5.80933 8.703 5.80933 7.99367C5.80933 6.88133 6.453 6.05 7.256 6.05C7.93733 6.05 8.26867 6.56267 8.26867 7.178C8.26867 7.86566 7.83133 8.89066 7.60633 9.84066C7.41867 10.6373 8.00633 11.2873 8.79067 11.2873C10.2123 11.2873 11.3063 9.78733 11.3063 7.625C11.3063 5.70933 9.93133 4.36867 7.96567 4.36867C5.69067 4.36867 4.353 6.075 4.353 7.84066C4.353 8.528 4.61867 9.26566 4.95 9.66566C5.01567 9.74366 5.025 9.81566 5.00633 9.89366C4.947 10.147 4.80967 10.6903 4.78433 10.8C4.75 10.9467 4.66867 10.978 4.51567 10.9063C3.51567 10.4407 2.89067 8.98133 2.89067 7.80633C2.89067 5.28133 4.725 2.96567 8.175 2.96567C10.95 2.96567 13.1063 4.94367 13.1063 7.58733C13.1063 10.344 11.3687 12.5623 8.95633 12.5623C8.147 12.5623 7.38433 12.1407 7.122 11.6437C7.122 11.6437 6.722 13.172 6.625 13.547C6.44367 14.2403 5.95633 15.1127 5.63133 15.6437C6.3986 15.8804 7.19706 16.0005 8 16C12.4187 16 16 12.4187 16 8C16 3.58133 12.4187 0 8 0Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_248_4251">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="p-[11px] inline-flex justify-center items-center text-[#636270] hover:text-[#029FAE] border hover:border-[#029FAE] border-transparent rounded-full transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8407 4.79995C15.8407 4.79995 15.6843 3.69661 15.203 3.21261C14.5937 2.57495 13.9123 2.57195 13.6 2.53428C11.3627 2.37195 8.00333 2.37195 8.00333 2.37195H7.99667C7.99667 2.37195 4.63767 2.37195 2.4 2.53428C2.08733 2.57195 1.40633 2.57495 0.796667 3.21261C0.316 3.69661 0.162667 4.79995 0.162667 4.79995C0.162667 4.79995 0 6.09662 0 7.39062V8.60295C0 9.89695 0.159333 11.1936 0.159333 11.1936C0.159333 11.1936 0.315667 12.2969 0.793667 12.7813C1.403 13.4186 2.203 13.3969 2.55933 13.4656C3.84067 13.5876 8 13.6249 8 13.6249C8 13.6249 11.3623 13.6186 13.6 13.4593C13.9127 13.4219 14.5937 13.4186 15.2033 12.7813C15.6843 12.2969 15.8407 11.1936 15.8407 11.1936C15.8407 11.1936 16 9.90028 16 8.60328V7.39095C16 6.09728 15.8407 4.80028 15.8407 4.80028V4.79995ZM6.34667 10.0749V5.57828L10.6683 7.83428L6.34667 10.0749Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="single-product-desc2">
                        <h2 class="text-[#272343] text-2xl font-semibold mb-3.5">Product Descriptions</h2>
                        <p class="text-[#636270] text-base mb-3">{!!$products->long_description!!}</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details section end --> 
@endsection


