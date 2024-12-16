<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" {{$attributes}}>
    <!-- Circle Background -->
    <circle cx="12" cy="12" r="10" fill="#2C2C2C" stroke="#2C2C2C" stroke-width="2" />

    <!-- Lightning Bolt -->
    <path d="M14 3L5 12h6v7l8-10h-6z" fill="none" stroke="#FFD700" stroke-width="2">
        <animate attributeName="stroke" values="#FFD700; #FF6347; #FFD700" dur="1s" repeatCount="indefinite"/>
    </path>

    <!-- Glow Effect for Raised 3D Look -->
    <circle cx="12" cy="12" r="9" fill="none" stroke="#FFD700" stroke-width="1" opacity="0.6">
        <animate attributeName="r" values="9;10;9" dur="1s" repeatCount="indefinite"/>
    </circle>
</svg>
