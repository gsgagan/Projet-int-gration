import React from 'react';
import { createRoot } from 'react-dom/client';
import StarRating from './components/StarRating';

// Initialisation du composant lorsque le DOM est chargé
document.addEventListener('DOMContentLoaded', () => {
    const starRatingElement = document.getElementById('star-rating-component');

    if (starRatingElement) {
        const showId = starRatingElement.dataset.showId;
        const userLoggedIn = starRatingElement.dataset.userLoggedIn;

        const root = createRoot(starRatingElement);
        root.render(<StarRating showId={showId} />);
    }
});