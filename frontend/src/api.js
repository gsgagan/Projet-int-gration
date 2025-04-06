import axios from "axios";

const API_URL = "http://localhost:8001/api";

export const fetchLocations = async () => {
  const response = await axios.get(`${API_URL}/locations`);
  return response.data;
};
