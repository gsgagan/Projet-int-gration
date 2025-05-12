import React from 'react';
import { createRoot } from 'react-dom/client';
import StarRating from './components/StarRating';

document.addEventListener('DOMContentLoaded', () => {
    console.log('Rating app initialized');
    const starRatingElement = document.getElementById('star-rating-component');

    if (starRatingElement) {
        console.log('Found star-rating-component element:', starRatingElement);
        console.log('showId:', starRatingElement.dataset.showId);
        console.log('userLoggedIn:', starRatingElement.dataset.userLoggedIn);

        const root = createRoot(starRatingElement);
        root.render(<StarRating
            showId={starRatingElement.dataset.showId}
            isLoggedIn={starRatingElement.dataset.userLoggedIn === 'true'}
        />);
        console.log('StarRating component rendered');
    } else {
        console.error('Could not find star-rating-component element!');
    }
});