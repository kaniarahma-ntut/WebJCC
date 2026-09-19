import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");

menuBtn.addEventListener("click", () => {
    // Toggle kelas 'hidden' dan 'flex'
    mobileMenu.classList.toggle("hidden");
    mobileMenu.classList.toggle("flex");

    // Ubah ikon dari 'menu' menjadi 'close' (X) saat terbuka
    if (mobileMenu.classList.contains("hidden")) {
        menuIcon.textContent = "menu";
    } else {
        menuIcon.textContent = "close";
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.getElementById("event-carousel");
    const btnPrev = document.getElementById("btn-prev");
    const btnNext = document.getElementById("btn-next");

    if (carousel && btnPrev && btnNext) {
        btnNext.addEventListener("click", () => {
            carousel.scrollBy({
                left: carousel.clientWidth * 0.7,
                behavior: "smooth",
            });
        });

        btnPrev.addEventListener("click", () => {
            carousel.scrollBy({
                left: -carousel.clientWidth * 0.7,
                behavior: "smooth",
            });
        });
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".filter-tab");
    const desktopCards = document.querySelectorAll(".showcase-card");
    const mobileCards = document.querySelectorAll(".showcase-card-mobile");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const selectedCategory = tab.getAttribute("data-filter");

            // 1. Ubah Style Tab Aktif
            tabs.forEach((t) => {
                t.classList.remove(
                    "bg-merah-jcc",
                    "text-broken-white",
                    "shadow-md",
                    "scale-105",
                );
                t.classList.add("bg-cream-dark", "text-charcoal");
            });
            tab.classList.remove("bg-cream-dark", "text-charcoal");
            tab.classList.add(
                "bg-merah-jcc",
                "text-broken-white",
                "shadow-md",
                "scale-105",
            );

            // 2. Filter Kartu Desktop
            desktopCards.forEach((card) => {
                const cardCategory = card.getAttribute("data-category");
                if (
                    selectedCategory === "all" ||
                    cardCategory === selectedCategory
                ) {
                    card.style.opacity = "1";
                    card.style.filter = "brightness(100%)";
                    card.style.pointerEvents = "auto";
                } else {
                    card.style.opacity = "0.25";
                    card.style.filter = "brightness(50%) grayscale(80%)";
                    card.style.pointerEvents = "none";
                }
            });

            // 3. Filter Kartu Mobile
            mobileCards.forEach((card) => {
                const cardCategory = card.getAttribute("data-category");
                if (
                    selectedCategory === "all" ||
                    cardCategory === selectedCategory
                ) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const slider = document.getElementById("creator-slider");
    const prevBtn = document.getElementById("creator-prev");
    const nextBtn = document.getElementById("creator-next");
    const cards = document.querySelectorAll(".creator-card");

    if (prevBtn && nextBtn && slider) {
        nextBtn.addEventListener("click", () => {
            slider.scrollBy({
                left: 240,
                behavior: "smooth",
            });
        });
        prevBtn.addEventListener("click", () => {
            slider.scrollBy({
                left: -240,
                behavior: "smooth",
            });
        });
    }

    let isScrolling;
    slider.addEventListener("scroll", () => {
        cards.forEach((card) => {
            const badge = card.querySelector(".creator-badge");
            const overlay = card.querySelector(".creator-overlay");
            if (badge) {
                badge.style.opacity = "0";
                badge.style.transform = "translateY(15px)";
            }
            if (overlay) {
                overlay.style.opacity = "0";
            }
        });

        clearTimeout(isScrolling);
        isScrolling = setTimeout(() => {
            cards.forEach((card) => {
                const badge = card.querySelector(".creator-badge");
                const overlay = card.querySelector(".creator-overlay");
                if (badge) {
                    badge.style.opacity = "1";
                    badge.style.transform = "translateY(0)";
                }
                if (overlay) {
                    overlay.style.opacity = "1";
                }
            });
        }, 200);
    });
});
