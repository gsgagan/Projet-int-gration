import React, { useState, useEffect } from 'react';
import axios from 'axios';
//import './StarRating.css';

const StarRating = ({ showId, isLoggedIn }) => {
    const [rating, setRating] = useState(0);
    const [hoverRating, setHoverRating] = useState(0);
    const [averageRating, setAverageRating] = useState(0);
    const [totalRatings, setTotalRatings] = useState(0);
    const [userRating, setUserRating] = useState(0);
    const [message, setMessage] = useState('');
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    // Logs de débogage
    useEffect(() => {
        console.log('StarRating component mounted with props:', { showId, isLoggedIn });
        console.log('Type of isLoggedIn:', typeof isLoggedIn);
        console.log('Value of isLoggedIn:', isLoggedIn);
    }, [showId, isLoggedIn]);

    // Charger les données de notation au chargement du composant
    useEffect(() => {
        if (showId) {
            fetchRatings();
        }
    }, [showId]);

    const fetchRatings = async () => {
        try {
            setLoading(true);
            console.log(`Fetching ratings for show ${showId}...`);

            const response = await axios.get(`/api/shows/${showId}/ratings`);
            console.log('API response:', response.data);

            setAverageRating(response.data.averageRating || 0);
            setTotalRatings(response.data.totalRatings || 0);

            if (response.data.userRating) {
                setUserRating(response.data.userRating);
                setRating(response.data.userRating);
            }

            setError(null);
        } catch (error) {
            console.error('Error fetching ratings:', error);
            setError('Impossible de charger les notations');
        } finally {
            setLoading(false);
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
        console.log('Click handler - isLoggedIn:', isLoggedIn);
        if (!isLoggedIn) {
            setMessage('Veuillez vous connecter pour noter ce spectacle');
            setTimeout(() => setMessage(''), 3000);
            return;
        }

        try {
            console.log(`Submitting rating ${index} for show ${showId}...`);

            const response = await axios.post(`/api/shows/${showId}/rate`, {
                score: index
            });

            console.log('Rating submitted:', response.data);

            setRating(index);
            setUserRating(index);
            setAverageRating(response.data.averageRating || 0);
            setTotalRatings(response.data.totalRatings || 0);
            setMessage(`Vous avez noté ce spectacle ${index} étoile${index > 1 ? 's' : ''} !`);

            setTimeout(() => setMessage(''), 3000);
        } catch (error) {
            console.error('Error submitting rating:', error);
            setMessage('Une erreur est survenue lors de la notation');
            setTimeout(() => setMessage(''), 3000);
        }
    };

    if (loading) {
        return (
            <div className="star-rating-container">
                <p>Chargement des notations...</p>
            </div>
        );
    }

    if (error) {
        return (
            <div className="star-rating-container">
                <p className="error-message">{error}</p>
            </div>
        );
    }

    return (
        <div className="star-rating-container">
            {/* Debug info - à retirer après */}
            <div style={{ background: '#f0f0f0', padding: '10px', marginBottom: '10px' }}>
                <p>DEBUG: isLoggedIn = {String(isLoggedIn)} (type: {typeof isLoggedIn})</p>
                <p>DEBUG: showId = {showId}</p>
            </div>

            <div className="stars">
                {[1, 2, 3, 4, 5].map((index) => (
                    <span
                        key={index}
                        className={`star ${hoverRating >= index ? 'hover' : ''} ${rating >= index ? 'selected' : ''}`}
                        onMouseOver={() => handleMouseOver(index)}
                        onMouseLeave={handleMouseLeave}
                        onClick={() => handleClick(index)}
                        title={isLoggedIn ? `Noter ${index} étoile${index > 1 ? 's' : ''}` : 'Connectez-vous pour noter'}
                    >
                        <i className={`${(hoverRating >= index || rating >= index) ? 'fas' : 'far'} fa-star`}></i>
                    </span>
                ))}
            </div>

            {message && (
                <div className={`rating-message ${message.includes('erreur') ? 'error' : 'success'}`}>
                    {message}
                </div>
            )}

            <div className="rating-info">
                {averageRating > 0 ? (
                    <>
                        <span className="average-rating">
                            Note moyenne: {averageRating.toFixed(1)}/5
                        </span>
                        <span className="total-ratings">
                            ({totalRatings} avis)
                        </span>
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

            {isLoggedIn && userRating > 0 && (
                <div className="user-rating">
                    Votre note : {userRating}/5
                </div>
            )}
        </div>
    );
};

export default StarRating;