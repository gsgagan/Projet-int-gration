// frontend/src/App.jsx

import React from 'react';
import LocationList from './components/LocationList';

function App() {
  return (
    <div style={{ padding: '2rem' }}>
      <h1>🎭 Bienvenue sur FindrFood</h1>
      <LocationList />
    </div>
  );
}

export default App;
