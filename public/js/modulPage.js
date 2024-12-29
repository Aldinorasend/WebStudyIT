const apiUrl = 'http://localhost:3000/api/moduls/'; // Replace with your API vidio
const baseUrl = 'http://localhost:8000/backend-uploads/'; // Replace with your base vidio for assets

fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        console.log("Fetched Data:", data);

        // Update banner
        document.getElementById('banner-image').src = `${baseUrl}${data[0].vidio}`;
        document.getElementById('course-title').textContent = data[0].Title;

        // YouTube video setup
        const youtubeVideoUrl = `https://www.youtube.com/embed/tgbNymZ7vqY`;
        console.log("YouTube Video URL:", youtubeVideoUrl);

        const iframe = document.createElement('iframe');
        iframe.src = youtubeVideoUrl;
        iframe.width = "100%";
        iframe.height = "315";
        iframe.frameBorder = "0";
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;

        // Replace video container
        const videoContainer = document.querySelector('.vid-cor');
        videoContainer.innerHTML = ''; // Clear any existing content
        videoContainer.appendChild(iframe);
    })
    .catch(error => {
        console.error("Error fetching courses:", error);
    });

