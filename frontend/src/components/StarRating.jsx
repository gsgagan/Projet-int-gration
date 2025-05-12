import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './StarRating.css';

const StarRating = ({ showId, isLoggedIn }) => {
    const [rating, setRating] = useState(0);
    const [hoverRating, setHoverRating] = useState(0);
    const [averageRating, setAverageRating] = useState(0);
    const [totalRatings, setTotalRatings] = useState(0);
    const [userRating, setUserRating] = useState(0);
    const [message, setMessage] = useState('');

    // Charger les données de notation au chargement du composant
    useEffect(() => {
        if (showId) {
            fetchRatings();
        }
    }, [showId]);

    const fetchRatings = async () => {
        try {
            const response = await axios.get(`/api/shows/${showId}/ratings`);
            setAverageRating(response.data.averageRating);
            setTotalRatings(response.data.totalRatings);

            if (response.data.userRating) {
                setUserRating(response.data.userRating);
                setRating(response.data.userRating);
            }
        } catch (error) {
            console.error('Erreur lors du chargement des notations:', error);
        }
    };

    const handleMouseOver = (index) => {
        if (isLoggedIn) {
            setHoverRating(index);
        }
    };

    const handleMouseLeave = () => {
        setHoverRating(0);
    };

    const handleClick = async (index) => {
        if (!isLoggedIn) {
            setMessage('Veuillez vous connecter pour noter ce spectacle');
            return;
        }

        try {
            const response = await axios.post(`/api/shows/${showId}/rate`, {
                score: index
            });

            setRating(index);
            setUserRating(index);
            setAverageRating(response.data.averageRating);
            setMessage(`Vous avez noté ce spectacle ${index} étoiles !`);

        } catch (error) {
            console.error('Erreur lors de la notation:', error);
            setMessage('Une erreur est survenue lors de la notation');
        }
    };

    return (
        <div className="star-rating-container">
            <div className="stars">
                {[1, 2, 3, 4, 5].map((index) => (
                    <span
                        key={index}
                        className={`star ${hoverRating >= index ? 'hover' : ''} ${rating >= index ? 'selected' : ''}`}
                        onMouseOver={() => handleMouseOver(index)}
                        onMouseLeave={handleMouseLeave}
                        onClick={() => handleClick(index)}
                    >
            <i className="fas fa-star"></i>
          </span>
                ))}
            </div>

            {message && <div className="rating-message">{message}</div>}

            <div className="rating-info">
                {averageRating > 0 ? (
                    <>
                        <span className="average-rating">Note moyenne: {averageRating}</span>
                        <span className="total-ratings">({totalRatings} avis)</span>
                    </>
                ) : (
                    <span>Aucune note pour le moment</span>
                )}
            </div>

            {!isLoggedIn && (
                <div className="login-message">
                    <a href="/login">Connectez-vous</a> pour noter ce spectacle
                </div>
            )}
        </div>
    );
};

export default StarRating;