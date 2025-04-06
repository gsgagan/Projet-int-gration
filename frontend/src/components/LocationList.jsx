import React, { useEffect, useState } from 'react';
import { fetchLocations } from '../api';

export default function LocationList() {
  const [locations, setLocations] = useState([]);

  useEffect(() => {
    fetchLocations()
      .then(data => setLocations(data['hydra:member'] || []))
      .catch(err => console.error("Erreur API :", err));
  }, []);

  return (
    <div>
      <h2>📍 Liste des lieux</h2>
      <ul>
        {locations.map(loc => (
          <li key={loc.id}>
            {loc.designation} — {loc.locality?.locality || 'Localité inconnue'}
          </li>
        ))}
      </ul>
    </div>
  );
}
