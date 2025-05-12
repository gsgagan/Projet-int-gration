// assets/react/components/PromotedShowsCarousel.jsx

import React, { useState, useEffect } from 'react';

const PromotedShowsCarousel = ({ shows }) => {
    const [currentIndex, setCurrentIndex] = useState(0);
    const [touchStartX, setTouchStartX] = useState(0);
    const [touchEndX, setTouchEndX] = useState(0);

    // Filtrer uniquement les spectacles en promotion
    const promotedShows = shows.filter(show => show.promoted);

    // Fonction pour passer au spectacle suivant
    const nextSlide = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === promotedShows.length - 1 ? 0 : prevIndex + 1
        );
    };

    // Fonction pour revenir au spectacle précédent
    const prevSlide = () => {
        setCurrentIndex((prevIndex) =>
            prevIndex === 0 ? promotedShows.length - 1 : prevIndex - 1
        );
    };

    // Défilement automatique
    useEffect(() => {
        const interval = setInterval(() => {
            nextSlide();
        }, 5000);

        return () => clearInterval(interval);
    }, [currentIndex]);

    // Gestion du swipe sur mobile
    const handleTouchStart = (e) => {
        setTouchStartX(e.touches[0].clientX);
    };

    const handleTouchMove = (e) => {
        setTouchEndX(e.touches[0].clientX);
    };

    const handleTouchEnd = () => {
        if (touchStartX - touchEndX > 100) {
            // Swipe gauche
            nextSlide();
        }

        if (touchEndX - touchStartX > 100) {
            // Swipe droite
            prevSlide();
        }
    };

    // Si pas de spectacles en promotion
    if (promotedShows.length === 0) {
        return <div className="no-promoted-shows">Aucun spectacle en promotion actuellement</div>;
    }

    return (
        <div
            className="carousel-container"
            onTouchStart={handleTouchStart}
            onTouchMove={handleTouchMove}
            onTouchEnd={handleTouchEnd}
        >
            <h2>Spectacles à l'affiche</h2>

            <div className="carousel-content">
                <button
                    className="carousel-button prev"
                    onClick={prevSlide}
                    aria-label="Spectacle précédent"
                >
                    <i className="fa-solid fa-chevron-left"></i>
                </button>

                <div className="carousel-slide">
                    {promotedShows.map((show, index) => (
                        <div
                            key={show.id}
                            className={`carousel-item ${index === currentIndex ? 'active' : ''}`}
                            style={{ display: index === currentIndex ? 'block' : 'none' }}
                        >
                            <div className="carousel-image">
                                <img src={`/uploads/${show.posterUrl}`} alt={show.title} />
                            </div>

                            <div className="carousel-details">
                                <h3>{show.title}</h3>
                                <p>{show.shortDesc}</p>

                                <div className="show-tags">
                                    {show.tags.map(tag => (
                                        <span key={tag.id} className="tag">{tag.tag}</span>
                                    ))}
                                </div>

                                <div className="show-info">
                                    <p>Durée: {show.duration} min</p>
                                    <p>Lieu: {show.locationId?.designation}</p>
                                </div>

                                <a
                                    href={`/spectacle/${show.slug}`}
                                    className="show-button"
                                >
                                    En savoir plus
                                </a>

                                {show.bookable && (
                                    <a
                                        href={`/reservation/${show.slug}`}
                                        className="booking-button"
                                    >
                                        Réserver
                                    </a>
                                )}
                            </div>
                        </div>
                    ))}
                </div>

                <button
                    className="carousel-button next"
                    onClick={nextSlide}
                    aria-label="Spectacle suivant"
                >
                    <i className="fa-solid fa-chevron-right"></i>
                </button>
            </div>

            <div className="carousel-indicators">
                {promotedShows.map((_, index) => (
                    <button
                        key={index}
                        className={`indicator ${index === currentIndex ? 'active' : ''}`}
                        onClick={() => setCurrentIndex(index)}
                        aria-label={`Spectacle ${index + 1}`}
                    ></button>
                ))}
            </div>
        </div>
    );
};

export default PromotedShowsCarousel;