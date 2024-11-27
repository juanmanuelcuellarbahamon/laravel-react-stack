import React from 'react';
import { useFetchLocations } from './useFetchLocations';
import {
  CircularProgress,
  Container,
  Typography,
  Grid,
  Card,
  CardContent,
  CardMedia,
} from '@mui/material';
import { formatDate } from '../../utils/format';
import './LocationComponent.css';

const LocationComponent: React.FC = () => {
  const { data: locations, loading, error } = useFetchLocations();

  return (
    <Container>
      <Typography variant='h4' gutterBottom>
        Localizaciones
      </Typography>
      {loading ? (
        <Grid container justifyContent='center' alignItems='center' style={{ minHeight: '50vh' }}>
          <CircularProgress />
        </Grid>
      ) : error ? (
        <Typography color='error'>{error}</Typography>
      ) : locations.length === 0 ? (
        <Typography variant='h6' align='center'>
          No hay registros
        </Typography>
      ) : (
        <Grid container spacing={4}>
          {locations.map((location) => (
            <Grid item xs={12} sm={6} md={4} key={location.code}>
              <Card>
                <CardMedia
                  component='img'
                  height='150'
                  image={location.image}
                  alt={location.name}
                />
                <CardContent>
                  <Typography variant='h6' gutterBottom>
                    {location.name}
                  </Typography>
                  <Typography variant='body2' color='textSecondary'>
                    <strong>Dia creacion:</strong> {formatDate(location.creationDate)}
                  </Typography>
                </CardContent>
              </Card>
            </Grid>
          ))}
        </Grid>
      )}
    </Container>
  );
};

export default LocationComponent;
