
    document.addEventListener('DOMContentLoaded', function () {
    const apiUrl = 'http://localhost:3000/api/courses'; // Ganti dengan URL API Anda
    const baseUrl = 'http://localhost:8000/backend-uploads/';
    const courseContainer = document.getElementById('course-container');
    const courseTemplate = document.getElementById('course-template');

    // Fetch data courses dari API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            data.forEach(course => {
                const courseCard = courseTemplate.cloneNode(true);
                courseCard.style.display = 'block'; // Tampilkan card
                courseCard.setAttribute('data-id', course.id);
                courseCard.querySelector('.card-img-top').src = `${baseUrl}${course.image}`; // Set gambar
                courseCard.querySelector('.card-img-top').alt = "Cover course"; // Set alt text
                courseCard.querySelector('.card-title').textContent = course.course_name;
                courseCard.querySelector('.date-card').textContent = new Date(course.end_date).toLocaleDateString('id-ID', {
                  weekday: 'long',  // Menampilkan nama hari (misalnya: "Wednesday")
                  month: 'long',    // Menampilkan nama bulan (misalnya: "July")
                  day: 'numeric',   // Menampilkan hari (misalnya: "11")
                  year: 'numeric'   // Menampilkan tahun (misalnya: "2024")
                });

                // Tambahkan card ke container
                courseContainer.appendChild(courseCard);
            });
        })
        .catch(error => {
            console.error('Error fetching courses:', error);
        });
});


// $(document).ready(function() {
//     // Load the course data from the JSON file using AJAX
//     $.ajax({
//         url: '/asset/json/datacourse.json', // URL of the JSON file
//         dataType: 'json', // Specify the data type
//         success: function(data) {
//             const courses = data.course; // Get the array of courses
//             const container = $('#course-container'); // Select the container

//             $.each(courses, function(index, course) {
//                 // Clone the template card
//                 const card = $('#course-template').clone();
//                 card.css('display', 'block'); // Show the cloned card

//                 // Set the course image and details
//                 card.find('.card-img-top').attr('src', course.image);
//                 card.find('.card-title').text(`${course.title}`);
//                 card.find('.card-level').text(`(${course.level})`);
//                 card.find('.date-card').text(`${course.date}`);
//                 card.on('click', function() {
//                     if (index === 1) { // Check if it's card-2 (index starts at 0)
//                         window.location.href = `${course.page}`; // Redirect to the desired page
//                     }
//                     // You can add more conditions here for other cards if needed
//                 });
                
//                 // Append the card to the container
//                 container.append(card);
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error('Error loading the course data:', error);
//         }
//     });
// });

function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}
document.addEventListener('click', function (event) {
    const sidebar = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');

    // Check if the click is outside the sidebar and the hamburger
    if (!sidebar.contains(event.target) && !hamburger.contains(event.target)) {
        sidebar.classList.remove('active'); // Close the sidebar
    }
});
function navigatePayment(){
    window.location.href = "/page/payment.html";
}
// Function to check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.bottom >= 0
    );
  }
  
  // Function to animate elements on scroll
  function animateOnScroll() {
    const benefitsContainer = document.querySelector('.benefits-container');
    const testimoniContainer = document.querySelector('.testimoni-container');
  
    // Check if each container is in view and add the active class
    if (isInViewport(benefitsContainer)) {
      benefitsContainer.classList.add('active');
    }
    if (isInViewport(testimoniContainer)) {
      testimoniContainer.classList.add('active');
    }
  }
  
  // Listen for scroll events
  window.addEventListener('scroll', animateOnScroll);
  
  // Initial check in case elements are already in view
  animateOnScroll();

  // const container = document.getElementById('course-container');

  const container = document.getElementById('course-container');

container.addEventListener('click', (event) => {
  // Cari elemen card terdekat dari elemen yang diklik
  const card = event.target.closest('.card');

  // Jika card ditemukan dan bukan template
  if (card) {
    const courseId = card.getAttribute('data-id'); // Ambil data-id dari card

    if (courseId) {
      // Log untuk debugging
      console.log('Card clicked:', card); // Debug: elemen card yang diklik
      console.log('Course ID:', courseId); // Debug: ID dari elemen card

      // Redirect ke halaman dengan ID yang sesuai
      const targetUrl = `/admin/courses/${courseId}/edit`;
      console.log('Redirecting to:', targetUrl); // Debug: URL tujuan
      window.location.href = targetUrl;
    } else {
      console.log('No course ID found for this card.'); // Debug jika data-id tidak ditemukan
    }
  } else {
    console.log('Clicked outside a valid card or on the template.'); // Debug jika klik tidak valid
  }
});

  

