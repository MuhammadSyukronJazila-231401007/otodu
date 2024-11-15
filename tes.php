<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic SVG Progress</title>
    <style>
        #progressRect {
            transition: height 0.5s ease;
        }
    </style>
</head>
<body>

<svg width="300" height="300" xmlns="http://www.w3.org/2000/svg" overflow="hidden">
    <rect x="10" y="10" width="100" height="100" fill="blue"/>
    
    <!-- SVG Nested di dalam SVG -->
    <svg x="120" y="10" width="100" height="100">
        <circle cx="50" cy="50" r="80" fill="yellow"/>
        <rect x="10" y="10" width="80" height="80" fill="purple"/>
    </svg>
    
    <!-- Elemen lainnya -->
    <line x1="10" y1="120" x2="200" y2="120" stroke="black" stroke-width="2"/>
</svg>

<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <pattern id="pattern0_517_2000" patternUnits="userSpaceOnUse" width="10" height="10">
            <rect width="10" height="10" fill="grey" />
        </pattern>
    </defs>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M142.09 137C157.467 122.49 167 102.312 167 80C167 35.8172 129.616 0 83.5 0C37.3842 0 0 35.8172 0 80C0 102.312 9.53339 122.49 24.9104 137H142.09Z" fill="url(#pattern0_517_2000)"/>
    
</svg>

                            <svg width="20vw" height="137" viewBox="0 0 167 137" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- <path fill-rule="evenodd" clip-rule="evenodd" d="M142.09 137C157.467 122.49 167 102.312 167 80C167 35.8172 129.616 0 83.5 0C37.3842 0 0 35.8172 0 80C0 102.312 9.53339 122.49 24.9104 137H142.09Z" fill="url(#pattern0_517_2000)"/> -->
                            <!-- <path fill-rule="evenodd" clip-rule="evenodd" d="M155.216 121C151.557 126.861 147.139 132.236 142.09 137H24.9108C19.8621 132.236 15.4434 126.861 11.7852 121H155.216Z" fill="#46CC6A"/> -->
                            <rect x="0" y="0" width="100%" height="100%" rx="20" ry="20" fill="grey" style="transform: rotate(180deg); transform-origin: center"/>
                            <rect x="0" y="0" width="100%" height="19%"  fill="#46CC6A" style="transform: rotate(180deg); transform-origin: center"/>
                            <path d="M58.975 83V80.275H63.675V69.075L59.125 70.1V67.65L65.025 65.5H66.7V80.275H70.825V83H58.975ZM75.102 83L82.052 68.225H72.627V65.5H85.427V67.775L78.427 83H75.102ZM90.8539 83L100.729 65.5H103.854L93.9789 83H90.8539ZM91.8039 74.1C91.0039 74.1 90.2789 73.925 89.6289 73.575C88.9789 73.2083 88.4622 72.6917 88.0789 72.025C87.6956 71.3417 87.5039 70.55 87.5039 69.65C87.5039 68.7333 87.6956 67.9417 88.0789 67.275C88.4622 66.6083 88.9789 66.0917 89.6289 65.725C90.2789 65.375 91.0122 65.2 91.8289 65.2C92.6289 65.2 93.3456 65.3833 93.9789 65.75C94.6289 66.1 95.1456 66.6083 95.5289 67.275C95.7122 67.6083 95.8539 67.975 95.9539 68.375C96.0539 68.7583 96.1039 69.1833 96.1039 69.65C96.1039 70.5667 95.9122 71.3583 95.5289 72.025C95.1456 72.6917 94.6289 73.2 93.9789 73.55C93.3456 73.9167 92.6206 74.1 91.8039 74.1ZM91.7789 71.875C92.2789 71.875 92.7039 71.6917 93.0539 71.325C93.4039 70.9417 93.5789 70.3833 93.5789 69.65C93.5789 68.9167 93.4039 68.3583 93.0539 67.975C92.7206 67.5917 92.3039 67.4 91.8039 67.4C91.3039 67.4 90.8789 67.5917 90.5289 67.975C90.1956 68.3583 90.0289 68.9167 90.0289 69.65C90.0289 70.3833 90.1956 70.9417 90.5289 71.325C90.8789 71.6917 91.2956 71.875 91.7789 71.875ZM103.004 83.3C102.204 83.3 101.479 83.125 100.829 82.775C100.179 82.4083 99.6622 81.8917 99.2789 81.225C98.8956 80.5417 98.7039 79.75 98.7039 78.85C98.7039 77.9333 98.8956 77.15 99.2789 76.5C99.6622 75.8333 100.179 75.3167 100.829 74.95C101.479 74.6 102.212 74.425 103.029 74.425C103.829 74.425 104.546 74.6083 105.179 74.975C105.829 75.325 106.346 75.825 106.729 76.475C106.912 76.8083 107.054 77.175 107.154 77.575C107.254 77.9583 107.304 78.3833 107.304 78.85C107.304 79.7667 107.112 80.5583 106.729 81.225C106.346 81.8917 105.837 82.4 105.204 82.75C104.571 83.1167 103.837 83.3 103.004 83.3ZM103.004 81.075C103.504 81.075 103.921 80.8917 104.254 80.525C104.604 80.1417 104.779 79.5833 104.779 78.85C104.779 78.1167 104.604 77.5583 104.254 77.175C103.921 76.7917 103.504 76.6 103.004 76.6C102.504 76.6 102.079 76.7917 101.729 77.175C101.396 77.5583 101.229 78.1167 101.229 78.85C101.229 79.5833 101.396 80.1417 101.729 80.525C102.079 80.8917 102.504 81.075 103.004 81.075Z" fill="#1F2844"/>
                            <defs>
                            <pattern id="pattern0_517_2000" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_517_2000" transform="scale(0.00299401 0.00364964)"/>
                            </pattern>
                            <image id="image0_517_2000" width="334" height="320" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>

    <script>
        function updateProgress() {
            const input = document.getElementById('progressInput').value;
            const progress = Math.max(0, Math.min(100, input)); // Ensure the value is between 0 and 100
            const progressRect = document.getElementById('progressRect');
            
            // Calculate height based on the input percentage (300 is the full height of the SVG)
            const newHeight = (progress / 100) * 300;
            progressRect.setAttribute('height', newHeight);
            progressRect.setAttribute('y', 300 - newHeight); // Adjust y position to align the progress from the bottom
        }
    </script>
</body>
</html>
