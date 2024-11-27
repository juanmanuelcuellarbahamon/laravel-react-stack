import { useEffect, useState } from 'react';
import axios from 'axios';
import { Location } from './location.interface';

export const useFetchLocations = () => {
  const [data, setData] = useState<Location[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);

  const apiUrl = 'http://127.0.0.1:8000/api/locations';
  const API_KEY = 'base64:1MMXBrWWwFZj8kLyzQcl3u+Xp73Xm8bJAa8raFK0AfE=';

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get<Location[]>(apiUrl, {
          headers: {
            'API-Key': API_KEY,
          },
        });
        setData(response.data);
      } catch (err) {
        console.error('Error fetching data:', err);
        setError('Failed to fetch data');
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, [apiUrl]);

  return { data, loading, error };
};
