document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll(".carousel-slide");
    const dots = document.querySelectorAll(".carousel-dot");
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.style.display = "block";
            } else {
                slide.style.display = "none";
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add("active");
            } else {
                dot.classList.remove("active");
            }
        });
    }

    function nextSlide() {
        currentIndex++;
        if (currentIndex >= slides.length) {
            currentIndex = 0;
        }
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = slides.length - 1;
        }
        showSlide(currentIndex);
    }

    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            showSlide(i);
            currentIndex = i;
        });
    });

    // Défilement automatique du carousel
    setInterval(nextSlide, 3000); // Change l'image toutes les 3 secondes (ajustez selon vos besoins)
    
    // Affiche la première image au chargement de la page
    showSlide(currentIndex);
});
