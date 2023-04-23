@if($icon === "high")
    <svg width="92" height="65" viewBox="0 0 92 65" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M48.7348 36.5C16.4144 36.5 41.2762 46 1 48.5V65H91V1C81.5525 9.5 82.0497 22.5 68.6243 22.5C55.1989 22.5 60.6685 36.5 48.7348 36.5Z" fill="url(#paint0_linear_47_23)"/>
        <path d="M1 48.5C41.2762 46 16.4144 36.5 48.7348 36.5C60.6685 36.5 55.1989 22.5 68.6243 22.5C82.0497 22.5 81.5525 9.5 91 1" stroke="{{$color}}" stroke-width="2"/>
        <defs>
            <linearGradient id="paint0_linear_47_23" x1="46.2486" y1="-22.5" x2="45.9972" y2="65" gradientUnits="userSpaceOnUse">
                <stop stop-color="{{$color}}" stop-opacity="0.24"/>
                <stop offset="1" stop-color="{{$color}}" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
@elseif($icon === "middle")
    <svg width="92" height="52" viewBox="0 0 92 52" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M48.7348 23.5C16.4144 23.5 41.2762 33 1 35.5V52H91V1.5C81.5525 10 82.0497 9.5 68.6243 9.5C55.1989 9.5 60.6685 23.5 48.7348 23.5Z" fill="url(#paint0_linear_47_26)"/>
        <path d="M1 35.5C41.2762 33 16.4144 23.5 48.7348 23.5C60.6685 23.5 55.1989 9.5 68.6243 9.5C82.0497 9.5 81.5525 10 91 1.5" stroke="{{$color}}" stroke-width="2"/>
        <defs>
            <linearGradient id="paint0_linear_47_26" x1="46.2486" y1="-35.5" x2="45.9972" y2="52" gradientUnits="userSpaceOnUse">
                <stop stop-color="{{$color}}" stop-opacity="0.24"/>
                <stop offset="1" stop-color="{{$color}}" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
@elseif($icon === "low")
    <svg width="92" height="41" viewBox="0 0 92 41" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M44 18.5C11.6796 18.5 41.2762 22 1 24.5V41H91V0C81.5525 8.5 82.0497 10.5 68.6243 10.5C55.1989 10.5 55.9337 18.5 44 18.5Z" fill="url(#paint0_linear_47_29)"/>
        <path d="M1 24.5C41.2762 22 13.6796 18 46 18C57.9337 18 56.0746 11 69.5 11C82.9254 11 81.5525 9.5 91 1" stroke="#0FBA68" stroke-width="2"/>
        <defs>
            <linearGradient id="paint0_linear_47_29" x1="46.2486" y1="-46.5" x2="45.9972" y2="41" gradientUnits="userSpaceOnUse">
                <stop stop-color="{{$color}}" stop-opacity="0.24"/>
                <stop offset="1" stop-color="{{$color}}" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
@endif
