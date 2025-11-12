const counters = document.querySelectorAll(".value");
const speed = 500;

const animateCounter = (counter) => {
    const value = +counter.getAttribute("akhi");
    let data = 0;
    const time = value / speed;

    const animate = () => {
        if (data < value) {
            data += time;
            counter.innerText = Math.ceil(data);
            counter._animation = setTimeout(animate, 1);
        } else {
            counter.innerText = value;
        }
    };

    animate();
};

// Create IntersectionObserver
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            const box = entry.target;

            if (entry.isIntersecting) {
                // Animate all counters
                counters.forEach((counter, index) => {
                    // Clear previous timeout if any
                    clearTimeout(counter._animation);
                    counter.innerText = "0"; // Reset to 0 before animating
                    setTimeout(() => {
                        animateCounter(counter);
                    }, index * 100); // Stagger animations
                });
            } else {
                // Reset all counters when out of view
                counters.forEach((counter) => {
                    clearTimeout(counter._animation);
                    counter.innerText = "0";
                });
            }
        });
    },
    {
        threshold: 0.3,
    }
);

// Observe the section containing counters
const counterBox = document.querySelector(".counter-box");
if (counterBox) {
    observer.observe(counterBox);
}
