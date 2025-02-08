// Get all job elements
const jobs = document.querySelectorAll('.job');

// Add click event listener to each job element
jobs.forEach(job => {
  const detailsBtn = job.querySelector('.details-btn');
  const details = job.querySelector('.details');

  detailsBtn.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default link behavior
    details.classList.toggle('show'); // Toggle show/hide details
  }); 
});


