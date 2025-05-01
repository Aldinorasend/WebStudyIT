
    document.addEventListener('DOMContentLoaded', function () {
      const apiUrl = 'http://localhost:3000/api/freecourses'; // Ganti dengan URL API Anda
      const baseUrl = 'http://localhost:8000/backend-uploads/';
      const courseContainer = document.getElementById('course-container');
      const courseTemplate = document.getElementById('course-template');
  
      fetch(apiUrl)
          .then(response => response.json())
          .then(data => {
              data.forEach(course => {
                  const courseCard = courseTemplate.cloneNode(true);
                  courseCard.style.display = 'block'; 
                  courseCard.setAttribute('data-id', course.id);
                  courseCard.querySelector('.card-img-top').src = `${baseUrl}${course.image}`; 
                  courseCard.querySelector('.card-img-top').alt = "Cover course";
                  courseCard.querySelector('.card-title').textContent = course.course_name + " " +  course.level.charAt(0).toUpperCase() + course.level.slice(1) + " Class";
                  // courseCard.querySelector('.card-level').textContent = "Level :" +  course.level.charAt(0).toUpperCase() + course.level.slice(1);
                  courseCard.querySelector('.date-card').textContent = new Date(course.start_date).getDate() + " - " +  new Date(course.end_date).toLocaleDateString('id-ID', 
                  {
                  
                    month: 'long',    
                    day: 'numeric',   
                    year: 'numeric'  
                  });
  
                  // Tambahkan card ke container
                  courseContainer.appendChild(courseCard);
              });
          })
          .catch(error => {
              console.error('Error fetching courses:', error);
          });
  });
  
  
function toogleMenu() {
    let menu = document.querySelector('.nav-menu');
    
    if (!menu) {
        // Jika elemen belum ada, buat elemen baru
        menu = document.createElement('div');
        menu.classList.add('nav-menu');
        menu.style.position = 'fixed';
        menu.style.top = '0';
        menu.style.right = '0';
        menu.style.width = '250px';
        menu.style.height = '100vh';
        menu.style.backgroundColor = 'blue';
        menu.style.boxShadow = '-2px 0 5px rgba(0,0,0,0.2)';
        menu.style.transform = 'translateX(100%)';
        menu.style.transition = 'transform 0.3s ease-in-out';
        menu.style.display = 'flex';
        menu.style.flexDirection = 'column';
        menu.style.alignItems = 'center';
        menu.style.paddingTop = '20px';
        menu.style.opacity = '1';
        
        // Isi menu
        menu.innerHTML = `
            <ul style="list-style: none; padding: 0; text-align: center;">
                <li style="margin: 10px 0;"><a href="#" style="color: white; text-decoration: none; font-size: 20px;">Home</a></li>
                <li style="margin: 10px 0;"><a href="#" style="color: white; text-decoration: none; font-size: 20px;">Moduls</a></li>
                <li style="margin: 10px 0;"><a href="#" style="color: white; text-decoration: none; font-size: 20px;">Subscribe</a></li>
            </ul>
        `;
        
        document.body.appendChild(menu);
    }
    
    if (menu.style.transform === 'translateX(100%)') {
        menu.style.transform = 'translateX(0)';
    } else {
        menu.style.transform = 'translateX(100%)';
    }
}


  // document.addEventListener('click', function (event) {
  //     const sidebar = document.querySelector('.nav-menu');
  //     const hamburger = document.querySelector('.hamburger');
  
  //     if (!sidebar.contains(event.target) && !hamburger.contains(event.target)) {
  //         sidebar.classList.remove('active'); // Close the sidebar
  //     }
  // });
  function navigatePayment(){
      const path = window.location.pathname;
      const akunId = path.split('/').pop();
      const targetUrl = `/students/${akunId}/payments`;
      window.location.href = targetUrl;
    }
  function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
      );
    }
    
  
  
    const container = document.getElementById('course-container');
  
  //   container.addEventListener('click', (event) => {
  //   const card = event.target.closest('.card');
  
  
  //   if (card) {
  //     const path = window.location.pathname;
  //     const courseId = card.getAttribute('data-id'); 
  //     const akunId = path.split('/').pop();
  //     console.log(akunId)
  //     if (courseId) {
  //       // Log untuk debugging
  //       console.log('Card clicked:', card); 
  //       console.log('Course ID:', courseId); 
  
  //       const targetUrl = `/students/${akunId}/courses/${courseId}/modul`;


  //       console.log('Redirecting to:', targetUrl); 
  //       window.location.href = targetUrl;
  //     } else {
  //       console.log('No course ID found for this card.');
  //     }
  //   } else {
  //     console.log('Clicked outside a valid card or on the template.'); 
  //   }
  // });
  
    
  
  