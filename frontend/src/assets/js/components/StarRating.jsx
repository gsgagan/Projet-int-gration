import React, { useState, useEffect } from 'react';
import axios from 'axios';
//import './StarRating.css';

const StarRating = ({ showId, isLoggedIn }) => {
    const [rating, setRating] = useState(0);
    const [hover, setHover] = useState(0);
    const [averageRating, setAverageRating] = useState(0);
    const [totalRatings, setTotalRatings] = useState(0);
    const [userRating, setUserRating] = useState(0);
    const [isSubmitting, setIsSubmitting] = useState(false);
    const [message, setMessage] = useState('');

    // Charger les données existantes
    useEffect(() => {
        const fetchRatings = async () => {
            try {
                const response = await axios.get(`/api/shows/${showId}/ratings`);
                setAverageRating(response.data.averageRating || 0);
                setTotalRatings(response.data.totalRatings || 0);

                if (response.data.userRating) {
                    setUserRating(response.data.userRating);
                    setRating(response.data.userRating);
                }
            } catch (error) {
                console.error('Erreur:', error);
            }
        };

        if (showId) {
            fetchRatings();
        }
    }, [showId]);

    const handleRatingClick = async (value) => {
        if (!isLoggedIn) {
            setMessage('Vous devez être connecté pour noter ce spectacle');
            setTimeout(() => setMessage(''), 3000);
            return;
        }

        if (isSubmitting) return;

        setIsSubmitting(true);
        setMessage('');

        try {
            const response = await axios.post(`/api/shows/${showId}/rate`, {
                score: value
            });

            if (response.data.success) {
                setRating(value);
                setUserRating(value);
                setAverageRating(response.data.averageRating);
                if (!userRating) {
                    setTotalRatings(prev => prev + 1);
                }
                setMessage('Votre note a été enregistrée !');
            } else {
                setMessage(response.data.error || 'Une erreur est survenue');
            }
        } catch (error) {
            setMessage('Erreur de connexion. Veuillez réessayer.');
        } finally {
            setIsSubmitting(false);
            setTimeout(() => setMessage(''), 3000);
        }
    };

    return (
        <div className="star-rating">
            <h3>Notez ce spectacle</h3>

            <div className="stars">
                {[...Array(5)].map((_, index) => {
                    const ratingValue = index + 1;

                    return (
                        <span
                            key={index}
                            className={`star ${ratingValue <= (hover || rating) ? 'active' : ''}`}
                            onClick={() => handleRatingClick(ratingValue)}
                            onMouseEnter={() => isLoggedIn && setHover(ratingValue)}
                            onMouseLeave={() => isLoggedIn && setHover(0)}
                            style={{ cursor: isLoggedIn ? 'pointer' : 'default' }}
                        >
                            <i className={`fa${ratingValue <= (hover || rating) ? 's' : 'r'} fa-star`}></i>
                        </span>
                    );
                })}
            </div>

            <div className="rating-stats">
                <p>Note moyenne : <strong>{averageRating.toFixed(1)}</strong>/5 ({totalRatings} vote{totalRatings !== 1 ? 's' : ''})</p>

                {userRating > 0 && (
                    <p>Votre note : <strong>{userRating}/5</strong></p>
                )}
            </div>

            {message && (
                <div className={`rating-message ${message.includes('erreur') || message.includes('connecté') ? 'error' : 'success'}`}>
                    {message}
                </div>
            )}

            {isSubmitting && (
                <div className="rating-loading">
                    <i className="fas fa-spinner fa-spin"></i> Envoi en cours...
                </div>
            )}

            {!isLoggedIn && (
                <p className="login-message">
                    <a href="/login">Connectez-vous</a> pour noter ce spectacle
                </p>
            )}
        </div>
    );
};

export default StarRating;